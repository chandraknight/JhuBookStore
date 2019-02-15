@extends('Backend.Admin.layouts.dashboard')
@section('page_heading','Book Publisher')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ Route('AddPublisher')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle">
                        Add</i></a>
                @section ('cotable_panel_title','List of Book Publilsher')
                @section ('cotable_panel_body')
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">Sn.</th>
                            <th scope="col" class="text-center">Publisher</th>
                            <th scope="col" class="text-center">Logo</th>
                            <th scope="col" class="text-center">Addres</th>
                            <th scope="col" class="text-center">Phone</th>
                            <th scope="col" class="text-center">Web</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($publishers as $publisher)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$publisher->name}}</td>
                                <td><img src="{{isset($publisher->logo)?URL::asset('storage/Publishers/'.$publisher->logo):''}}" class="img img-responsive img-thumbnail" />
                                </td>
                                <td>{{$publisher->address}}</td>
                                <td>{{$publisher->phone}}</td>
                                <td>{{$publisher->web}}</td>
                                <td>{{$publisher->email}}</td>
                                <td class="text-center"><a href="{{route('ShowPublisher',$publisher->id)}}"> view </a>|
                                    <a href="{{route('EditPublisher',$publisher->id)}}"> Edit </a> |
                                    <a href="{{route('DeletePublisher',$publisher->id)}}"> Delete </a>
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
                        <tr>
                            <th scope="col" class="text-center" colspan="8">{{$publishers->links()}}</th>
                        </tr>
                        </tfoot>
                    </table>
                @endsection
                @include('Backend.Admin.widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
