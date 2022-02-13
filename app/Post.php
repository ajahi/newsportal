<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','description','author','source','position','featured'];

    public function tag(){
        return $this->belongsToMany('App\Tag','posts_tags','post_id','tag_id');
    }
}
