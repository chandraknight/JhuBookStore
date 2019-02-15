@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Publisher - '.$publisher->name)

@section('section')
    {{$publisher->name}}<br/>
    {{$publisher->description}}<br/>
    {{$publisher->email}}<br/>
    <img src="{{isset($publisher->logo)?URL::asset('storage/Publishers/'.$publisher->logo):''}}" class="img img-responsive img-thumbnail" />
    <br/>
    {{$publisher->web}}<br/>
    {{$publisher->address}}<br/>
    {{$publisher->phone}}<br/>

    @if($publisher->user_id)
    Created By:  {{$publisher->user->name}}
    @endif
@stop
