@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book - '.$book->name)

@section('section')
    {{$book->name}}<br/>
    {{$book->isbn}}<br/>
    {{$book->edition}}<br/>
    {{$book->summary}}<br/>
    <img src="{{isset($book->coverimage)?URL::asset('storage/Books/'.$book->coverimage):''}}" class="img img-responsive img-thumbnail" /><br/>

    {{$book->publisher->name}}<br/>
    {{$book->description}}<br/>
   @foreach($book->author as $author)
       {{$author->name}} |
       @endforeach
    <br/>
    @foreach($book->genre as $genre)
        {{$genre->title}} |
    @endforeach
    <br/>
    @foreach($book->bookcost as $bookcost)
        {{$bookcost->supplier->name}}
        {{$bookcost->cost}}
        {{$bookcost->in_stock}}
        |
    @endforeach
    @if($book->user_id)
    Created By:  {{$book->user->name}}
    @endif
@stop
