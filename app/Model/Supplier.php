<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    //
    protected $table = 'suppliers';
    protected $fillable = ['name','slug', 'address','email','web','logo','user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function bookCost(){
        return $this->hasMany('App\Model\BookCost');
    }
}
