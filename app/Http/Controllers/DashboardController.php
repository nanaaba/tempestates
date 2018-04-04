<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ReportController;

class DashboardController extends Controller {

    public function showdashboard() {

        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }

        $reports = new ReportController();
        $tenants = $this->totalTenants();
        $apartments = $this->totalAvailableApartments();
        $expiring_rent = $this->expiringRentCount();
        $owingtenants = $reports->getRentOwingTenants();
        $expiring_rent_data = $this->expiringRents();

        return view('dashboard')
                        ->with('totaltenants', $tenants)
                        ->with('totalapartments', $apartments)
                        ->with('totalexpiringrent', $expiring_rent)
                        ->with('owingtenants', $owingtenants)
                        ->with('expiringrents', $expiring_rent_data);
    }

    public function totalTenants() {

        $total = DB::table('tenants')->where('active', 0
                )->count();
        return $total;
    }

    public function totalAvailableApartments() {

        $total = DB::table('apartments')->where(array(
                    'availability' => 'available',
                    'active' => 0
                ))->count();
        return $total;
    }

    public function expiringRentCount() {

        $total = DB::table('expiring_rent')->count();
        return $total;
    }

    public function expiringRents() {

        return DB::table('expiring_rent')->where('tenant_active', 0)->get();
    }

    //expiring_rent
}
