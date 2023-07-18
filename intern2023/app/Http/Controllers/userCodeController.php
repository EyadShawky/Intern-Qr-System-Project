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
    public function qrCode(Request $request){
        $id = $request->query('q');
        $userCode = userCode::all();
        $userData = userData::all();
        return view('Home.qr', compact('userData', 'userCode'))->with('q', $id);
    }

    public function store(Request $request)
{
    $inputs = $request->all();

    $v = validator($inputs, [
        'user_id' => 'nullable|string|max:14|min:9|exists:missions',
       
    ]);

    UserData::create($request->all());
}

}
