<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Mail\mailme;
use App\User;
use Mail;

class NotificationsController extends Controller {

    public function sendemail($receiver, $subject, $message) {

        $data = array('subject' => $subject, 'message' => $message);

        Mail::to($receiver)->send(new mailme($data));
    }

    public function sendsms($receiver, $message) {
        $client = new Client();

        $url = "https://api.hubtel.com/v1/messages/send?From=Rotamac&To=" . $receiver . "&Content=" . $message . "&ClientId=bawxcvfk&ClientSecret=jlrjfvap&RegisteredDelivery=true";

        $request = $client->get($url);
        $response = $request->getBody();

        $this->savesms($response, $receiver, $message);
    }

    public function testsms() {
        $data = array('subject' => 'Bill for month', 'message' => 'Attached is your bill for the month');

        $this->sendemail('abaodum@gmail.com', $data);
    }

    public function savesms($response, $receiver, $message) {
        $data = json_decode($response, true);

        $messageid = $data['MessageId'];
        $status = $data['Status'];
        $network = $data['NetworkId'];
        $rate = $data['Rate'];
        DB::insert('insert into sms_messages (message_id,receiver,sms, status,network,rate) values (?,?,?,?,?,?)', ["$messageid", "$receiver", "$message", "$status", "$network", "$rate"]);
    }

}
