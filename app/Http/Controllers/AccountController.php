<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroups;
use App\Users;
use App\PermissionsRoles;
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
        $update = Users::find($id);
        $update->role = $data['role'];
        $update->name = $data['name'];
        $update->email = $data['email'];
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
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
            $new->name = $data['name'];
            $new->email = $data['email'];
            $new->createdby = Session::get('id');
            $new->role = 'system generated';
            $saved = $new->save();
            if (!$saved) {
                $response['success'] = 1;
                $response['message'] = 'Could not save';
                return $response;
            } else {
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
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

}