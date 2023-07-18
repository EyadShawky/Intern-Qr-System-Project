<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\userCode;
use App\Models\UserData;
use FFI\Exception;
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

        
        
        UserData::create($request->all(), $dataMail);

        $user_id = request('id');

        // Check if the user_id exists in the user_data table
            $user_id = request('id');
            $user_code = new userCode();
            $user_code->user_id = $user_id;
            $user_code->code = '1s35';
            $user_code->qr_code = '1235';
            $user_code->save();

        $userCode = userCode::select('code')->get();
        // Send email
        // Mail::to($request->input('Email'))
        //     ->send(new ContactMail($dataMail, $userCode));
        // return back()->with('message_send', 'Your Message Has Been Sent Successfully!');
    }
}
