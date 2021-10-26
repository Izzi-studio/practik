<?php

namespace App\Http\Models\Front;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table = 'states';
    public $timestamps = false;
    protected $guarded = [];

    public static function getStates(){
        return States::get();
    }

    public static function getStateByCountryId($id){
        return States::whereCountryId($id)->get();
    }

    public static function getStateById($id){
        return States::find($id);
    }
}
