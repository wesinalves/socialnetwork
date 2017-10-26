<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    //authenticate deal
    use \Illuminate\Auth\Authenticatable;
    public function posts(){
    	return $this->hasMany('App\Post');
    }

    public function likes(){
    	return $this->hasMany('App\Like');
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

}
