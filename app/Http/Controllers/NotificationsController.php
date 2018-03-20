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


        $url = "https://api.hubtel.com/v1/messages/send?From=Rotamac&To=" . $receiver . "&Content=" . $message . "&ClientId=bawxcvfk&ClientSecret=jlrjfvap&RegisteredDelivery=true";


        $client = new Client([
            'http_errors' => true
        ]);



        try {

            $response = $client->request('GET', $url, ['verify' => false]);

            $body = $response->getBody();
            $data = json_decode($body, true);
            $status = $data['Status'];
            if ($status == 0) {
                $this->savesms($body, $receiver, $message);
            }
        } catch (RequestException $e) {

        } catch (Exception $e) {
        }
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
