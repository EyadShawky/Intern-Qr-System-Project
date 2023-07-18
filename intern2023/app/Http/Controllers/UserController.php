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

        // $user_id = request('id');
        $userCodeDB = userCode::all();
        if($userCodeDB->isEmpty()){
            $code = 'A-001';
        }else{
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

        $userCode = userCode::select('code')->get();
        // Send email
        // Mail::to($request->input('Email'))
        //     ->send(new ContactMail($dataMail, $userCode));
        // return back()->with('message_send', 'Your Message Has Been Sent Successfully!');
        // return redirect()->route('Home.qr', ['q' => $user_code]);
        return redirect('http://127.0.0.1:8000/qr?q='.$user_id);
    }
}
