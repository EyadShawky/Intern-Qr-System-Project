<?php

namespace App\Http\Controllers;
use App\Models\userCode;
use App\Models\UserData;

use Illuminate\Http\Request;

class adminController extends Controller
{
   public function index(){
      $userCode = userCode::all();
      return view('Admin.admin', compact('userCode'));
   }
   public function adminQR(){
      $userCode = userCode::all();
      $userData = UserData::all();
      return view('Admin.adminQR', compact('userCode', 'userData'));
   }
}
