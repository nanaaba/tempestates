<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent;

class ReportController extends Controller {

    public function showbills() {

        return view('reportbills');
    }

    public function showpayments() {

        return view('reportpayments');
    }

    public function showrents() {

        return view('reportrents');
    }

    public function showexpiryrent() {

        return view('reportexpiryrent');
    }

    public function showavailableapartments() {

        return view('reportavailableapartments');
    }

    public function showclearedpayments() {

        return view('reportclearedpayments');
    }

    
    public function getPaymentsTrend() {
        $currentyear = date("Y");
        return DB::table('cummulative_payments')->where('year',$currentyear)->get();
    }
}
