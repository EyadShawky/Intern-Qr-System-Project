<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\Models\UserData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    public function export(Request $request, $format){
        $users = UserData::all();
        if($format === 'excel'){
            return Excel::download(new UsersExport($users),'users.xlsx');
        }
        else{
            return back()->with('error','Invalid export format. Please choose Excel.');
        }
    }

}