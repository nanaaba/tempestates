<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Bank;
use App\RentPayments;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TenantController;

class BankController extends Controller {

    public function showbanks() {



        return view('banks');
    }

    public function getBanks() {

        // $banks = DB::table('banks_view')->get();
        return DB::table('banks')->where('active', 0)
                        ->get();
        //return $banks;
    }

    public function saveBank(Request $request) {

        $data = $request->all();
        $new = new Bank();

        $new->bank_name = $data['bank_name'];
        $new->location = $data['location'];
        $new->branch = $data['branch'];
        $new->relationship_officer = $data['relationship_officer'];
        $new->relationship_contact = $data['relationship_contact'];
        $new->account_type = $data['account_type'];
        $new->currency = $data['currency'];
        $new->account_no = $data['account_number'];
        $new->created_by = Session::get('id');


        try {

            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'Duplicate entry  for account number. ' . $data['account_number'] . ' already exist';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function showrentpayments() {
        return view('rentpayments');
    }

    public function showclearpayments() {
        return view('clearpayments');
    }

    public function showclearedpayments() {
        return view('clearedpayments');
    }

    public function saveRentPayment(Request $request) {



        $data = $request->all();


        $mode = $data['mode'];
        $payment_date = date('Y-m-d', strtotime($request['payment_date']));
        $new = new RentPayments();
        if ($mode == "Bank Deposit") {
            if ($request->hasFile('depositurl')) {
                $scanned_id = $request->file('depositurl');
                $depositurl = $scanned_id->store('scanneddocuments');
                $bank = $data['bank'];
                $new->bank_id = $bank[0];
                $new->bank_name = $bank[1];
                $new->accountno = $bank[2];
                $new->deposit_url = $depositurl;
            }
        }

        if ($mode == "Cheque") {
            if ($request->hasFile('chequeurl')) {
                $scanned_id = $request->file('chequeurl');
                $chequeurl = $scanned_id->store('scanneddocuments');
                $new->cheque_url = $chequeurl;
            }
        }
        $new->tenant_id = $data['tenant'];
        $new->amount = $data['amount'];
        $new->description = $data['description'];
        $new->payment_date = $payment_date;
        $new->mode = $data['mode'];
        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');

        try {
            $saved = $new->save();

            if ($saved) {

                $dataresponse = array('success' => 0, 'message' => 'success');

                $tenant = new TenantController();
                $tenantInformation = $tenant->getTenantInformation($data['tenant']);
                $info = json_decode($tenantInformation, true);

                $notifications = new NotificationsController();
                $message = 'Hi ' . $info[0]['title'] . ' ' . $info[0]['name'] . ','
                        . 'Please an amount of GHS ' . $data['amount'] . ' payments have been received through '
                        . $data['mode'] . ' payments on '.$request['payment_date'].'.';
                $notifications->sendemail($info[0]['email_address'], 'Payments received', $message);
                $notifications->sendsms($info[0]['contactno'], $message);

                return json_encode($dataresponse);
            } else {
                $data = array('success' => 1, 'message' => 'error');
                return json_encode($data);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $data = array('success' => 2, 'message' => $e->getMessage());
            return json_encode($data);
        }
    }

    public function getRentpayments() {
        return DB::table('payments_view')
                        ->get();
    }

    public function markpaymentsascleared(Request $request) {


        $data = $request->all();
        $bank_name = $data['bank'];
        $total_amount = $data['totalmount'];
        $deposited_by = $data['depositedby'];
        $payment_date = $data['paymentdate'];
        $scanned_url = "";
        $bank_code = $this->clearpayments($bank_name, $total_amount, $deposited_by, $payment_date, $scanned_url);

        $inflowsids = $data['inflows'];
        $this->updatepaymentsascleared($bank_code, $inflowsids);
        return $bank_code;
    }

    public function clearpayments($bank_name, $total_amount, $deposited_by, $payment_date, $scanned_url) {

        $code = $this->unquecodeGenerator(8);
        $bank_code = 'BNK' . $code;
        $createdby = Session::get('userid');

        DB::insert('insert into cleared_payments (bank_code,bank_name,total_amount, deposited_by,payment_date,scanned_url,created_by) values (?, ?,?,?,?,?,?)', ["$bank_code", "$bank_name", "$total_amount", "$deposited_by", "$payment_date", "$scanned_url", $createdby]);

        return $bank_code;
    }

    public function updatepaymentsascleared($bank_code, $paymentsids) {

        DB::statement('update rent_payments set cleared_code= "' . $bank_code . '" where id in(' . $paymentsids . ')');
    }

    public function deletebank($id) {
        $update = Bank::find($id);
        $update->active = 1;
        $update->modified_by = Session::get('id');
        $update->last_modified = date('Y-m-d H:i:s');
        $saved = $update->save();

        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getBankDetail($id) {

        return Bank::where('id', $id)
                        ->get();
    }

    public function updateBank(Request $request) {

        $data = $request->all();

        $new = Bank::find($data['code']);
        $new->bank_name = $data['bank_name'];
        $new->location = $data['location'];
        $new->branch = $data['branch'];
        $new->relationship_officer = $data['relationship_officer'];
        $new->relationship_contact = $data['relationship_contact'];
        $new->account_type = $data['account_type'];
        $new->currency = $data['currency'];
        $new->account_no = $data['account_number'];
        $new->modified_by = Session::get('id');


        try {

            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'Duplicate entry  for account number. ' . $data['account_number'] . ' already exist';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getUnClearedpayments() {
        return DB::table('payments_view')->whereNull('cleared_code')->whereIn('mode', ['Cash', 'Cheque'])->get();
    }

    public function getClearedpayments() {
        return DB::table('payments_view')->whereNotNull('cleared_code')->get();
    }

    public function unquecodeGenerator($length) {
        $chars = "1234567890";
        $clen = strlen($chars) - 1;
        $id = '';

        for ($i = 0; $i < $length; $i++) {
            $id .= $chars[mt_rand(0, $clen)];
        }
        return ($id);
    }

}
