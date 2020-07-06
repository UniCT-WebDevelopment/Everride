<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts(){

        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function likes(){
        
        return $this->belongsToMany(User::class);
    }
}
