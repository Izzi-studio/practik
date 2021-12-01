<?php

namespace App\Http\Models\Front;

use App\User;
use App\Http\Models\Front\Vacancy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Front\Proposal;

class Proposal extends Model
{
    protected $table = 'user_vacancy';
    public $timestamps = true;
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'status',
        'cv'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }

    public function scopeCandidateAwait()
    {
          return $this->where('status', '1');
    }
    public function scopeCandidateApprove()
    {
          return $this->where('status', '2');
    }

    public function scopeCandidateArchive()
    {
        return $this->where('status', '3');
    }
    public function scopeCandidateAccept()
    {
          return $this->where('status', '4');
    }


    public static function changeStatusCandidate ($user_vacancy_id, $status){
		if ($status <= 3 && Proposal::find($user_vacancy_id)){
			Proposal::find($user_vacancy_id)->where('user_id',Auth::ID())->update(['status'=> $status]);
		}else{
			dd('you are cheaters');
		}
    }

    public static function approvedCandidate(Proposal $proposal){
        $proposal = DB::table('user_vacancy')
        ->where('user_vacancy.id', $proposal->id)
        ->update(['status' => '2']);
    }

    public static function acceptCandidate(Proposal $proposal){
        $proposal = DB::table('user_vacancy')
        ->where('user_vacancy.id', $proposal->id)
        ->update(['status' => '4']);
    }

    public static function refusCandidate(Proposal $proposal){
        $proposal =  DB::table('user_vacancy')
        ->where('user_vacancy.id', $proposal->id)
        ->update(['status' => '3']);
    }


}
