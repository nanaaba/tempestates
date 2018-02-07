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
use App\Color;
use App\Car_model;
use App\Fueltype;
use App\Model_year;
use App\Relationship;
use App\Bank;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ConfigurationController extends Controller {

    public function showcolors() {

        $colors = $this->getColors();
        return view('colors')->with('colors', $colors);
    }

    public function showrelationship() {

        $relationships = $this->getRelationships();
        return view('relationship')->with('relationship', $relationships);
    }

    public function showcarmodels() {

        $carmodels = $this->getCarmodels();
        return view('carmodels')->with('carmodels', $carmodels);
    }

    public function showcarmodelyear() {

        $modelyear = $this->getModelYears();
        return view('modelyear')->with('years', $modelyear);
    }

    public function showfueltypes() {

        $fueltypes = $this->getFuelTypes();
        return view('fueltypes')->with('fueltypes', $fueltypes);
    }

    public function showbanks() {
        $banks = $this->getBanks();
        return view('banks')->with('banks', $banks);
    }

    public function getColors() {
        return Color::all()->toJson();
    }

    public function getRelationships() {
        return Relationship::all()->toJson();
    }

    public function getModelYears() {
        return Model_year::all()->toJson();
    }

    public function getCarmodels() {

        return Car_model::all()->toJson();
    }

    public function getFuelTypes() {
        return Fueltype::all()->toJson();
    }

    public function saveColor(Request $request) {

        $data = $request->all();



        try {
            $new = new Color;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteColor($id) {


        $new = Color::find($id);
        $new->delete();
    }

    public function saveModelYear(Request $request) {

        $data = $request->all();

        try {
            $new = new Model_year;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteModelYear($id) {


        $new = Model_year::find($id);
        $new->delete();
    }

    public function saveRelationship(Request $request) {

        $data = $request->all();

        try {
            $new = new Relationship;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteRelationship($id) {


        $new = Relationship::find($id);
        $new->delete();
    }

    public function saveCarModel(Request $request) {

        $data = $request->all();


        try {
            $new = new Car_model;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteCarModel($id) {


        $new = Car_model::find($id);
        $new->delete();
    }

    public function saveFuelType(Request $request) {

        $data = $request->all();


        try {
            $new = new Fueltype;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function deleteFuelType($id) {


        $new = Fueltype::find($id);
        $new->delete();
    }

    //deleteBank
    public function deleteBank($id) {


        $new = Bank::find($id);
        $new->delete();
    }

    public function getBanks() {
        return Bank::all()->toJson();
    }

    public function saveBank(Request $request) {
        $data = $request->all();


        try {
            $new = new Bank;
            $new->name = $data['name'];
            $new->save();
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return '1';
        }
    }

    public function showsettings() {

        return view('settings');
    }

    public function kkk() {

        return response()->download($backupfile);
    }

    public function runDataBackup() {


// Create the mysql backup file
// edit this section

        $dbname = "transportation"; // enter your database name here
        // $backupfile = $dbname . date("Y-m-d") . '.sql.gz';
        // $backupfile =  Storage::disk('backup') . $dbname . date("Y-m-d") . '.sql';
        $backupfile = Storage::disk('uploads')->put('file', $dbname . date("Y-m-d") . '.sql');


         exec('/usr/bin/mysqldump --opt --host=localhost -user=root --password=nana1991 transportation | gzip -v -9 >' . $backupfile);
//        
        //mail("abaodum@gmail.com", "My subject", 'test');


        $content = file_get_contents($backupfile);
        $content = chunk_split(base64_encode($content));
        $uid = md5(uniqid(time()));
        $name = basename($backupfile);

        $from_name = "Transportation Backup";
        $from_mail = "systememail@gmail.com";
        $message = "Data Backup for " . date("Y-m-d");
        $replyto = "abaodum@gmail.com";
        $mailto = "abaodum@gmail.com";
        $subject = "Data Backup for " . date("Y-m-d");


// header
        $header = "From: " . $from_name . " <" . $from_mail . ">\r\n";
        $header .= "Reply-To: " . $replyto . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";

// message & attachment
        $nmessage = "--" . $uid . "\r\n";
        $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $nmessage .= $message . "\r\n\r\n";
        $nmessage .= "--" . $uid . "\r\n";
        $nmessage .= "Content-Type: application/octet-stream; name=\"" . $name . "\"\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "Content-Disposition: attachment; filename=\"" . $name . "\"\r\n\r\n";
        $nmessage .= $content . "\r\n\r\n";
        $nmessage .= "--" . $uid . "--";

        if (mail($mailto, $subject, $nmessage, $header)) {
            echo 'Backup completed ';
        } else {
            return 'Backup failed';
        }
    }

}
