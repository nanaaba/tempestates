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
        $new->payment_date = $data['payment_date'];
        $new->mode = $data['mode'];
        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    
    public function getRentpayments() {
          return DB::table('rent_payments')->get();
    }
}
