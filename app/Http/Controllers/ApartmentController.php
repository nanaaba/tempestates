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

class ApartmentController extends Controller {

    public function showaparments() {

        return view('apartments');
    }

    public function getApartments() {

        return Apartment::where('active', 0)
                        ->get();
    }

    public function deleteApartment($id) {


        $update = Apartment::find($id);
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

    public function updateApartment(Request $request) {

        $data = $request->all();

        $id = $data['code'];
        $update = Apartment::find($id);
        $update->name = $data['name'];
        $update->estate_id = $data['estate'];
        $update->currency = $data['currency'];
        $update->monthly_charge = $data['monthly_charge'];
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');
        $update->type = $data['type'];

        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
              $this->deleteApartmentFacilities($id);
            $this->saveApartmentFacilities($id, $data['facilities']);
            return '0';
        }
    }

    public function saveApartment(Request $request) {

        $data = $request->all();
        $new = new Apartment();

        $new->name = $data['name'];
        $new->estate_id = $data['estate'];
        $new->type = $data['type'];
        $new->currency = $data['currency'];
        $new->monthly_charge = $data['monthly_charge'];
        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');

        $saved = $new->save();
        $apartment_id = $new->id;
        if (!$saved) {
            return '1';
        } else {
            $this->saveApartmentFacilities($apartment_id, $data['facilities']);
            return '0';
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

    public function saveApartmentFacilities($apartmentid, $facilties) {

        $dataArray = [];
        foreach ($facilties as $item) { //$intersts array contains input data
            $data = new ApartmentFacilities();
            $data->apartment_id = $apartmentid;
            $data->facility = $item;
            $dataArray[] = $data->attributesToArray();
        }
        ApartmentFacilities::insert($dataArray);
    }

    public function deleteApartmentFacilities($apartmentid) {

          DB::table('apartments_facilities')->where('apartment_id', $apartmentid)->delete(); 

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
