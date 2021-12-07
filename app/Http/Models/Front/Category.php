<?php

namespace App\Http\Models\Front;

use App\Http\Models\Front\Vacancy;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Front\CategoryVacancy;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;
    protected $guarded = [];

    public function vacancies(){
        return $this->belongsToMany(Vacancy::class);
    }

    public function scopeSearch($cat)
    {
        return empty(request()->search) ? $cat : $cat->where('name', 'like', '%'.request()->search.'%');
    }

}
