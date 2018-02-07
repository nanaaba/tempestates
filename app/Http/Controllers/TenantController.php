<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tenant;
use App\TenantDocuments;
use App\TenantBills;
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

    public function saveTenantInformation(Request $request) {

        $data = $request->all();


        $new = new Tenant();

        $createdby = $request->session()->get('id');

        if ($request->hasFile('pic_file')) {
            $picfile = $request->file('pic_file');
            $profilepic = $picfile->store('profilepics');
        }

        if ($request->hasFile('scanned_id')) {
            $scanned_id = $request->file('scanned_id');
            $scanned_file = $scanned_id->store('scannedids');
        }

        $new->name = $data['name'];
        $new->dateofbirth = $data['estate'];
        $new->gender = $data['currency'];
        $new->nationality = $data['monthly_charge'];
        $new->name = $data['name'];
        $new->postal_address = $data['estate'];
        $new->gender = $data['currency'];
        $new->hometown = $data['monthly_charge'];
        $new->email_address = $data['name'];
        $new->contactno = $data['estate'];
        $new->previous_resident = $data['currency'];
        $new->current_resident = $data['monthly_charge'];
        $new->id_number = $data['name'];
        $new->scanned_id = $data['estate'];
        $new->employment_status = $data['currency'];
        $new->occupation = $data['monthly_charge'];
        $new->company = $data['estate'];
        $new->company_address = $data['currency'];
        $new->company_numbers = $data['monthly_charge'];
        $new->company_area = $data['name'];
        $new->company_street = $data['estate'];
        $new->company_location = $data['currency'];
        $new->marital_status = $data['monthly_charge'];
        $new->children = $data['estate'];
        $new->nextkin = $data['currency'];
        $new->nextkin_contact = $data['monthly_charge'];
        $new->nextkin_address = $data['name'];
        $new->nextkin_location = $data['estate'];
        $new->nextkin_occupation = $data['currency'];
        $new->nextkin_workplace = $data['monthly_charge'];
        $new->created_by = Session::get('id');
        $new->modified_by = Session::get('id');
        $new->modified_at = date('Y-m-d H:i:s');
//        $documents = $request->file('documents');

        $saved = $new->save();

        if ($saved) {

            $tenant_id = $new->id;
            $rent_id = $this->saveTenantRent($data['estate'], $data['estate'], $data['estate'], $data['estate'], $data['estate'], $data['estate']);
            $this->uploadDocuments($request->file('documents'), $tenant_id, $rent_id);
            return '0';
        } else {
            return '1';
        }
    }

    public function uploadDocuments($documents, $tenant, $rent) {




        foreach ($documents as $document) {
            $filename = $document->store('documents');
            TenantDocuments::create([
                'tenant_id' => $tenant,
                'rent_id' => $rent,
                'url' => $filename
            ]);
        }
        return 'Upload successful!';
    }

    public function saveTenantRent($apartment, $tenant, $period, $amount, $startdate, $enddate) {

        $createdby = Session::get('id');


        $rentid = DB::insertGetId('insert into rent (apartment_id,tenant_id,period, amount,start_date,end_date,created_by) values (?,?,?,?,?,?,?)', ["$apartment", "$tenant", "$period", "$amount", "$startdate", "$enddate", $createdby]);

        return $rentid;
    }

    public function savetenantPayment($rent, $amount, $paymentdate, $description, $mode, $url = null) {

        DB::table('rent_payments')->insert(["rent_id" => $rent, "payment_date" => $paymentdate, "url" => $url, "amount" => $amount, "description" => $description, "mode" => $mode]);

        return 0;
    }

    public function saveTenantService(Request $request) {

        $data = $request->all();

        $new = new TenantBills();

        $new->tenant_id = $data['tenant'];
        $new->amount = $data['service_amount'];
        $new->serviced_date = $data['date_serviced'];
        $new->description = $data['service_description'];
        $new->service_id = $data['service_type'];

        $saved = $new->save();

        if ($saved) {

           return '0';
        } else {
            return '1';
        }
    }
    
    
      public function getTenants() {
        return Tenant::all()->toJson();
    }


}
