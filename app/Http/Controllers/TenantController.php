<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationsController;
use Illuminate\Http\Request;
use App\Tenant;
use App\TenantDocuments;
use App\TenantBills;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ApartmentController;
use Illuminate\Support\Facades\Log;

class TenantController extends Controller {

    public function showtenants() {

        return view('tenants');
    }

    public function showalltenants() {
        return view('alltenants');
    }
    public function showcurrenttenants() {
        return view('currenttenants');
    }
    
    public function showprevioustenants() {
        return view('previoustenants');
    }
    
    //

    public function showtenantsservices() {
        return view('tenantsservices');
    }

    public function showtenantsbill() {
        return view('tenantbills');
    }

    public function saveTenantInformation(Request $request) {

        $data = $request->all();
        $tenantcode = 'TNT' . $this->generateuniqueCode(5);

        $email = strip_tags($data['email']);
        $exist = $this->checkemailexistence($email);
        if ($exist == 1) {
            $data = array('success' => 2, 'message' => "Email already exist" . $exist);
            return json_encode($data);
        } else {
            $new = new Tenant();
            if ($request->hasFile('pic_file')) {
                //unlink file
                $picfile = $request->file('pic_file');
                $profilepic = $picfile->store('profilepics');
                $new->profile_pic = $profilepic;
            }

            if ($request->hasFile('scanned_id')) {
                //$this->deleteFile(strip_tags($data['scanned_id']));

                $scanned_id = $request->file('scanned_id');
                $scanned_file = $scanned_id->store('scanneddocuments');
                $new->scanned_id = $scanned_file;
            }

            $new->title = strip_tags($data['title']);
            $new->name = strip_tags($data['fullname']);
            $new->dateofbirth = strip_tags(date('Y-m-d', strtotime($data['dob'])));
            $new->gender = strip_tags($data['gender']);
            $new->nationality = strip_tags($data['nationality']);
            $new->hometown = strip_tags($data['hometown']);
            $new->email_address = strip_tags($data['email']);
            $new->contactno = strip_tags($data['phone_number']);
            $new->previous_resident = strip_tags($data['previous_resident']);
            $new->current_resident = strip_tags($data['current_resident']);
            $new->id_number = strip_tags($data['id_number']);
            $new->employment_status = strip_tags($data['employment_status']);
            $new->occupation = strip_tags($data['occupation']);
            $new->company = strip_tags($data['company']);
            $new->company_address = strip_tags($data['company_address']);
            $new->company_numbers = strip_tags($data['office_numbers']);
            $new->company_area = strip_tags($data['office-area']);
            $new->position = strip_tags($data['position']);
            $new->company_street = strip_tags($data['office_street']);
            $new->company_location = strip_tags($data['office_location']);
            $new->marital_status = strip_tags($data['marital_status']);
            $new->children = strip_tags($data['children']);
            $new->nextkin = strip_tags($data['nextofkin']);
            $new->nextkin_contact = strip_tags($data['phoneno']);
            $new->nextkin_address = strip_tags($data['nextkin_address']);
            $new->nextkin_location = strip_tags($data['nextkin_hse']);
            $new->nextkin_occupation = strip_tags($data['nextkin_occupation']); //emergency_contact
            $new->nextkin_workplace = strip_tags($data['nextkin_work']);
            $new->emergency_contact = strip_tags($data['emergency_contact']);
            $new->tenant_code = $tenantcode;

            $new->created_by = Session::get('id');
            $new->modified_by = Session::get('id');
            $new->modified_at = date('Y-m-d H:i:s');

            try {
                $saved = $new->save();

                if ($saved) {
                    $audit = new AuditLogsController();
                    $audit->saveActivity('Added new  tenant  ' . $data['fullname'] . ' information');

                    $tenant_id = $new->id;
                    $this->saveTenantRent(strip_tags($data['apartment']), $tenant_id, strip_tags($data['rent_period']), strip_tags($data['currency']), strip_tags($data['amount']), strip_tags($data['start_date']), strip_tags($data['end_date']));
                    if ($request->hasFile('documents')) {
                        $this->uploadDocuments($request->file('documents'), $tenant_id);
                    }

                    $apartment = new ApartmentController();
                    $apartmentInformation = $apartment->getApartmentDetail(strip_tags($data['apartment']));
                    $apartinfo = json_decode($apartmentInformation, true);


                    $message = "Hello," . strip_tags($data['title']) . ' ' . strip_tags($data['fullname']) .
                            '.You have rented our ' . $apartinfo[0]['name'] . ' apartment for the period of ' . strip_tags($data['rent_period']) . 'months.'
                            . ' Please kindly take notice of your tenant code : ' . $tenantcode . '. '
                            . 'Thank you for choosing Rotamac Real Estates.Enjoy your stay in your new apartment';

                    $notifications = new NotificationsController();
                    $notifications->sendemail(strip_tags($data['email']), ' Tenant Registration', $message);
                    $notifications->sendsms(strip_tags($data['phone_number']), $message);

                    $data = array('success' => 0, 'tenat_id' => $tenantcode);
                    return json_encode($data);
                } else {
                    $data = array('success' => 1, 'tenat_id' => '');
                    return json_encode($data);
                }
            } catch (\Illuminate\Database\QueryException $e) {
                Log::emergency("Unable to save Tenant Information:" . $e->getMessage());
                Log::info($request->all());

                $data = array('success' => 2, 'message' => $e->getMessage());
                return json_encode($data);
            } catch (\App\Exceptions $e) {
                Log::emergency("Unable to save Tenant Information:" . $e->getMessage());
                Log::info($request->all());

                $data = array('success' => 2, 'message' => $e->getMessage());
                return json_encode($data);
            } catch (Exception $e) {

                Log::emergency("Unable to save Tenant Information:" . $e->getMessage());
                Log::info($request->all());

                $data = array('success' => 2, 'message' => $e->getMessage());
                return json_encode($data);
            }
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

        $startdate = date('Y-m-d', strtotime($startdate));
        $enddate = date('Y-m-d', strtotime($enddate));

        DB::insert('insert into rent (apartment_id,tenant_id,period,currency, amount,start_date,end_date,created_by) values (?,?,?,?,?,?,?,?)', ["$apartment", "$tenant", "$period", "$currency", "$amount", "$startdate", "$enddate", $createdby]);
        $this->setApartmentStatus($apartment);
    }

    public function setApartmentStatus($apartment) {

        $createdby = Session::get('id');



        DB::insert('UPDATE apartments SET availability="booked",booked_by=' . $createdby . ',booked_date=now() WHERE id=' . $apartment . '');
        //  return $rentid;
    }

    public function updateTenantRent($apartment, $tenant, $period, $currency, $amount, $startdate, $enddate) {

        $createdby = Session::get('id');
        $startdate = date('Y-m-d', strtotime($startdate));
        $enddate = date('Y-m-d', strtotime($enddate));

        $result = DB::table('rent')->where(array(
                    'tenant_id' => $tenant
                ))->count();
        if ($result == 0) {
            DB::insert('insert into rent (apartment_id,tenant_id,period,currency, amount,start_date,end_date,created_by) values (?,?,?,?,?,?,?,?)', ["$apartment", "$tenant", "$period", "$currency", "$amount", "$startdate", "$enddate", $createdby]);
        } else {
            DB::insert("update rent set apartment_id='$apartment' ,period='$period',currency='$currency', amount='$amount',start_date='$startdate',end_date='$enddate',modified_by='$createdby' where tenant_id=$tenant");
        }
        $this->setApartmentStatus($apartment);
    }

    public function savetenantPayment($rent, $amount, $paymentdate, $description, $mode, $url = null) {

        DB::table('rent_payments')->insert(["rent_id" => $rent, "payment_date" => $paymentdate, "url" => $url, "amount" => $amount, "description" => $description, "mode" => $mode]);

        return 0;
    }

    public function saveTenantService(Request $request) {

        $data = $request->all();

        $new = new TenantBills();
        $date_serviced = date('Y-m-d', strtotime($request['date_serviced']));

        $new->tenant_id = strip_tags($data['tenant']);
        $new->amount = strip_tags($data['service_amount']);
        $new->serviced_date = $date_serviced;
        $new->description = strip_tags($data['service_description']);
        $new->service_id = strip_tags($data['service_type']);

        $saved = $new->save();

        if ($saved) {

            $tenant_name = Tenant::where('id', $data['tenant'])->first()->name;

            $audit = new AuditLogsController();
            $audit->saveActivity('Added   ' . $data['service_description'] . ' as service requested to tenant ' . $tenant_name);

            $service = new ServiceController();
            $serviceInformation = $service->getServiceDetail(strip_tags($data['service_type']));
            $serviceinfo = json_decode($serviceInformation, true);


            $tenants_info = $this->getTenantInformation(strip_tags($data['tenant']));
            $info = json_decode($tenants_info, true);
            $message = "Hello," . $info[0]['title'] . ' ' . $info[0]['name'] . " Please you requested for this service "
                    . strip_tags($data['service_description']) . ' on ' . strip_tags($data['date_serviced']) .
                    '. Your charge is GHS ' . strip_tags($data['service_amount']) . '. Your bill will be sent at the end of the month.'
                    . 'Thank you for choosing Rotamac Real Estates.';

            $notifications = new NotificationsController();
            $notifications->sendemail($info[0]['email_address'], $serviceinfo[0]['name'] . ' Service Requested', $message);
            //$notifications->sendsms(strip_tags($info[0]['contactno']), $message);

            return '0';
        } else {
            return '1';
        }
    }

    public function retreiveTenantBill(Request $request) {

        $data = $request->all();

       // $daterange = explode("to", strip_tags($data['daterange']));
        $start_date = date("Y-m-d", strtotime($data['start_date']));

        $end_date = date("Y-m-d", strtotime($data['end_date']));
        $tenant = strip_tags($data['tenant']);


        $bills = DB::table('tenant_bills_view')
                ->where('tenant_id', '=', $tenant)
                ->whereBetween('serviced_date', [$start_date, $end_date])
                ->get();

        return $bills;
    }

    public function getAllTenantsBills() {

        return DB::table('tenant_bills_view')->where('active', 0)->get();
    }

    public function getTenants() {
        return DB::table('tenants_view')->where('active', 0)->get();
    }
    
    public function getCurrentTenants() {
        return DB::table('tenants_view')->where(
                array(
                    'end_date','>=', date('Y-m-d'),
                    'active'=>0)
                )->get();
    }
    
    public function getPreviousTenants() {
        return DB::table('tenants_view')->where(
                array(
                    'end_date','<', date('Y-m-d'),
                    'active'=>0)
                )->get();
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
        $tenantid = $this->getTenantId($id);
        return DB::table('tenants_documents')->where('tenant_id', $tenantid)->get();
    }

    public function getTenantId($code) {

        return DB::table('tenants_view')->where('tenant_code', $code)->pluck('id');
    }

    public function getBillInfo($id) {

        return DB::table('tenant_bills_view')->where('id', $id)->get();
    }

    public function deleteTenantInformation($id) {

        $update = Tenant::find($id);
        $name = $update->name;
        $update->active = 1;
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');
        $saved = $update->save();

        if (!$saved) {
            return '1';
        } else {
            $audit = new AuditLogsController();
            $audit->saveActivity('Deleted tenant   ' . $name . ' information');

            return '0';
        }
    }

    public function updateTenantInformation(Request $request) {


        $data = $request->all();



        $new = Tenant::find(strip_tags($data['tenant_id']));

        if (!empty($request->hasFile('pic_file'))) {

            $picfile = $request->file('pic_file');
            $profilepic = $picfile->store('profilepics');
            $new->profile_pic = $profilepic;
        }

        if (!empty($request->hasFile('scanned_id'))) {
            $scanned_id = $request->file('scanned_id');
            $scanned_file = $scanned_id->store('scanneddocuments');
            $new->scanned_id = $scanned_file;
        }

        if (!empty($request->hasFile('documents'))) {
            $this->uploadDocuments($request->file('documents'), $data['tenant_id']);
        }


//        
        $new->title = strip_tags($data['title']);
        $new->name = strip_tags($data['fullname']);
        $new->dateofbirth = strip_tags($data['dob']);
        $new->gender = strip_tags($data['gender']);
        $new->nationality = strip_tags($data['nationality']);
        $new->hometown = strip_tags($data['hometown']);
        $new->email_address = strip_tags($data['email']);
        $new->contactno = strip_tags($data['phone_number']);
        $new->previous_resident = strip_tags($data['previous_resident']);
        $new->current_resident = strip_tags($data['current_resident']);
        $new->id_number = strip_tags($data['id_number']);
        $new->employment_status = strip_tags($data['employment_status']);
        $new->occupation = strip_tags($data['occupation']);
        $new->company = strip_tags($data['company']);
        $new->company_address = strip_tags($data['company_address']);
        $new->company_numbers = strip_tags($data['office_numbers']);
        $new->company_area = strip_tags($data['office-area']);
        $new->position = strip_tags($data['position']);
        $new->company_street = strip_tags($data['office_street']);
        $new->company_location = strip_tags($data['office_location']);
        $new->marital_status = strip_tags($data['marital_status']);
        $new->children = strip_tags($data['children']);
        $new->nextkin = strip_tags($data['nextofkin']);
        $new->nextkin_contact = strip_tags($data['phoneno']);
        $new->nextkin_address = strip_tags($data['nextkin_address']);
        $new->nextkin_location = strip_tags($data['nextkin_hse']);
        $new->nextkin_occupation = strip_tags($data['nextkin_occupation']); //emergency_contact
        $new->nextkin_workplace = strip_tags($data['nextkin_work']);
        $new->emergency_contact = strip_tags($data['emergency_contact']);
        $new->modified_by = Session::get('id');
        $new->modified_at = date('Y-m-d H:i:s');

        try {
            $saved = $new->save();

            if ($saved) {
                $this->updateTenantRent(strip_tags($data['apartment']), $data['tenant_id'], strip_tags($data['rent_period']), strip_tags($data['currency']), strip_tags($data['amount']), strip_tags($data['start_date']), strip_tags($data['end_date']));

                $audit = new AuditLogsController();
                $audit->saveActivity('Updated tenant information' . $data['fullname'] . ' information');

                $data = array('success' => 0, 'tenat_id' => '');


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

    private function generateuniqueCode($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function deleteFile($filepath) {
        if (file_exists($filepath)) {
            @unlink($filepath);
        }
    }

    public function getTenantInformation($id) {
        return DB::table('tenants_view')->where('id', $id)->get();
    }

    function checkemailexistence($email) {

        $result = DB::table('tenants')->where(array(
                    'email_address' => $email,
                    'active' => 0
                ))->count();


        return $result;
    }

    public function updateBillInformation(Request $request) {


        $data = $request->all();

        $new = TenantBills::find(strip_tags($data['code']));

        $new->amount = strip_tags($data['service_amount']);
        $new->serviced_date = $request['date_serviced'];
        $new->description = strip_tags($data['service_description']);
        $new->service_id = strip_tags($data['service_type']);
        $new->reason = strip_tags($data['reason']);

        $saved = $new->save();

        if ($saved) {


            return '0';
        } else {
            return '1';
        }
    }

    public function deleteBillInformation($id) {

        $update = TenantBills::find($id);
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

    public function getRents() {
        return DB::table('rent_view')->where('tenant_active', 0)->get();
    }

    public function getExpiringRents() {
        return DB::table('rent_expiring')->where('tenant_active', 0)->get();
    }

    public function getExpiredRents() {
        return DB::table('expired_rents')->where('tenant_active', 0)->get();
    }

    //

    public function getTenantRentInformation($id) {

        return DB::table('rent_view')->where('tenant_id', $id)->get();
    }

    public function getTenantTotalBill(Request $request) {

        $data = $request->all();

        $var = explode('to', $data['daterange']);
        $startdate = date('Y-m-d', strtotime($var[0]));
        $enddate = date('Y-m-d', strtotime($var[1]));
        $tenant = $data['tenant'];

        $results = DB::select('CALL tenantTotalBill(?,?,?)', array($tenant, $startdate, $enddate));
        return $results;
    }

}
