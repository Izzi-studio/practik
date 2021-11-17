<?php

namespace App\Http\Models\Front;

use DB;
use Auth;
use User;
use App\Http\Models\Front\Cities;
use App\Http\Models\Front\Vacancies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Models\Front\FormOfEmployment;
use App\Http\Models\Front\TypeOfEmployment;
use App\Http\Models\Front\FormOfCooperation;
use App\Http\Models\Front\CandidateToVacancy;

class Vacancies extends Model
{
    protected $table = 'vacancies';
    public $timestamps = false;
    protected $guarded = [];
    protected $fillable = [
        'title',
        'description',
        'duration_id',
        'type_of_employment_id',
        'form_of_employment_id',
        'form_of_cooperation_id',
        'city_id',
        'status',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->ID();
        });
    }

    public static function changeStatusVacancy ($vacancy_id, $status){
		if ($status <= 3 && Vacancies::find($vacancy_id)){
			Vacancies::find($vacancy_id)->where('user_id',Auth::ID())->update(['status'=> $status]);
		}else{
			dd('you are cheaters');
		}
    }

    public function candidates(){
        return $this->hasMany(CandidateToVacancy::class);
    }

    public function cities(){
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function durations(){
        return $this->belongsTo(Duration::class, 'duration_id');
    }

    public function formOfCooperations(){
        return $this->belongsTo(FormOfCooperation::class, 'form_of_cooperation_id');
    }

    public function typeOfEmployments(){
        return $this->belongsTo(TypeOfEmployment::class, 'type_of_employment_id');
    }

    public function formOfEmployments(){
        return $this->belongsTo(FormOfEmployment::class, 'form_of_employment_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }

    public function scopeArchive($query)
    {
        return $query->where('status', '2')->orwhere('status', '3');
    }

    public static function archiveVacancy(Vacacancies $vacancy){
        $vacancy = DB::table('vacancies')
        ->where('vacancies.id', $vacancy->id)
        ->update(['status' => '2']);
    }

    public static function deleteVacancy(Vacancies $vacancy){
        $vacancy = DB::table('vacancies')
        ->where('vacancies.id', $vacancy->id)
        ->update(['status' => '3']);
    }


}
