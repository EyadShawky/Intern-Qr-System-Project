<?php

namespace App\Http\Controllers;

use App\Models\userCode;
use Illuminate\Http\Request;

class userCodeController extends Controller
{
    //

    public function index(){
        return view('Home.admin');
    }
    public function qrCode(){
        $userData = userCode::all();
        return view('Home.qr', compact('userData'));
    }
}
