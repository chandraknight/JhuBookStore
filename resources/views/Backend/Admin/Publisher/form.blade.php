@extends('Backend.Admin.layouts.dashboard')
@section('page_heading',isset($publisher)?'Edit Publisher - '.$publisher->name:'Add New Publisher')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <form role="form" action="{{isset($publisher)?route('UpdatePublisher'):route('SavePublisher')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="publisher_id" value="{{isset($publisher->id)?$publisher->id:old('publisher_id')}}"/>
                <div class="form-group">
                    <label class="control-label" for="publisher_name">Publisher Name</label>
                    <input type="text" class="form-control" id="publisher_name" name="publisher_name" placeholder="Publisher Name" value="{{isset($publisher->name)?$publisher->name:old('publisher_name')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="publisher_description">Publisher Description</label>
                    <textarea class="form-control" id="publisher_description" name="publisher_description"> {{isset($publisher->description)?$publisher->description:old('publisher_description')}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="publisher_address">Publisher Address</label>
                    <textarea class="form-control" id="publisher_address" name="publisher_address"> {{isset($publisher->address)?$publisher->address:old('publisher_address')}}</textarea>
                </div>

                <div class="form-group">
                    <label class="control-label" for="publisher_email">Publisher Email</label>
                    <input type="email" class="form-control" id="publisher_email" name="publisher_email" placeholder="Publisher Email" value="{{isset($publisher->email)?$publisher->email:old('publisher_email')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="publisher_web">Publisher Web</label>
                    <input type="text" class="form-control" id="publisher_web" name="publisher_web" placeholder="Publisher Web" value="{{isset($publisher->web)?$publisher->web:old('publisher_web')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="publisher_phone">Publisher Phone</label>
                    <input type="text" class="form-control" id="publisher_phone" name="publisher_phone" placeholder="Publisher Phone" value="{{isset($publisher->phone)?$publisher->phone:old('publisher_phone')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="publisher_logo">Publisher Logo</label>
                    <input type="file" class="form-control" id="publisher_logo" name="publisher_logo" value="{{isset($publisher->logo)?$publisher->logo:old('publisher_logo')}}"/>
                    <img src="{{isset($publisher->logo)?URL::asset('storage/Publishers/'.$publisher->logo):''}}" class="img img-responsive img-thumbnail" />

                </div>
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
    </div>
@stop
