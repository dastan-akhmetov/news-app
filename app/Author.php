<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'users';

    public function articles()
    {
    	return $this->hasMany('App\Article');
    }
}
