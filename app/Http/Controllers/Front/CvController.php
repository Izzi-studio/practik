<?php

namespace App\Http\Controllers\Front;

use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Models\Front\Cv;
use Illuminate\Support\Facades;
use App\Http\Models\Front\Proposal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CvController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            Session::flash('error', 'You must be connected to post a resume');
            return redirect('login');
        }
        if (User::getUserRoleID() == 1){
            return view('front.student.cvUpload'); 
        }
        if (User::getUserRoleID() == 2){
            
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

    public function resume()
    {
        $data=Cv::all();
        $user = auth()->user();
        return view('front.employer.proposals.resume', compact('user','data'));

    }

    public function download()
    {
        $data=Cv::all();
        $user = auth()->user();
        $pdf = \PDF::loadView('front.employer.proposals.resume', compact('user','data'));
        return $pdf->download('resume.pdf');
    }
}