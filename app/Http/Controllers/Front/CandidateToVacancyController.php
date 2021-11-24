<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Front\Vacancy;
use App\Http\Models\Front\CandidateToVacancy;

class CandidateToVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proposals(Vacancy $vacancy)
    {
        $candidates = auth()->user()->candidates()->candidateActive()->get();
        $archiveCandidates = auth()->user()->candidates()->candidateArchive()->get();
        return view('front.vacancies.proposals', compact('vacancy'), [
            'candidates' => $candidates,
            'archiveCandidates' => $archiveCandidates
        ]);
    }

    public function acceptance(CandidateToVacancy $candidate){
        $candidate = CandidateToVacancy::refusCandidate($candidate);
        return redirect()->route('proposals')
                        ->with('success','Vacancy delete successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidateToVacancy $candidate){
        $candidate = CandidateToVacancy::deleteVacancy($candidate);
        return redirect()->route('proposals')
                        ->with('success','Vacancy delete successfully');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
