<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\dashboardData;
use App\Models\userCode;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function index()
    {   $dashboards = dashboardData::all();
        $userCodeDB = userCode::orderBy('created_at', 'asc')->get();
        $userDataDB = UserData::orderBy('created_at', 'asc')->get();
        return view('Home.home', compact('userCodeDB', 'userDataDB' , 'dashboards'));
    }


    public function store(Request $request)
    {
        $inputs = $request->all();
        $v = validator($inputs, [
            'id' => 'required|string|max:14|min:9',
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'Phone' => 'required|string|min:10|max:15',
            'Email' => 'required|email|unique:users',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        $dataMail = new UserData();
        $dataMail->id = $inputs['id'];
        $dataMail->Fname = $inputs['Fname'];
        $dataMail->Lname = $inputs['Lname'];
        $dataMail->Phone = $inputs['Phone'];
        $dataMail->Email = $inputs['Email'];
        $dataMail->save();

        $userCodeDB = userCode::all();
        if ($userCodeDB->isEmpty()) {
            $code = 'A-001';
        } else {
            $lastInsertedCode = userCode::latest('created_at')->first()->code;
            $parts = explode('-', $lastInsertedCode);
            $prefix = $parts[0];
            $number = intval($parts[1]);
            $nextNumber = $number + 1;
            if ($nextNumber > 10) {
                // Increment the prefix to the next letter
                $prefix = chr(ord($prefix) + 1);

                // Reset the number to 1
                $nextNumber = 1;
            }
            $code = $prefix . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }

        // Check if the user_id exists in the user_data table
        $user_id = request('id');
        $user_code = new userCode();
        $user_code->user_id = $user_id;
        $user_code->code = $code;
        $user_code->qr_code = request('qrCode');
        $user_code->save();

        // Send email
        // Mail::to($request->input('Email'))
        //     ->send(new contactMail($inputs, $user_code->code));

        return redirect('http://127.0.0.1:8000/qr?q=' . $user_id);
    }
}
