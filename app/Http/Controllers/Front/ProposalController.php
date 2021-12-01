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
        //proposal on standby
        $proposalsAwait =  auth()->user()->candidates()->candidateAwait()->get();
        //proposal accepted for an interview
        $proposalsApprove =  auth()->user()->candidates()->candidateApprove()->get();
        //proposal finally accepted
        $proposalsAccept = auth()->user()->candidates()->candidateAccept()->get();
        $proposalsArchive = auth()->user()->candidates()->candidateArchive()->get();

        return view('front.proposals.index', compact('proposal'), [
            'proposalsAwait' => $proposalsAwait,
            'proposalsApprove' => $proposalsApprove,
            'proposalsAccept' => $proposalsAccept,
            'proposalsArchive' => $proposalsArchive,
        ]);
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
    public function approved(Proposal $proposal){
        $proposal = Proposal::approvedCandidate($proposal);
        return redirect()->route('proposals.index')
                        ->with('success','Proposal accepted for an interview');
    }

    public function accepted(Proposal $proposal){
        $proposal = Proposal::acceptCandidate($proposal);
        return redirect()->route('proposals.index')
                        ->with('success','Successful applicant');

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
