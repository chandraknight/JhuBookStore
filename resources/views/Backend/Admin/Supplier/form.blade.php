@extends('Backend.Admin.layouts.dashboard')
@section('page_heading',isset($supplier)?'Edit Supplier - '.$supplier->name:'Add New Supplier')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <form role="form" action="{{isset($supplier)?route('UpdateSupplier'):route('SaveSupplier')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="supplier_id" value="{{isset($supplier->id)?$supplier->id:old('supplier_id')}}"/>
                <div class="form-group">
                    <label class="control-label" for="supplier_name">Supplier Name</label>
                    <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="supplier Name" value="{{isset($supplier->name)?$supplier->name:old('supplier_name')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="supplier_address">Supplier Address</label>
                    <textarea class="form-control" id="supplier_address" name="supplier_address"> {{isset($supplier->address)?$supplier->address:old('supplier_address')}}</textarea>
                </div>

                <div class="form-group">
                    <label class="control-label" for="supplier_email">Supplier Email</label>
                    <input type="email" class="form-control" id="supplier_email" name="supplier_email" placeholder="supplier Email" value="{{isset($supplier->email)?$supplier->email:old('supplier_email')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="supplier_web">Supplier Web</label>
                    <input type="text" class="form-control" id="supplier_web" name="supplier_web" placeholder="supplier Web" value="{{isset($supplier->web)?$supplier->web:old('supplier_web')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="supplier_phone">Supplier Phone</label>
                    <input type="text" class="form-control" id="supplier_phone" name="supplier_phone" placeholder="supplier Phone" value="{{isset($supplier->phone)?$supplier->phone:old('supplier_phone')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="supplier_logo">Supplier Logo</label>
                    <input type="file" class="form-control" id="supplier_logo" name="supplier_logo" value="{{isset($supplier->logo)?$supplier->logo:old('supplier_logo')}}"/>
                    <img src="{{isset($supplier->logo)?URL::asset('storage/Supplier/'.$supplier->logo):''}}" class="img img-responsive img-thumbnail" />

                </div>
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
    </div>
@stop
