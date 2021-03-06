<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\ApartmentTypes;
use App\RentPeriod;
use App\Identicationcards;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ConfigurationController extends Controller {

    public function showapartmenttypes() {

        $apartmenttypes = $this->getApartmentTypes();
        return view('apartmenttypes')->with('apartmenttypes', $apartmenttypes);
    }

    public function showrentperiods() {

        $periods = $this->getRentPeriods();
        return view('rentperiods')->with('periods', $periods);
    }

    public function showidentification() {

        $idscars = $this->getIdentificationCards();
        return view('identificationcards')->with('idscars', $idscars);
    }

    public function getApartmentTypes() {
        return ApartmentTypes::all()->toJson();
    }

    public function getRentPeriods() {
        return RentPeriod::orderBy('name', 'asc')->get();
    }

    public function getIdentificationCards() {
        return Identicationcards::all()->toJson();
    }

    public function saveApartmentType(Request $request) {

        $data = $request->all();



        try {
            $new = new ApartmentTypes;
            $new->name = strip_tags($data['name']);
            $new->added_by = Session::get('id');

            $new->save();
             $audit = new AuditLogsController();
            $audit->saveActivity('Added new apartment type  ' . $data['name'] );

            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteApartmentType($id) {


        $new = ApartmentTypes::find($id);
        $new->delete();
    }

    public function saveRentPeriods(Request $request) {

        $data = $request->all();

        try {
            $new = new RentPeriod;
            $new->name = strip_tags($data['name']);
            $new->added_by = Session::get('id');

            $new->save();
            
             $audit = new AuditLogsController();
            $audit->saveActivity('Added new rent period  ' . $data['name'] );

            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteRentPeriod($id) {


        $new = RentPeriod::find($id);
        $new->delete();
    }

    public function saveIdentification(Request $request) {

        $data = $request->all();

        try {
            $new = new Identicationcards;
            $new->name = strip_tags($data['name']);
            $new->added_by = Session::get('id');

            $new->save();
             $audit = new AuditLogsController();
            $audit->saveActivity('Added new identification card  ' . $data['name'] );

            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteIdentification($id) {


        $new = Identicationcards::find($id);
        $new->delete();
    }

    public function computeDate($month, $date) {


        $newDate = date('Y-m-d', strtotime("+" . $month . "months", strtotime($date)));
        return $newDate;
    }

}
