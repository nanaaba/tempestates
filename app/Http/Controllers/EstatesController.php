<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Estate;
use Illuminate\Support\Facades\Session;

class EstatesController extends Controller {

    public function showestates() {

        return view('estates');
    }

    public function getEstates() {

        return Estate::where('active', 0)
                        ->get();
    }

    public function deleteEstate($id) {


        $update = Estate::find($id);
        $update->active = 1;
        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');

        if (!$update) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateEstate(Request $request) {

        $data = $request->all();

        $id = $data['code'];
        $update = Estate::find($id);
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

    public function saveEstate(Request $request) {

        $data = $request->all();
        $new = new Estate();

        $new->name = $data['name'];
        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');



        try {
            //Your code
            $saved = $new->save();
            if (!$saved) {
                return '1';
            } else {
                return '0';
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return " Duplicate entry for " . $data['name'];
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
