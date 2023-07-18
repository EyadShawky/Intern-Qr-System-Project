<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    public function index()
    {
        return view('Home.home');
    }

    public function store(Request $request)
{
    $rules = [
        'id' => 'nullable|integer',
        'Fname' => 'required|string|max:255',
        'Lname' => 'required|string|max:255',
        'Phone' => 'required|string|min:10|max:15',
        'Email' => 'required|email|unique:users',
    ];

    // Create UserData record
    UserData::create($request->all(), $rules);

    // Send email
    Mail::to($request->input('Email'))
    ->send(new ContactMail($rules));
    return back()->with('message_send', 'Your Message Has Been Sent Successfully!');
}
}
