<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';
    protected $fillable = ['isbn', 'name','publisher_id','coverimage','description','summary','slug','edition','published_date','user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function publisher(){
        return $this->belongsTo('App\Model\Publisher');
    }
    public function genre(){
        return $this->belongsToMany('App\Model\Genre');
    }
    public function author(){
        return $this->belongsToMany('App\Model\Author');
    }
    public function bookcost(){
        return $this->hasMany('App\Model\BookCost');
    }
}
