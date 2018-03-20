<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NotificationsController;
use App\Permissions;
use App\User;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller {

    public function showusers() {

        return view('users');
    }

    public function getUsers() {
        return User::where('active', 0)
                        ->get();
    }

    public function updateUserInfo(Request $request) {

        $data = $request->all();
        $id = $data['userid'];
        $update = User::find($id);
        $update->role = $data['role'];
        $update->name = $data['name'];
        $update->email = $data['email'];
        $update->contactno = $data['contactno'];

        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            $audit = new AuditLogsController();
            $audit->saveActivity('Update  ' . $data['name'] . ' information');

            return '0';
        }
    }

    public function getUserInfo($id) {
        return User::where('id', $id)
                        ->get();
    }

    public function saveUserInfo(Request $request) {
        $data = $request->all();
        $response = array();
        $new = new User();
        $existence = $this->checkEmailExistence($data['email']);
        if ($existence == 0) {
            $newpassword = $this->passwordGenerator(8);
            $new->name = $data['name'];
            $new->email = $data['email'];
            $new->createdby = Session::get('id');
            $new->role = $data['role'];
            $new->password = md5($newpassword);
            $new->contactno = $data['contactno'];

            $saved = $new->save();
            if (!$saved) {
                $response['success'] = 1;
                $response['message'] = 'Could not save';
                return $response;
            } else {

                $message = 'Hi,' . $data['name'] . ', have been created as a/an ' . $data['role'] . ' in Rotamac Application.Password generated is ' . $newpassword . '. Kindly visit this link 50.62.56.65/Rotamac to change password.';
                $notifications = new NotificationsController();
                $notifications->sendemail($data['email'], 'User Created', $message);
                $notifications->sendsms($data['contactno'], $message);
                $audit = new AuditLogsController();
                $audit->saveActivity('Added new user :  ' . $data['name']);

                $response['success'] = 0;
                $response['message'] = 'User Information Saved Successfully';
                return $response;
            }
        }
        if ($existence == 1) {
            $response['success'] = 1;
            $response['message'] = 'Email already exist';
            return $response;
        }
    }

    public function checkEmailExistence($email) {

        $check = User::where('email', '=', $email)->count();
        if ($check == 0) {
            //it doesnt exist 
            return '0';
        } else {
            //its exists
            return '1';
        }
    }

    public function deleteUser($id) {


        $update = User::find($id);
        $name = $update->name;
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
              $audit = new AuditLogsController();
            $audit->saveActivity('Deleted user: ' . $name);

            return '0';
        }
    }

    public function passwordGenerator($length) {
        $chars = "1234567890";
        $clen = strlen($chars) - 1;
        $id = '';

        for ($i = 0; $i < $length; $i++) {
            $id .= $chars[mt_rand(0, $clen)];
        }
        return ($id);
    }

}
