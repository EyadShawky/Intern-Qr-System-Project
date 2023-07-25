<?php

namespace App\Http\Controllers;
use App\Models\userCode;
use App\Models\UserData;
use App\Models\dashboardData;
use Illuminate\Http\Request;

class userCodeController extends Controller
{
    public function index(){
        return view('Home.admin');
    }
    public function qrCode(Request $request){
        $id = $request->query('q');
        $dashboardData = dashboardData::all();
        $userCode = userCode::orderBy('created_at', 'asc')->get();
        $userData = UserData::orderBy('created_at', 'asc')->get();
        return view('Home.qr', compact('userData', 'userCode', 'id', 'dashboardData'));
    }
}
