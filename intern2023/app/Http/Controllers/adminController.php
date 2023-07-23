<?php

namespace App\Http\Controllers;
use App\Models\userCode;
use App\Models\UserData;
use Illuminate\Http\Request;
class adminController extends Controller
{
   public function index(){
      $userCode = userCode::orderBy('created_at', 'asc')->get();
      $userData = UserData::orderBy('created_at', 'asc')->get();
      return view('Admin.admin', compact('userCode' , 'userData'));
   }
   public function adminQR(Request $request){
      $id = $request->query('id');
      $userCode = userCode::orderBy('created_at', 'asc')->get();
      $userData = UserData::orderBy('created_at', 'asc')->get();
      return view('Admin.adminQR', compact('userCode', 'userData', 'id'));

   }
}
