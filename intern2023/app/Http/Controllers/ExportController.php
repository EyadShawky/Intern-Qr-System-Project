<?php
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class ExportController extends Controller
{
    // public function export(Request $request, $format){
    //     $users = User::all();
    //     if($format === 'excel'){
    //         return Excel::download(new UsersExport($users),'users.xlsx');
    //     }
    //     else{
    //         return back()->with('error','Invalid export format. Please choose Excel.');
    //     }
    // }


    public function index (){
        return 'hello';
    }
}