<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller {

    public function showservices() {

        return view('services');
    }

    public function getservices() {

        return Service::where('active', 0)
                        ->get();
    }

    public function deleteService($id) {


        $update = Service::find($id);
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

    public function updateService(Request $request) {

        $data = $request->all();

        $id = $data['code'];
        $update = Service::find($id);
        $update->name = $data['name'];
        $update->amount = $data['amount'];
        $update->description = $data['description'];

        $update->modified_by = Session::get('id');
        $update->modified_at = date('Y-m-d H:i:s');

        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveService(Request $request) {

        $data = $request->all();
        $new = new Service();

        $new->name = $data['name'];
        $new->amount = $data['amount'];
        $new->description = $data['description'];

        $new->created_by = Session::get('id');
        $new->created_at = date('Y-m-d H:i:s');

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    
     public function getServiceDetail($id) {

        return Service::where('id', $id)
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
