<?php

namespace App\Http\Controllers;

use App\Models\userCode;
use App\Models\UserData;
use Illuminate\Http\Request;

class userCodeController extends Controller
{
    //

    public function index(){
        return view('Home.admin');
    }
    public function qrCode(){
        $userCode = userCode::all();
        $userData = userData::all();
        return view('Home.qr', compact('userData', 'userCode'));
    }
}
