<?php

namespace App\Http\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';
    public $timestamps = false;
    protected $guarded = [];

    public static function getCountries(){
        return Countries::get();
    }

    public static function getCountryById($id){
        return Countries::find($id);
    }
}
