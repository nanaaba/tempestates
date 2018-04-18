<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Session;

class AuditLogsController extends Controller {

    public function showlogs() {

        $logs = $this->getLogs();
        return view('logs')->with('logs', $logs);
    }

    public function saveActivity($activity) {

        $createdby = Session::get('id');
        DB::insert('insert into audits_logs (activity,user_id) values (?, ?)', ["$activity", "$createdby"]);
    }

    public function getLogs() {
        $logs = DB::table('logs_view')->orderBy('activity_date', 'desc')->limit(200)->get()->toJson();
        return $logs;
    }

}
