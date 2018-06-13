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

    public function showtenantinfo($id) {
        //return $id;
        $info = $this->getTenantDetail($id);
        $payment = $this->getTenantPaymentHist($id);
        $rent = $this->getTenantRentHist($id);
        $current_rent = $this->getTenantCurrentRent($id);
        return view('tenantreportdetail')
                        ->with('information', $info)
                        ->with('payment', $payment)
                        ->with('rent', $rent)
                        ->with('current_rent', $current_rent);
    }

    public function getTenantDetail($id) {
        return DB::table('tenants_view')->where('id', $id)->get();
    }

    public function getTenantRentHist($id) {
        return DB::table('previous_rent')->where('tenant_id', $id)->get();
    }

    public function getTenantCurrentRent($id) {
        return DB::table('rent_view')->where('tenant_id', $id)->get();
    }

    public function getTenantPaymentHist($id) {
        return DB::table('rent_payments')->where('tenant_id', $id)->get();
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

    public function showtenantsowing() {
        return view('reporttenantsowing');
    }

    public function getPaymentsTrend() {
        $currentyear = date("Y");
        return DB::table('cummulative_payments')->where('year', $currentyear)->get();
    }

    public function getRentOwingTenants() {
        return DB::table('rentowingtenants')->where('amount_owing', '>', 0)->get();
    }

    public function getBillOwingTenants() {
        return DB::table('billowingtenant')->where('amount_owing', '>', 0)->get();
    }

}
