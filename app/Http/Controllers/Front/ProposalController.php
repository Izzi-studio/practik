<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Front\Vacancy;
use App\Http\Models\Front\Proposal;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Proposal $proposal)
    {
        $proposalsAwait =  auth()->user()->candidates()->candidateAwait()->get();
        $proposalsApprove =  auth()->user()->candidates()->candidateApprove()->get();
        $proposalsArchive = auth()->user()->candidates()->candidateArchive()->get();

        return view('front.proposals.index', compact('proposal'), [
            'proposalsAwait' => $proposalsAwait,
            'proposalsApprove' => $proposalsApprove,
            'proposalsArchive' => $proposalsArchive,
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
    public function show(Proposal $proposal)
    {
        return view('front.proposals.show',compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal){
        $proposal = Proposal::acceptCandidate($proposal);
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
    public function destroy(Proposal $proposal){
        $proposal = Proposal::refusCandidate($proposal);

        return redirect()->route('proposals.index')
                        ->with('success','Rejected applicant');
    }
}
