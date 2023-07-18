<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\userCode;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        // $userData = UserData::all();
        return view('Home.home');
    }

    public function store(Request $request)
    {
        $dataMail = $this->validate($request, [
            'id' => 'nullable|string|max:14|min:9',
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'Phone' => 'required|string|min:10|max:15',
            'Email' => 'required|email|unique:users',
        ]);

        $user_id = DB::table('user_code')->insertGetId([
            'user_id' => $request->input('id'),
            'code' => '12',
            'qr_code' => '1s2'
        ]);

        UserData::create($request->all(), $dataMail, $user_id);

        $userCode = userCode::select('code')->get();
        // Send email
        Mail::to($request->input('Email'))
            ->send(new ContactMail($dataMail, $userCode));
        return back()->with('message_send', 'Your Message Has Been Sent Successfully!');
    }
}
