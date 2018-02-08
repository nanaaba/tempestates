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
use Illuminate\Support\Facades\DB;

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
        $tenantcode = 'TNT' . $this->generateuniqueCode(5);


        $new = new Tenant();
        if ($request->hasFile('pic_file')) {
            $picfile = $request->file('pic_file');
            $profilepic = $picfile->store('profilepics');
            $new->profile_pic = $profilepic;
        }

        if ($request->hasFile('scanned_id')) {
            $scanned_id = $request->file('scanned_id');
            $scanned_file = $scanned_id->store('scanneddocuments');
            $new->scanned_id = $scanned_file;
        }
        $new->title = $data['title'];
        $new->name = $data['fullname'];
        $new->dateofbirth = $data['dob'];
        $new->gender = $data['gender'];
        $new->nationality = $data['nationality'];
        $new->hometown = $data['hometown'];
        $new->email_address = $data['email'];
        $new->contactno = $data['phone_number'];
        $new->previous_resident = $data['previous_resident'];
        $new->current_resident = $data['current_resident'];
        $new->id_number = $data['id_number'];
        $new->employment_status = $data['employment_status'];
        $new->occupation = $data['occupation'];
        $new->company = $data['company'];
        $new->company_address = $data['company_address'];
        $new->company_numbers = $data['office_numbers'];
        $new->company_area = $data['office-area'];
        $new->position = $data['position'];
        $new->company_street = $data['office_street'];
        $new->company_location = $data['office_location'];
        $new->marital_status = $data['marital_status'];
        $new->children = $data['children'];
        $new->nextkin = $data['nextofkin'];
        $new->nextkin_contact = $data['phoneno'];
        $new->nextkin_address = $data['nextkin_address'];
        $new->nextkin_location = $data['nextkin_hse'];
        $new->nextkin_occupation = $data['nextkin_occupation']; //emergency_contact
        $new->nextkin_workplace = $data['nextkin_work'];
        $new->emergency_contact = $data['emergency_contact'];
        $new->tenant_code = $tenantcode;

        $new->created_by = Session::get('id');
        $new->modified_by = Session::get('id');
        $new->modified_at = date('Y-m-d H:i:s');

        try {
            $saved = $new->save();

            if ($saved) {
                $tenant_id = $new->id;
                $this->saveTenantRent($data['apartment'], $tenant_id, $data['rent_period'], $data['currency'], $data['amount'], '2018-02-01', '2018-10-10');
                $this->uploadDocuments($request->file('documents'), $tenant_id);

                $data = array('success' => 0, 'tenat_id' => $tenantcode);
                return json_encode($data);
            } else {
                $data = array('success' => 1, 'tenat_id' => '');
                return json_encode($data);
            }
        } catch (\Illuminate\Database\QueryException $e) {
             $data = array('success' => 2, 'message' => $e->getMessage());
                return json_encode($data);
        }
    }

    public function uploadDocuments($documents, $tenant) {




        foreach ($documents as $document) {
            $filename = $document->store('scanneddocuments');
            TenantDocuments::create([
                'tenant_id' => $tenant,
                'url' => $filename
            ]);
        }
        return 'Upload successful!';
    }

    public function saveTenantRent($apartment, $tenant, $period, $currency, $amount, $startdate, $enddate) {

        $createdby = Session::get('id');


        DB::insert('insert into rent (apartment_id,tenant_id,period,currency, amount,start_date,end_date,created_by) values (?,?,?,?,?,?,?,?)', ["$apartment", "$tenant", "$period", "$currency", "$amount", "$startdate", "$enddate", $createdby]);

        //  return $rentid;
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

    public function retreiveTenantBill(Request $request) {

        $data = $request->all();

        $daterange = explode("to", $data['daterange']);
        $start_date = $daterange[0];
        $end_date = $daterange[1];
        $tenant = $data['tenant'];


        $bills = DB::table('tenant_bills_view')
                ->where('tenant_id', '=', $tenant)
                ->whereBetween('serviced_date', [$start_date, $end_date])
                ->get();

        return $bills;
    }

    public function getTenants() {
        return DB::table('tenants_view')->get();
    }

    public function showtenantinformation($id) {

        $info = $this->getTenantDetail($id);
        $documents = $this->getTenantDocuments($id);
        return view('tenantinformation')->with('information', $info)
                        ->with('documents', $documents);
    }

    public function getTenantDetail($id) {
        return DB::table('tenants_view')->where('tenant_code', $id)->get();
    }

    public function getTenantDocuments($id) {
        return DB::table('tenants_documents')->where('tenant_id', 1)->get();
    }

    public function deleteTenantInformation($id) {

        $update = Tenant::find($id);
        $update->active = 1;
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');
        $saved = $update->save();

        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateTenantInformation(Request $request) {
//        if ($request->hasFile('pic_file')) {
//            $picfile = $request->file('pic_file');
//            $profilepic = $picfile->store('profilepics');
//            echo'wow';
//        }
//
//        if ($request->hasFile('scanned_id')) {
//            $scanned_id = $request->file('scanned_id');
//            $scanned_file = $scanned_id->store('scannedids');
//            echo 'wowwww';
//        }
    }

    private function generateuniqueCode($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
