<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['author_id', 'title', 'annotation', 'published_at'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
