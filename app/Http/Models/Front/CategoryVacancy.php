<?php

namespace App\Http\Models\Front;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Front\Vacancy;
class CategoryVacancy extends Model
{
    protected $table = 'category_vacancy';
    public $timestamps = false;
    protected $guarded = [];


    public function vacancies(){
        return $this->hasMany(Vacancy::class,'id','vacancy_id');
    }

}
