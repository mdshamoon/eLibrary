<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    protected $fillable = [
        'name', 'author', 'edition','genre','cover'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
}
