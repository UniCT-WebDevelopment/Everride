<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function likes(){
        
        return $this->belongsToMany(User::class);
    }

    public function comment(){
        
        return $this->HasMany(Comment::class);
    }

    public function map(){

        return $this->belongsTo(Map::class);
    }
}
