<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['title','description'];

    public function post(){
        return $this->belongsToMany('App\Post','posts_tags','tag_id');
    }
}
