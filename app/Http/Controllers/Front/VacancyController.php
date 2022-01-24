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
use App\Http\Models\Front\Proposal;
use App\Http\Controllers\Controller;
use App\Http\Requests\VacancyRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Front\CategoryVacancy;
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

        return view('front.employer.vacancies.index', [
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
        $data=[
            'cities' => Cities::get(),
            'durations' => Duration::get(),
            'form_of_employments' => FormOfCooperation::get(),
            'form_of_cooperations' => FormOfEmployment::get(),
            'type_of_employments' => TypeOfEmployment::get(),
            'categories' => Category::all()
        ];
        
        return view('front.employer.vacancies.create')->with($data);
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
        return view('front.employer.vacancies.show',compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        $data=[
            'cities' => Cities::get(),
            'durations' => Duration::get(),
            'form_of_employments' => FormOfCooperation::get(),
            'form_of_cooperations' => FormOfEmployment::get(),
            'type_of_employments' => TypeOfEmployment::get(),
            'categories' => Category::get()
        ];
        return view('front.employer.vacancies.edit', compact('vacancy'))->with($data);
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

    public function searchVacancies(Request $request)
    {
        $vacancies = new Vacancy();

        if($request->get('user_id',null)){
            $vacancies = $vacancies->whereUserId($request->user_id);
        }
        if($request->get('city_id',null)){
            $vacancies = $vacancies->whereCityId($request->city_id);
        }
        if($request->get('duration_id',null)){
            $vacancies = $vacancies->whereDurationId($request->duration_id);
        }
        if($request->get('form_of_employment_id', null)){
            $vacancies = $vacancies->whereFormOfEmploymentId($request->form_of_employment_id);
        }
        if($request->get('form_of_cooperation_id', null)){
            $vacancies = $vacancies->whereFormOfCooperationId($request->form_of_cooperation_id);
        }
        if($request->get('type_of_employment_id', null)){
            $vacancies = $vacancies->whereTypeOfEmploymentId($request->type_of_employment_id);
        }
        if($request->get('categories',null)){
            $vacanciesIds = CategoryVacancy::whereIn('category_id',[$request->categories])->pluck('vacancy_id')->toArray();
            $vacancies = $vacancies->whereIn('id', $vacanciesIds);
        }
        if($request->get('search',null)) {
            $vacancies = $vacancies->where('title', 'like', '%' . request()->search . '%')->orwhere('description', 'like', '%' . request()->search . '%');
        }

        $data=[
            'cities' => Cities::get(),
            'durations' => Duration::get(),
            'form_of_employments' => FormOfCooperation::get(),
            'form_of_cooperations' => FormOfEmployment::get(),
            'type_of_employments' => TypeOfEmployment::get(),
            'categories' => Category::get(),
            'allVacancies' => $vacancies->vacancyActive()->get(),
            'mostPopularCategories' => DB::table('categories')
            ->leftJoin('category_vacancy', 'categories.id', '=', 'category_vacancy.category_id')
            ->select(DB::raw('categories.name,count(category_vacancy.category_id) as name_count,categories.id as category_id'))
            ->groupBy('category_vacancy.category_id')
            ->orderBy('name_count', 'desc')
            ->take(5)
            ->get(),
            'requestData' => $request->all()
        ];

        return view('front.search')->with($data);
    }

    public function viewVacancy(Vacancy $vacancy)
    {
        $data=[
            'cities' => Cities::get(),
            'durations' => Duration::get(),
            'form_of_employments' => FormOfCooperation::get(),
            'form_of_cooperations' => FormOfEmployment::get(),
            'type_of_employments' => TypeOfEmployment::get(),
            'categories' => Category::get(),
        ];

        return view('front.viewVacancy', compact('vacancy'))->with($data);
    }

    public function applyVacancy(Vacancy $vacancy, Request $request)
    {

        if (auth()->guest()) {
            Session::flash('error', 'You must be connected to apply');
            return redirect('login');
        }
        if (User::getUserRoleID() == 1){

            $data = new Proposal();
            $data->user_id = Auth::id();
            $data->vacancy_id = $vacancy->id;
            $cv=$request->cv;
            $filename=time().'.'.$cv->getClientOriginalName();
            $request->cv->move('upload', $filename);
            $data->cv=$filename;
            $data->save();

            return redirect()->back()->with('success', 'Application registered');
        }
        if (User::getUserRoleID() == 2){
            Session::flash('error', 'You must be a student to apply');
            return view('front.viewVacancy',compact('vacancy'));  
        }
    }
}