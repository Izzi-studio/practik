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
            'allVacancies' => $vacancy->vacancyActive()->get(),
            'categories' => Category::get(),
            'mostPopularCategories' => DB::table('categories')
            ->leftJoin('category_vacancy', 'categories.id', '=', 'category_vacancy.category_id')
            ->select(DB::raw('categories.name,count(category_vacancy.category_id) as name_count,categories.id as category_id'))
            ->groupBy('category_vacancy.category_id')
            ->orderBy('name_count', 'desc')
            ->take(6)
            ->get()
        ];

        return view('front.categories')->with($data);
    }
}
