<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userData = UserData::all();
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
        
        UserData::create($request->all(), $rules);
      
    //    .
        return redirect(url('/'));
    }
}
