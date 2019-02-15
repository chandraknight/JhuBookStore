@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Author - '.$author->name)

@section('section')
    {{$author->name}}<br/>
    {{$author->bio}}<br/>
    {{$author->email}}<br/>
    <img src="{{isset($author->photo)?URL::asset('storage/authors/'.$author->photo):''}}" class="img img-responsive img-thumbnail" /><br/>
    {{$author->web}}<br/>
    {{$author->fb_linl}}<br/>
    {{$author->twitter_link}}<br/>
    {{$author->linkedin_link}}<br/>
    {{$author->rss_link}}<br/>
    {{$author->youtube_link}}<br/>
    {{$author->insta_link}}<br/>
    @if($author->user_id)
    Created By:  {{$author->user->name}}
    @endif
@stop
