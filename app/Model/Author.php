<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'authors';
    protected $fillable = ['name','slug', 'bio','email','web','fb_link','twitter_link','insta_link','linkedin_link','youtube_link','rss_link','photo','user_id'];
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function book(){
        return $this->belongsToMany('App\Model\book');
    }
}
