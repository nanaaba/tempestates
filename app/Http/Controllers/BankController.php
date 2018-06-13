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
use Illuminate\Support\Facades\Log;

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

    
    
     public function showpayments() {
        return view('payments');
    }

    public function saveBank(Request $request) {

        $data = $request->all();
        $new = new Bank();

        $new->bank_name = strip_tags($data['bank_name']);
        $new->location = $data['location'];
        $new->branch = strip_tags($data['branch']);
        $new->relationship_officer = strip_tags($data['relationship_officer']);
        $new->relationship_contact = strip_tags($data['relationship_contact']);
        $new->account_type = strip_tags($data['account_type']);
        $new->currency = strip_tags($data['currency']);
        $new->account_no = strip_tags($data['account_number']);
        $new->created_by = Session::get('id');


        try {

            $new->save();

            $audit = new AuditLogsController();
            $audit->saveActivity('Added new bank: ' . $data['bank_name'] . ' with account number ' . $data['account_number']);

            return '0';
        } catch (\Illuminate\Database\QueryException $ex) {
            Log::error('Error in saving bank : ' . $ex->getMessage());

            return 'Duplicate entry  for account number. ' . $data['account_number'] . ' already exist';
        } catch (Exception $e) {
            Log::error('Error in saving bank : ' . $ex->getMessage());
            return 'Technical Error.Contact System Administrator';
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


        $payment_type = $data['paymenttype'];
        if (in_array('rent', $payment_type)) {
            $rent_state = $this->validaterentDate($data['tenant'], $data['start_date']);
            if ($rent_state > 0) {
                $dataresponse = array('success' => 2, 'message' => 'Rent payments has already been paid between ' . $data['start_date'] . ' to ' . $data['end_date']);
                return json_encode($dataresponse);
            }
        }
        if (in_array('bill', $payment_type)) {

            $bill_date = explode('to', strip_tags($data['bill_date']));
            $bill_start_date = date('Y-m-d', strtotime($bill_date[0]));

            $bill_state = $this->validateBillDate($data['tenant'], $bill_start_date);
            if ($bill_state > 0) {
                $dataresponse = array('success' => 2, 'message' => 'Bill Payments has already been done for ' . $data['bill_date']);
                return json_encode($dataresponse);
            }
        }
        $mode = $data['mode'];
        $payment_date = date('Y-m-d', strtotime($request['payment_date']));
        $new = new RentPayments();
        if ($mode == "Bank Deposit") {
            if ($request->hasFile('depositurl')) {
                $scanned_id = $request->file('depositurl');
                $depositurl = $scanned_id->store('scanneddocuments');
                $bank = explode('-', $data['bank']);
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
        $new->amount = $data['totalamount'];
        $new->description = strip_tags($data['description']);
        $new->payment_date = strip_tags($payment_date);
        $new->mode = strip_tags($data['mode']);
        $new->currency = strip_tags($data['currency']);
        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');

        try {
            $new->save();


            $payment_id = $new->id;
            $fedbck = $this->savePaymentDetails($payment_id, $data);

            $dataresponse = array('success' => 0, 'message' => 'success' . $fedbck);

            $tenant = new TenantController();
            $tenantInformation = $tenant->getTenantInformation($data['tenant']);
            $info = json_decode($tenantInformation, true);

            $notifications = new NotificationsController();
            $message = 'Hi ' . $info[0]['title'] . ' ' . $info[0]['name'] . ','
                    . 'Please an amount of GHS ' . $data['totalamount'] . ' payments have been received through '
                    . $data['mode'] . ' payments on ' . $request['payment_date'] . '.';
            $notifications->sendemail($info[0]['email_address'], 'Payment Notification', $message);
            //   $notifications->sendsms($info[0]['contactno'], $message);
            $tenantname = \App\Tenant::where('id', $data['tenant'])->first()->name;

            $audit = new AuditLogsController();
            $audit->saveActivity('Added new payment of: ' . $data['currency'] . ' ' . $data['totalamount'] . ' as ' . $data['description'] . ' to ' . $tenantname);

            return json_encode($dataresponse);
            /////
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Error in saving rent payment,Query Exception : ' . $e->getMessage());

            $data = array('success' => 2, 'message' => "Contact Administrator");
            return json_encode($data);
        } catch (\Exception $e) {
            Log::error('Error in saving rent payment,General Exception : ' . $e->getMessage());

            $data = array('success' => 2, 'message' => "Contact Administrator");
            return json_encode($data);
        }
    }

    public function savePaymentDetails($payment_id, $data) {

        $tenant_id = $data['tenant'];
        $payment_type = $data['paymenttype'];
        $rent_amount = $data['rent_amount'];
        $rent_period = $data['rent_period'];
        $rent_start_date = $data['start_date'];
        $rent_end_date = $data['end_date'];

        $currency = $data['currency'];
        $bill_amount = $data['bill_amount'];
        $balance = $data['remaining_amount'];

        if (in_array('rent', $payment_type)) {
            try {
                DB::insert('insert into payments (payment_id,tenant_id,currency,payment_type, rent_amount,rent_period,rent_start_date,rent_end_date)'
                        . ' values (?, ?,?,?,?,?,?,?)', ["$payment_id", "$tenant_id", "$currency", "rent", "$rent_amount", "$rent_period", "$rent_start_date", $rent_end_date]);
            } catch (Exception $e) {
                Log::error('Error in saving rent payment details,General Exception : ' . $e->getMessage());
            }
        }
        if (in_array('bill', $payment_type)) {
            $bill_date = explode('to', strip_tags($data['bill_date']));
            $bill_end_date = date('Y-m-d', strtotime($bill_date[1]));
            $bill_start_date = date('Y-m-d', strtotime($bill_date[0]));

            try {
                DB::insert('insert into payments (payment_id,tenant_id,currency,payment_type,bill_start_date,bill_end_date,bill_amount)'
                        . ' values (?,?,?,?,?,?,?)', ["$payment_id", "$tenant_id", "$currency", "bill", "$bill_start_date", "$bill_end_date", "$bill_amount"]);
            } catch (Exception $e) {
                Log::error('Error in saving bill payment details,General Exception : ' . $e->getMessage());
            }
        }

        if ($balance > 0) {


            try {

                DB::insert('insert into payments_surplus (payment_id,tenant_id,amount,currency)'
                        . ' values (?,?,?,?)', ["$payment_id", "$tenant_id", "$balance", "$currency"]);
            } catch (Exception $e) {
                Log::error('Error in saving  payment surplus,General Exception : ' . $e->getMessage());
            }
        }
    }

    public function savePaymentSurplus($paymentid, $data) {
        $balance = $data['remaining_amount'];
        $currency = $data['currency'];
        $tenant_id = $data['tenant'];


        try {
            DB::insert('insert into payments_surplus (payment_id,tenant_id,amount,currency)'
                    . ' values (?,?,?,?)', ["$paymentid", "$tenant_id", "$balance", "$currency"]);
        } catch (Exception $e) {
            Log::error('Error in saving  payment surplus,General Exception : ' . $e->getMessage());
        }
    }

    public function getRentpayments() {
        return DB::table('payments_view')->where('active', 0)
                        ->get();
    }

    public function markpaymentsascleared(Request $request) {


        $data = $request->all();
        $bank_name = $data['bank'];
        $total_amount = $data['totalmount'];
        $deposited_by = strip_tags($data['depositedby']);
        $payment_date = strip_tags($data['paymentdate']);
        if ($request->hasFile('depositslip')) {
            $scanned_id = $request->file('depositslip');
            $depositurl = $scanned_id->store('scanneddocuments');
        }
        $bank_code = $this->clearpayments($bank_name, $total_amount, $deposited_by, $payment_date, $depositurl);

        $inflowsids = $data['inflows'];
        $this->updatepaymentsascleared($bank_code, $inflowsids);
        return $bank_code;
    }

    public function clearpayments($bank_name, $total_amount, $deposited_by, $payment_date, $scanned_url) {

        $code = $this->unquecodeGenerator(8);
        $bank_code = 'BNK' . $code;
        $createdby = Session::get('userid');



        try {
            DB::insert('insert into cleared_payments (bank_code,bank_name,total_amount, deposited_by,payment_date,scanned_url,created_by) values (?, ?,?,?,?,?,?)', ["$bank_code", "$bank_name", "$total_amount", "$deposited_by", "$payment_date", "$scanned_url", $createdby]);
        } catch (Exception $e) {
            Log::error('Error in clearing  payment ,General Exception : ' . $e->getMessage());
        }
        return $bank_code;
    }

    public function updatepaymentsascleared($bank_code, $paymentsids) {


        try {
            DB::statement('update rent_payments set cleared_code= "' . $bank_code . '" where id in(' . $paymentsids . ')');
        } catch (Exception $e) {
            Log::error('Error in updating  payment as cleared with bank code::' . $bank_code . ' ,General Exception : ' . $e->getMessage());
        }
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
        $new->bank_name = strip_tags($data['bank_name']);
        $new->location = strip_tags($data['location']);
        $new->branch = strip_tags($data['branch']);
        $new->relationship_officer = strip_tags($data['relationship_officer']);
        $new->relationship_contact = strip_tags($data['relationship_contact']);
        $new->account_type = $data['account_type'];
        $new->currency = $data['currency'];
        $new->account_no = strip_tags($data['account_number']);
        $new->modified_by = Session::get('id');


        try {

            $new->save();
            $audit = new AuditLogsController();
            $audit->saveActivity('Update Bank ' . $data['bank_name'] . ' Information');
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

    public function getPaymentInfo($id) {
        $payments_info = DB::table('payments_view')->where('id', $id)->get()->toArray();
        $payments_details = DB::table('payments')->where('payment_id', $id)->get()->toArray();
        $data = array(
            'info' => $payments_info,
            'details' => $payments_details
        );
        echo json_encode($data);
    }

    public function deletePaymentInfo($id) {
//        $update = RentPayments::find($id);
//        $update->active = 1;
//        $update->modified_by = Session::get('id');
//        $update->modified_at = date('Y-m-d H:i:s');
        $new = RentPayments::find($id);
        $new->delete();
        try {
            $update->save();
            return '0';
        } catch (Exception $e) {
            Log::error('Error in deleting  payment info with payment id ::' . $id . ' ,General Exception : ' . $e->getMessage());
            return '1';
        }
    }

    public function updateRentPayment(Request $request) {


        $data = $request->all();

        $mode = $data['mode'];
        $new = RentPayments::find($data['code']);
        if ($mode == "Bank Deposit") {
            $bank = explode('-', $data['bank']);
            $new->bank_id = $bank[0];
            $new->bank_name = $bank[1];
            $new->accountno = $bank[2];
            if (!empty($request->hasFile('depositurl'))) {

                $scanned_id = $request->file('depositurl');
                $depositurl = $scanned_id->store('scanneddocuments');

                $new->deposit_url = $depositurl;
            }
        }

        if ($mode == "Cheque") {
            if (!empty($request->hasFile('chequeurl'))) {

                $scanned_id = $request->file('chequeurl');
                $chequeurl = $scanned_id->store('scanneddocuments');
                $new->cheque_url = $chequeurl;
            }
        }
        $new->amount = $data['amount'];
        $new->description = strip_tags($data['description']);
        $new->payment_date = strip_tags($request['payment_date']);
        $new->mode = strip_tags($data['mode']);
        $new->reason = strip_tags($data['reason']);

        $new->modified_by = Session::get('id');
        $new->modified_at = date('Y-m-d H:i:s');

        try {
            $new->save();


            $dataresponse = array('success' => 0, 'message' => 'update information successfully');

            return json_encode($dataresponse);
        } catch (\Illuminate\Database\QueryException $e) {

            Log::error('Error in updating  rent payment info with rent id ::' . $data['code'] . ' ,Query Exception : ' . $e->getMessage());

            $data = array('success' => 1, 'message' => "Error in updating rent payment info.Contact Administrator");
            return json_encode($data);
        } catch (Exception $e) {
            Log::error('Error in updating  rent payment info with rent id ::' . $data['code'] . ' ,General Exception : ' . $e->getMessage());
            $data = array('success' => 1, 'message' => "Error in updating rent info.Contact Administrator");
            return json_encode($data);
        }
    }

    public function getRentpaymentsPeriod(Request $request) {

        $data = $request->all();

        //  $daterange = explode("to", strip_tags($data['daterange']));
        $start_date = date("Y-m-d", strtotime($data['start_date']));

        $end_date = date("Y-m-d", strtotime($data['end_date']));
        $tenant = strip_tags($data['tenant']);


        $result = DB::table('payments_view')
                ->where('tenant_id', '=', $tenant)
                ->whereBetween('payment_date', [$start_date, $end_date])
                ->get();

        return $result;
    }

    public function validaterentDate($tenant_id, $date) {


        $date = date('Y-m-d', strtotime($date));


        $result = DB::select('select count(id)as total from payments where payment_type="rent" and tenant_id=' . $tenant_id . ' and "' . $date . '"   BETWEEN rent_start_date AND rent_end_date');
        $resultArray = json_decode(json_encode($result), true);
        return $resultArray[0]['total'];
    }

    public function validateBillDate($tenant_id, $date) {

        $date = date('Y-m-d', strtotime($date));

        $result = DB::select('select count(id)as total from payments where payment_type="bill" and tenant_id=' . $tenant_id . ' and "' . $date . '"   BETWEEN bill_start_date AND bill_end_date');
        $resultArray = json_decode(json_encode($result), true);
        return $resultArray[0]['total'];
    }

}
