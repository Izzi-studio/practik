<?php

namespace App\Http\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';
    public $timestamps = false;
    protected $guarded = [];

    public static function getCities(){
        return Cities::get();
    }

    public static function getCitiesByStateId($id){
        return Cities::whereStateId($id)->get();
    }

    public static function getCityById($id){
        return Cities::find($id);
    }

    public function countries(){
        return $this->belongsTo('App\Http\Models\Front', 'country_id');
    }
}
