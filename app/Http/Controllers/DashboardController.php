<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller {

   

  public function showdashboard() {

       $id = Session::get('id');

       if(empty($id)){
           return redirect('logout');
       }
      return view('dashboard');
    }


}
