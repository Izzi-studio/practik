<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Models\Front\Cities;
use App\Http\Models\Front\Vacancy;
use App\Http\Models\Front\Category;
use App\Http\Models\Front\CategoryVacancy;
use App\Http\Models\Front\Duration;
use App\Http\Controllers\Controller;
use App\Http\Models\Front\FormOfEmployment;
use App\Http\Models\Front\TypeOfEmployment;
use App\Http\Models\Front\FormOfCooperation;

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
        $durations = Duration::get();
        $form_of_cooperations = FormOfCooperation::get();
        $form_of_employments = FormOfEmployment::get();
        $type_of_employments = TypeOfEmployment::get();
        $categories = Category::get();
        $mostPopularCategories = DB::table('categories')
            ->leftJoin('category_vacancy', 'categories.id', '=', 'category_vacancy.category_id')
            ->select(DB::raw('categories.name,count(category_vacancy.category_id) as name_count,categories.id as category_id'))
            ->groupBy('category_vacancy.category_id')
            ->orderBy('name_count', 'desc')
            ->take(5)
            ->get();

        return view('welcome', compact(
            'allVacancies',
            'users',
            'cities', 
            'categories',
            'type_of_employments',
            'form_of_employments',
            'durations',
            'form_of_cooperations',
            'mostPopularCategories'))->with(['additional_info'=>User::getAdittionalInfo()]);;
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
