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
use Illuminate\Support\Facades\Session;

class BankController extends Controller {

    public function showbanks() {



        return view('banks');
    }

    public function getBanks() {

        // $banks = DB::table('banks_view')->get();
        return DB::table('banks_view')->where('active', 0)
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

  
}
