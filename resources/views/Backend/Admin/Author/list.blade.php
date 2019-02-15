@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Autthors')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ Route('AddAuthor')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"> Add</i></a>
                @section ('cotable_panel_title','List of Book Authors')
                @section ('cotable_panel_body')
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr >
                            <th scope="col" class="text-center">Sn.</th>
                            <th scope="col" class="text-center">Author</th>
                            <th scope="col" class="text-center">Bio</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Photo</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($authors as $author)
                            <tr >
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$author->name}}</td>
                                <td>{{$author->bio}}</td>
                                <td>{{$author->email}}</td>
                                <td> <img src="{{isset($author->photo)?URL::asset('storage/authors/'.$author->photo):''}}" class="img img-responsive img-thumbnail" /></td>
                                <td class="text-center"><a href="{{route('ShowAuthor',$author->id)}}"> view </a>|
                                    <a href="{{route('EditAuthor',$author->id)}}"> Edit </a> |
                                    <a href="{{route('DeleteAuthor',$author->id)}}"> Delete </a>
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
                            <th scope="col" class="text-center" colspan="6">{{$authors->links()}}</th>
                        </tr>
                        </tfoot>
                    </table>
                @endsection
                @include('Backend.Admin.widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
