<?php

namespace App\Http\Models\Front;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CandidateToVacancy extends Model
{
    protected $table = 'candidates_to_vacancy';
    public $timestamps = false;
    protected $guarded = [];


}
