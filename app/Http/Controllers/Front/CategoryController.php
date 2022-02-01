<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Models\Front\Vacancy;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Front\Category;
use App\Http\Controllers\Controller;
use App\Http\Models\Front\CategoryVacancy;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vacancy $vacancy, Request $request)
    {
        $data=[
            'categories' => Category::get(),
        ];

        return view('front.categories')->with($data);
    }
}
