<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','description', 'duration', 'type_of_employment', 'form_of_employment', 'city', 'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
