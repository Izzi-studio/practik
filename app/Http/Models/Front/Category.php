<?php

namespace App\Http\Models\Front;

use App\Http\Models\Front\Vacancy;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Front\CategoryVacancy;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $guarded = [];

    public function vacancies(){
        return $this->belongsToMany(Vacancy::class(), 'category_vacancy', 'category_id', 'vacancy_id');
    }
}
