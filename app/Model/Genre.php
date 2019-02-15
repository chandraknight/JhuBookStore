<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\user;
class Genre extends Model
{
    //
    protected $table = 'genres';
    protected $fillable = ['title','slug', 'user_id'];
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function book(){
        return $this->belongsToMany('App\Model\book');
    }

}
