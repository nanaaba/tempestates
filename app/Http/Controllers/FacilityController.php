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

class FacilityController extends Controller {

    public function showfacility() {

        return view('facilities');
    }

    public function getfacilities() {

        return Facility::where('active', 0)
                        ->get();
    }
    
     public function getApartmentFacilities($apartmentid) {

        return ApartmentFacilities::where('apartment_id', $apartmentid)
                        ->get();
    }

    public function deleteFacility($id) {


        $update = Facility::find($id);
        $update->active = 1;
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');

        if (!$update) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateFacility(Request $request) {

        $data = $request->all();

        $id = $data['code'];
        $update = Facility::find($id);
        $update->name = $data['name'];
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');

        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveFacilty(Request $request) {

        $data = $request->all();
        $new = new Facility();

        $new->name = $data['name'];

        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveApartmentFacilities(Request $request) {

        $apartment = $request['apartment'];
        $facilties = $request['facilities'];

        $data = [];
        foreach ($facilties as $item) {
            $data[] = array(
                'apartment_id' => $apartment,
                'facility_id' => $item
            );
        }
        $delete = ApartmentFacilities::where('apartment_id', $apartment);
        $delete->delete();

        ApartmentFacilities::insert($data); // Eloquent
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
