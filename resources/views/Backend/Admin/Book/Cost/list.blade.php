@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Books')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ Route('AddBookCost')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"> Add</i></a>
                @section ('cotable_panel_title','List of Books')
                @section ('cotable_panel_body')
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr >
                            <th scope="col" class="text-center">Sn.</th>
                            <th scope="col" class="text-center">Book</th>
                            <th scope="col" class="text-center">Supplier</th>
                            <th scope="col" class="text-center">Cost</th>
                            <th scope="col" class="text-center">Actions</th>


                        </tr>
                        </thead>
                        <tbody>

                        @forelse($bookcosts as $bookcost)
                            <tr >
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$bookcost->book->name}}</td>
                                <td>{{$bookcost->supplier->name}}</td>
                                <td>{{$bookcost->cost}}</td>

                                <td class="text-center"><a href="{{route('ShowBookCost',$bookcost->id)}}"> view </a>|
                                    <a href="{{route('EditBookCost',$bookcost->id)}}"> Edit </a> |
                                    <a href="{{route('DeleteBookCost',$bookcost->id)}}"> Delete </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    Sorry no data found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr >
                            <th scope="col" class="text-center" colspan="5">{{$bookcosts->links()}}</th>
                        </tr>
                        </tfoot>
                    </table>
                @endsection
                @include('Backend.Admin.widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
