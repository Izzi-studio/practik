<?php

namespace App\Http\Models\Front;

use Auth;
use App\Http\Models\Front\Vacancies;
use Illuminate\Database\Eloquent\Model;

class CandidateToVacancy extends Model
{
    protected $table = 'candidates_to_vacancy';
    public $timestamps = false;
    protected $guarded = [];

    public function vacancies(){
        return $this->belongsTo('App\Http\Models\Front', 'vacancy_id');
    }

}
