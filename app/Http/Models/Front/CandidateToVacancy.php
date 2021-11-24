<?php

namespace App\Http\Models\Front;

use Auth;
use App\User;
use App\Http\Models\Front\Vacancy;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Front\CandidateToVacancy;

class CandidateToVacancy extends Model
{
    protected $table = 'candidates_to_vacancy';
    public $timestamps = true;
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'status'

    ];

    public static function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeCandidateActive($query)
    {
        return $query->where('status', '1');
    }

    public function scopeCandidateArchive($query)
    {
        return $query->where('status', '2')->orwhere('status', '3');
    }

    public static function acceptCandidate(Vacancy $vacancy){
        $vacancy = DB::table('candidates_to_vacancy')
        ->where('candidates_to_vacancy.id', $vacancy->id)
        ->update(['status' => '2']);
    }

    public static function refusCandidate(CandidateToVacancy $vacancy){
        $vacancy = DB::table('candidates_to_vacancy')
        ->where('candidates_to_vacancy.id', $vacancy->id)
        ->update(['status' => '3']);
    }

    
}
