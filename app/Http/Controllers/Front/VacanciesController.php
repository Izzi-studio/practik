<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Http\Models\Front\Vacancies;
use App\User;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $vacancies = Vacancies::getVacanciesByUser();
        return response($vacancies); */

        $vacancies = Vacancies::active()->get();
        $archvacancies = Vacancies::archive()->get();
        //$likevacancies = Vacancies::candidatesToVacancy()->count();
        return view('front.vacancies.index', ['vacancies' => $vacancies, 'archvacancies' => $archvacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.vacancies.create');
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

		Vacancies::changeStatusVacancy($vacancy_id, $status);
        return back();
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedback()
    {

		dd(Vacancies::getVacanciesByUserToResponded());
        return redirect(route('vacancies.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* if(User::getUserRoleID() == 2) {
            Vacancies::storeVacancy($request);
            return redirect(route('vacancies.create'));
        }
        abort(404, 'Page not found'); */

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'city' => 'required',
            'type_of_employment' => 'required',
            'form_of_employment' => 'required',

        ]);        

        Vacancies::create($request->all());

        return redirect()->route('vacancies.index')
        ->with('success','Vacancy created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancies $vacancy)
    {
        return view('front.vacancies.show',compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancies $vacancy)
    {
		//return response($vacancy);
        return view('front.vacancies.edit',compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancies $vacancy)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'city' => 'required',
            'type_of_employment' => 'required',
            'form_of_employment' => 'required',
        ]);

        $vacancy->update($request->all());
  
        return redirect()->route('vacancies.index')
                        ->with('success','Vacancy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancies $vacancy)
    {
        $vacancy = Vacancies::deleteVacancy($vacancy);
        
        return redirect()->route('vacancies.index')
                        ->with('success','Vacancy delete successfully');
    }

    public function archive(Vacancies $vacancy)
    {
        $vacancy = Vacancies::archiveVacancy();
        return redirect()->route('vacancies.index')
        ->with('success','Vacancy archive successfully');
    }
}
