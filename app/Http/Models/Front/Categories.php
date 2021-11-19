<?php

namespace App\Http\Models\Front;

use App\Http\Models\Front\Vacancies;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $guarded = [];

    public function vacancy(){
        return $this->hasMany(Vacancies::class());
    }
}
