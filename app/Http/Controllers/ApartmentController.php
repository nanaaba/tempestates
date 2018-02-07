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
use Illuminate\Support\Facades\Session;

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

        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveApartment(Request $request) {

        $data = $request->all();
        $new = new Apartment();

        $new->name = $data['name'];
        $new->estate_id = $data['estate'];
        $new->currency = $data['currency'];
        $new->monthly_charge = $data['monthly_charge'];
        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    
    public function getApartmentDetail($id) {
        
         return Apartment::where('id', $id)
                        ->get();
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
