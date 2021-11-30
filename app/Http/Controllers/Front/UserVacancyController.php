<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Front\Vacancy;
use App\Http\Models\Front\UserVacancy;

class UserVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserVacancy $userVacancy)
    {
        $userVacancies = auth()->user()->candidates()->candidateActive()->get();
        $archiveCandidates = auth()->user()->candidates()->candidateArchive()->get();
    
        return view('front.proposals.index', compact('userVacancy'), [
            'userVacancies' => $userVacancies,
            'archiveCandidates' => $archiveCandidates,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserVacancy $userVacancy)
    {
        return view('front.proposals.show',compact('userVacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVacancy $userVacancy){
        $userVacancy = UserVacancy::acceptCandidate($userVacancy);
        return redirect()->route('proposals.index')
                        ->with('success','Successful applicant');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVacancy $userVacancy){
        $userVacancy = UserVacancy::refusCandidate($userVacancy);
        
        return redirect()->route('proposals.index')
                        ->with('success','Rejected applicant');
    }
}
