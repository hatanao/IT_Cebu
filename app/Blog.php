<?php

namespace App;
use Auth;
use App\Like;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // public function likes(){
    //     return $this->hasMany('App\Like');
    // }

    // public function like_by()
    // {
    //   return Like::where('user_id', Auth::user()->id)->first();
    // }
}
