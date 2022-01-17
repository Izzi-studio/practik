<?php

namespace App\Http\Models\Front;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $table = 'files';
    public $timestamps = false;
    protected $guarded = [];
    protected $fillable = [
        'cv', 'user_id'
      ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->ID();
        });
    }
}
