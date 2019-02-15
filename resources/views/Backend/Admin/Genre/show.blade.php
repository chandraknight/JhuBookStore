@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Genre - '.$genre->title)

@section('section')
    {{$genre->title}}
    @if($genre->user_id)
    Created By:  {{$genre->user->name}}
    @endif
@stop
