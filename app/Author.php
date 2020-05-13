<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['full_name', 'bio'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
