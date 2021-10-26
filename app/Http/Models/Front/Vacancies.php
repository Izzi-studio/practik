<?php

namespace App\Http\Models\Front;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use User;
class Vacancies extends Model
{
    protected $table = 'vacancies';
    public $timestamps = false;
    protected $guarded = [];

    public static function getVacanciesByUser (){
        return Vacancies::where('vacancies.user_id',Auth::ID())
            ->leftjoin('candidates_to_vacancy as ctv','ctv.vacancy_id','vacancies.id')
            ->select('*',DB::raw('count(ctv.user_id) as count_candidates'),'vacancies.id','vacancies.user_id','vacancies.status')
            ->groupBy('vacancies.id')
            ->get();
    } 
 
	public static function getVacanciesByUserToResponded (){
        return Vacancies::where('vacancies.user_id',Auth::ID())
            ->leftjoin('candidates_to_vacancy as ctv','ctv.vacancy_id','vacancies.id')
            ->leftjoin('users as u','u.id','ctv.user_id')
            ->select('vacancies.id as vacancy_id','ctv.id as candidate_to_vacancy_id','ctv.status as candidate_to_vacancy_status','u.id as user_id_from_users','u.first_name','u.last_name','u.additional_info','vacancies.created_at')
			->groupBy('ctv.id')
            ->get();
    }

    public static function storeVacancy ($request){
        $data = $request->except('_token');
        $data['user_id'] = Auth::ID();
        return Vacancies::create($data);

    }

    public static function updateVacancy ($request, $vacancy_id){
        $data = $request->except('_token','_method');
        Vacancies::find($vacancy_id)->where('user_id',Auth::ID())->update($data);
    }

    public static function changeStatusVacancy ($vacancy_id, $status){
		if ($status <= 3 && Vacancies::find($vacancy_id)){
			Vacancies::find($vacancy_id)->where('user_id',Auth::ID())->update(['status'=> $status]);
		}else{
			dd('you are cheaters');
		}
    }

}
