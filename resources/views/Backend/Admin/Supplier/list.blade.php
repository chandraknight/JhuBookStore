@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Suppliers')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ Route('AddSupplier')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"> Add</i></a>
                @section ('cotable_panel_title','List of Book Genres')
                @section ('cotable_panel_body')
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr >
                            <th scope="col" class="text-center">Sn.</th>
                            <th scope="col" class="text-center">Supplier</th>
                            <th scope="col" class="text-center">Logo</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($suppliers as $supplier)
                            <tr >
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$supplier->name}}</td>
                                <td><img src="{{isset($supplier->logo)?URL::asset('storage/Suppliers/'.$supplier->logo):''}}" class="img img-responsive img-thumbnail" />
                                </td>
                                <td class="text-center"><a href="{{route('ShowSupplier',$supplier->id)}}"> view </a>|
                                    <a href="{{route('EditSupplier',$supplier->id)}}"> Edit </a> |
                                    <a href="{{route('DeleteSupplier',$supplier->id)}}"> Delete </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    Sorry no data found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr >
                            <th scope="col" class="text-center" colspan="4">{{$suppliers->links()}}</th>
                        </tr>
                        </tfoot>
                    </table>
                @endsection
                @include('Backend.Admin.widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
