<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Log;

class LoginController extends Controller {

    public function authenticateUser(Request $request) {

        $data = $request->all();
        $email = $data['email'];
        $password = md5($data['password']);


        $users = User::where([['email', '=', $email], ['password', '=', $password]])->get();
        $request->session()->regenerate();


        if (!$users) {
             Log::info('User tried logging in: '.$email);

            return '1';
            
        } else {
            $email = $users[0]['email'];
            $name = $users[0]['name'];
            $role = $users[0]['role'];
            $first_login = $users[0]['first_login'];
            $id = $users[0]['id'];

            $request->session()->put('name', $name);
            $request->session()->put('email', $email);
            $request->session()->put('first_login', $first_login);
            $request->session()->put('role', $role);
            $request->session()->put('id', $id);

            $this->setLastLogin($id);
            
            
            Log::info('User logged in: '.$email);

            return $users;
        }
    }

    public function updatePassword(Request $request) {

        $id = $request->session()->get('id');

        $data = $request->all();
        $password = $data['password'];
        $update = User::find($id);
        $update->password = md5($password);
        $update->first_login = "NO";
        $save = $update->save();
        if (!$save) {
            return '1';
        } else {
            
            return '0';
        }
    }

    public function setLastLogin($id) {


        $update = User::find($id);
        $update->last_login = date('Y-m-d H:i:s');
        $update->save();
    }

}
