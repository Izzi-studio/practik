<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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


    public function about()
    {
        return view('front.about');
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
