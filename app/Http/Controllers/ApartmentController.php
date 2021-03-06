<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\ApartmentFacilities;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApartmentController extends Controller {

    public function showaparments() {

        return view('apartments');
    }

    public function getAvailableApartments() {

        return Apartment::where(array('active' => 0, 'availability' => 'available'))
                        ->get();
    }

    public function getAllApartments() {

        return Apartment::where('active', 0)
                        ->get();
    }

    public function deleteApartment($id) {


        $update = Apartment::find($id);
        $name = $update->name;
        $update->active = 1;
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');


        try {
            $update->save();
            $audit = new AuditLogsController();
            $audit->saveActivity('Deleted apartment: ' . $name);

            return '0';
        } catch (Exception $ex) {

            Log::error('Error in deleting apartment : ' . $ex->getMessage());
            return '1';
        }
    }

    public function updateApartment(Request $request) {

        $data = $request->all();

        $id = $data['code'];
        $update = Apartment::find($id);
        $update->name = strip_tags($data['name']);
        $update->estate_id = strip_tags($data['estate']);
        $update->currency = strip_tags($data['currency']);
        $update->monthly_charge = strip_tags($data['monthly_charge']);
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');
        $update->type = $data['type'];


        try {
            $update->save();
            $audit = new AuditLogsController();
            $audit->saveActivity('Updated apartment: ' . strip_tags($data['name']));

            $this->deleteApartmentFacilities($id);
            $this->saveApartmentFacilities($data['name'], $id, $data['facilities']);
            return '0';
        } catch (Exception $ex) {
            Log::error('Error in updating apartment : ' . $ex->getMessage());
            return '1';
        }
    }

    public function saveApartment(Request $request) {

        $data = $request->all();
        $new = new Apartment();

        $new->name = strip_tags($data['name']);
        $new->estate_id = strip_tags($data['estate']);
        $new->type = strip_tags($data['type']);
        $new->currency = strip_tags($data['currency']);
        $new->monthly_charge = strip_tags($data['monthly_charge']);
        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');






        try {
            $new->save();
            $apartment_id = $new->id;
            $audit = new AuditLogsController();
            $audit->saveActivity('Added new apartment: ' . strip_tags($data['name']));

            $this->saveApartmentFacilities($data['name'], $apartment_id, $data['facilities']);

            return '0';
        } catch (Exception $ex) {
            Log::error('Error in saving apartment : ' . $ex->getMessage());
            return '1';
        }
    }

    public function getApartmentDetail($id) {

        return Apartment::where('id', $id)
                        ->get();
    }

    public function getApartmentFacilities($id) {


        return ApartmentFacilities::where('apartment_id', $id)
                        ->get();
    }

    public function saveApartmentFacilities($apartname, $apartmentid, $facilties) {

        $dataArray = [];
        foreach ($facilties as $item) { //$intersts array contains input data
            $data = new ApartmentFacilities();
            $data->apartment_id = $apartmentid;
            $data->facility = $item;
            $audit = new AuditLogsController();
            $audit->saveActivity('Added new faciltiy: ' . $item . ' to ' . $apartname);

            $dataArray[] = $data->attributesToArray();
        }
        try {
            ApartmentFacilities::insert($dataArray);
        } catch (Exception $ex) {
            Log::error('Error in saving bulk apartment facilities for ' . $apartname . ' : ' . $ex->getMessage());
        }
    }

    public function deleteApartmentFacilities($apartmentid) {


        try {
            DB::table('apartments_facilities')->where('apartment_id', $apartmentid)->delete();
        } catch (Exception $ex) {
            Log::error('Error deleting apartment facilities ' . $ex->getMessage());
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

}
