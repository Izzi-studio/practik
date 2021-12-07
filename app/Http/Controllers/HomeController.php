<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Models\Front\Cities;
use App\Http\Models\Front\Vacancy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // dd(User::getAdittionalInfo('opf'));
        return view('home');
    }

    public function welcome(Vacancy $vacancy){

        $allVacancies = $vacancy->vacancyActive()->get();
        $users = User::where('type_account',1);
        $cities = Cities::get();

        return view('welcome', compact('allVacancies','users', 'cities'));
    }

    public function about()
    {
        return view('about');
    }

    public function howto()
    {
        return view('front.howto');
    }

    public function callback()
    {
        return view('front.callback');
    }

    public function faq()
    {
        return view('front.faq');
    }

    public function services()
    {
        return view('front.services');
    }

    public function employer()
    {
        return view('front.employer');
    }
}
