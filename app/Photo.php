<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    public function post(){
        return $this->hasOne(Post::class);
    }
}
