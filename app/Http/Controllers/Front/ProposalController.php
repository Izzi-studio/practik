<?php

namespace App\Http\Controllers\Front;

use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Models\Front\Cv;
use App\Http\Models\Front\Vacancy;
use App\Http\Models\Front\Proposal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Proposal $proposal, Vacancy $vacancy, User $user)
    {
        $userId = Auth::id();
        if (User::getUserRoleID() == 1){
            //proposal on standby
            $proposalsAwait = auth()->user()->candidates()->CandidateAwait()->where('user_id', $userId)->get();
            //proposal accepted for an interview
            $proposalsApprove =  auth()->user()->candidates()->candidateApprove()->where('user_id', $userId)->get();//proposal finally accepted
            $proposalsAccept = auth()->user()->candidates()->candidateAccept()->where('user_id', $userId)->get();
            $proposalsArchive = auth()->user()->candidates()->candidateArchive()->where('user_id', $userId)->get();
            
            return view('front.student.proposals.index',compact('proposal', 'vacancy'), [
                'proposalsAwait' => $proposalsAwait,
                'proposalsApprove' => $proposalsApprove,
                'proposalsAccept' => $proposalsAccept,
                'proposalsArchive' => $proposalsArchive,
            ]);
        }
        if (User::getUserRoleID() == 2){
        //proposal on standby
        $proposalsAwait =  auth()->user()->candidates()->candidateAwait()->get();
        //proposal accepted for an interview
        $proposalsApprove =  auth()->user()->candidates()->candidateApprove()->get();
        //proposal finally accepted
        $proposalsAccept = auth()->user()->candidates()->candidateAccept()->get();
        $proposalsArchive = auth()->user()->candidates()->candidateArchive()->get();

        return view('front.employer.proposals.index', compact('proposal', 'vacancy','user'), [
            'proposalsAwait' => $proposalsAwait,
            'proposalsApprove' => $proposalsApprove,
            'proposalsAccept' => $proposalsAccept,
            'proposalsArchive' => $proposalsArchive,
        ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal, User $user)
    {
        return view('front.employer.proposals.show',compact('proposal', 'user'));
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

    public function downloadPdf(Proposal $proposal)
    {
        // share data to view
        view()->share('front.employer.proposals.resume-pdf',$proposal);
        $pdf = \PDF::loadView('front.employer.proposals.resume-pdf', ['proposal' => $proposal]);
        return $pdf->download('resume.pdf');
    }
}
