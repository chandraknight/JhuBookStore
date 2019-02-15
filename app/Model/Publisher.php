<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'publishers';
    protected $fillable = ['name','slug', 'description','email','web','address','logo','user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function book(){
        return $this->hasMany('App\Model\Book');
    }
}
