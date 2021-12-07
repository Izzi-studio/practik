<?php

namespace App\Http\Controllers\Front;

use DB;
use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Models\Front\Cities;
use App\Http\Models\Front\Vacancy;
use App\Http\Models\Front\Category;
use App\Http\Models\Front\Duration;
use App\Http\Controllers\Controller;
use App\Http\Requests\VacancyRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Models\Front\FormOfEmployment;
use App\Http\Models\Front\TypeOfEmployment;
use App\Http\Models\Front\FormOfCooperation;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = auth()->user()->vacancies()->vacancyActive()->get();
        $archiveVacancies = auth()->user()->vacancies()->vacancyArchive()->get();

        return view('front.vacancies.index', [
            'vacancies' => $vacancies,
            'archiveVacancies' => $archiveVacancies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Cities::get();
        $durations = Duration::get();
        $form_of_cooperations = FormOfCooperation::get();
        $form_of_employments = FormOfEmployment::get();
        $type_of_employments = TypeOfEmployment::get();
        $categories = Category::all();
        return view('front.vacancies.create',compact('cities','durations', 'form_of_employments', 'form_of_cooperations', 'type_of_employments'))->withCategories($categories);
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
		if (User::getUserRoleID() == 1){

		}

		if (User::getUserRoleID() == 2){

			$order_by = 'users.created_at';
			$ordering = 'ASC';
			/*dd(User::getStudents($order_by,$ordering));
			return view('front.search_for_employer')->with([
				'additional_info'=>User::getAdittionalInfo(),
				'students'=>User::getStudents($order_by,$ordering)
			]);*/
		}

		$get = User::whereRaw("additional_info->\"$.activities\" LIKE '%2%'")->whereTypeAccount(2)->get();
		dd($get);
    }

	public function changeStatusVacancy($vacancy_id,$status)
    {

		Vacancy::changeStatusVacancy($vacancy_id, $status);
        return back();
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedback()
    {

		dd(Vacancy::getVacanciesByUserToResponded());
        return redirect(route('vacancies.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyRequest $request)
    {
        //$validatedData = $request->validated();
        $vacancy = Vacancy::create($request->all());
        $vacancy->categories()->sync($request->categories, false);

        return redirect()->route('vacancies.index', $vacancy->id)
        ->with('success','Vacancy created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        return view('front.vacancies.show',compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        $cities = Cities::get();
        $durations = Duration::get();
        $form_of_cooperations = FormOfCooperation::get();
        $form_of_employments = FormOfEmployment::get();
        $type_of_employments = TypeOfEmployment::get();
        $categories = Category::get();    
        return view('front.vacancies.edit',compact('vacancy', 'cities','durations', 'form_of_employments', 'form_of_cooperations', 'type_of_employments', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VacancyRequest $request, Vacancy $vacancy)
    {
        //$validatedData = $request->validated();
        $vacancy->update($request->all());
        if (isset($request->categories)) {
            $vacancy->categories()->sync($request->categories);
        } else {
            $vacancy->categories()->sync(array());
        }
        return redirect()->route('vacancies.index')
                        ->with('success','Vacancy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy = Vacancy::deleteVacancy($vacancy);

        return redirect()->route('vacancies.index')
                        ->with('success','Vacancy delete successfully');
    }

    public function searchVacancies(Request $request, Vacancy $vacancy)
    {
        $allVacancies = $vacancy->vacancyActive()->get();
        $users = User::where('type_account',1);
        $cities = Cities::get();

        if($request->has('search')){
            $allVacancies = Vacancy::search($request->get('search'))->get();
        }else{
            $allVacancies = Vacancy::get();
        }
        return view('front.search', compact('allVacancies','users', 'cities'));
        }
}
