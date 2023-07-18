<?php

namespace App\Http\Controllers;
use App\Models\userCode;
use App\Models\UserData;

use Illuminate\Http\Request;

class adminController extends Controller
{
   public function index(){
<<<<<<< HEAD
    return view("Admin.admin");
=======
      $userData = userData::all();
      return view('Admin.admin', compact('userData'));
   }
   public function adminQR(){
      $userCode = userCode::all();
      $userData = UserData::all();
      return view('Admin.adminQR', compact('userCode', 'userData'));
>>>>>>> cf7185a8615838f4cfc06ca2079960ff7f235112
   }
}
