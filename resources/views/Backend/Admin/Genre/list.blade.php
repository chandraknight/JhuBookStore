@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Genres')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ Route('AddGenre')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"> Add</i></a>
                @section ('cotable_panel_title','List of Book Genres')
                @section ('cotable_panel_body')
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr >
                            <th scope="col" class="text-center">Sn.</th>
                            <th scope="col" class="text-center">Genre</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($genres as $genre)
                            <tr >
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$genre->title}}</td>
                                <td class="text-center"><a href="{{route('ShowGenre',$genre->id)}}"> view </a>|
                                    <a href="{{route('EditGenre',$genre->id)}}"> Edit </a> |
                                    <a href="{{route('DeleteGenre',$genre->id)}}"> Delete </a>
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
                            <th scope="col" class="text-center" colspan="3">{{$genres->links()}}</th>
                        </tr>
                        </tfoot>
                    </table>
                @endsection
                @include('Backend.Admin.widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
