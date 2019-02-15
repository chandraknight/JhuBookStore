@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Supplier - '.$supplier->name)

@section('section')
    {{$supplier->name}}<br/>
    {{$supplier->address}}<br/>
    {{$supplier->phone}}<br/>
    {{$supplier->web}}<br/>
    {{$supplier->email}}<br/>
    <img src="{{isset($supplier->logo)?URL::asset('storage/Suppliers/'.$supplier->logo):''}}" class="img img-responsive img-thumbnail" />
    @if($supplier->user_id)
    Created By:  {{$supplier->user->name}}
    @endif
@stop
