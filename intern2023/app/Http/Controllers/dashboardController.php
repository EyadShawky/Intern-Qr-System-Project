<?php

namespace App\Http\Controllers;

use App\Models\dashboardData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardController extends Controller
{


    public function index(){
        $dashboards = dashboardData::all();
        return view('dashboard.home',[
            'dashboards' =>$dashboards
        ]);
    }

    public function create(){
        return view('dashboard.create',[
            'dashboards'=>dashboardData::all(),
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'required|image|mimes:png,jpg|max:1000240',
            'codeFlip' => 'required|integer|min:1',
        ]);
        $fileName = Storage::putFile("public/dashboard" , $data['img']);
        $data['img'] =str_replace('public/' , 'storage/' , $fileName);
        dashboardData::create($data); 
        return redirect(url('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard'));
    }


    public function edit($titleID){
        $dashboards = dashboardData::findOrFail($titleID);
    return view('dashboard.edit', [
        'dashboards' => $dashboards,
    ]);
    }

    public function update($titleID, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'required|image|mimes:png,jpg|max:1000240',
            'codeFlip' => 'required|integer|min:1',
        ]);
    
        $fileName = Storage::putFile('public/dashboard', $data['img']);
        $data['img'] = str_replace('public/', 'storage/', $fileName);
        
        dashboardData::findOrFail($titleID)->update([
            "title" => $request->title,
            "img" => $data['img'],
            "codeFlip" => $request->codeFlip,
        ]);
    
        return redirect(url('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard'));
    }
    
}
