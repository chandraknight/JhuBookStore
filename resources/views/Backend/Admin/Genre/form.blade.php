@extends('Backend.Admin.layouts.dashboard')
@section('page_heading',isset($genre)?'Edit Genre - '.$genre->title:'Add New Genre')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <form role="form" action="{{isset($gener)?route('UpdateGene'):route('SaveGenre')}}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('post')
                <div class="form-group" >
                    <label class="control-label" for="genre_name">Genre Name</label>
                    <input type="text" class="form-control" id="genre_name" name="genre_name" placeholder="Genre name" value="{{isset($genre->title)?$genre->title:old('genre_name')}}">
                </div>
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
    </div>
@stop
