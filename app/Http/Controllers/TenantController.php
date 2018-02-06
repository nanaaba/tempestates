<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facility;
use App\ApartmentFacilities;
use Illuminate\Support\Facades\Session;

class TenantController extends Controller {

    public function showtenants() {

        return view('tenants');
    }

    public function showalltenants() {
        return view('alltenants');
    }

    public function showtenantsservices() {
        return view('tenantsservices');
    }

    public function showtenantsbill() {
        return view('tenantbills');
    }

}
