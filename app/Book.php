<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    protected $fillable = [
        'name', 'author', 'edition','genre'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
