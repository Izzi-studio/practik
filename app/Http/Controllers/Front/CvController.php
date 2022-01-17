<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Models\Front\Cv;
use Illuminate\Support\Facades;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{
    public function index()
    {
        if (User::getUserRoleID() == 1){
            return view('front.student.cvUpload');
        }
        if (User::getUserRoleID() == 2){
            return view('front.employer.profile_employer')->with(['additional_info'=>User::getAdittionalInfo()]);
        }     
    }

    public function store(Request $request)
    {
        $data=new Cv();
        $cv=$request->cv;
        $filename=time().'.'.$cv->getClientOriginalName();
        $request->cv->move('upload', $filename);
        $data->cv=$filename;
        $data->save();

        return redirect()->back()->with('success', 'success Cv upload');
    }
}