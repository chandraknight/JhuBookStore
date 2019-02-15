@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book  - '.$bookcost->book->name)

@section('section')
    {{$bookcost->book->name}}<br/>
    {{$bookcost->supplier->name}}<br/>
    {{$bookcost->cost}}<br/>
    {{$bookcost->in_stock}}<br/>
    @if($bookcost->user_id)
    Created By:  {{$bookcost->user->name}}
    @endif
@stop
