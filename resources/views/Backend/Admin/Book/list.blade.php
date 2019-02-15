@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Books')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ Route('AddBook')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"> Add</i></a>
                @section ('cotable_panel_title','List of Books')
                @section ('cotable_panel_body')
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr >
                            <th scope="col" class="text-center">Sn.</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">ISBN</th>
                            <th scope="col" class="text-center">Summary</th>
                            <th scope="col" class="text-center">Edition</th>
                            <th scope="col" class="text-center">Photo</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($books as $book)
                            <tr >
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->isbn}}</td>
                                <td>{{$book->summary}}</td>
                                <td>{{$book->edition}}</td>
                                <td> <img src="{{isset($book->coverimage)?URL::asset('storage/Books/'.$book->coverimage):''}}" class="img img-responsive img-thumbnail" />
                                </td>
                                <td class="text-center"><a href="{{route('ShowBook',$book->id)}}"> view </a>|
                                    <a href="{{route('EditBook',$book->id)}}"> Edit </a> |
                                    <a href="{{route('DeleteBook',$book->id)}}"> Delete </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    Sorry no data found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr >
                            <th scope="col" class="text-center" colspan="8">{{$books->links()}}</th>
                        </tr>
                        </tfoot>
                    </table>
                @endsection
                @include('Backend.Admin.widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
