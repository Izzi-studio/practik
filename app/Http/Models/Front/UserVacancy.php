<?php

namespace App\Http\Models\Front;

use App\User;
use App\Http\Models\Front\Vacancy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Front\UserVacancy;

class UserVacancy extends Model
{
    protected $table = 'user_vacancy';
    public $timestamps = true;
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'status'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }

    public function scopeCandidateActive()
    {
        return $this->where('status', '1');
    }

    public function scopeCandidateArchive()
    {
        return $this->where('status', '2')->orwhere('status', '3');
    }


    public static function changeStatusCandidate ($user_vacancy_id, $status){
		if ($status <= 3 && UserVacancy::find($user_vacancy_id)){
			UserVacancy::find($user_vacancy_id)->where('user_id',Auth::ID())->update(['status'=> $status]);
		}else{
			dd('you are cheaters');
		}
    }

    public static function acceptCandidate(UserVacancy $userVacancy){
        $userVacancy = DB::table('user_vacancy')
        ->where('user_vacancy.id', $userVacancy->id)
        ->update(['status' => '2']);
    }

    public static function refusCandidate(UserVacancy $userVacancy){
        $userVacancy =  DB::table('user_vacancy')
        ->where('user_vacancy.id', $userVacancy->id)
        ->update(['status' => '3']);
    }

    
}
