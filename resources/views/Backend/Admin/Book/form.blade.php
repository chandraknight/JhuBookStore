@extends('Backend.Admin.layouts.dashboard')
@section('page_heading',isset($book)?'Edit Book - '.$book->name:'Add New Book')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <form role="form" action="{{isset($book)?route('UpdateBook'):route('SaveBook')}}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="book_id" value="{{isset($book->id)?$book->id:old('book_id')}}"/>
                <div class="form-group">
                    <label class="control-label" for="book_name">Book Name</label>
                    <input type="text" class="form-control" id="book_name" name="book_name"
                           placeholder="Book Name"
                           value="{{isset($book->name)?$book->name:old('book_name')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_name">Book ISBN</label>
                    <input type="text" class="form-control" id="book_isbn" name="book_isbn"
                           placeholder="Book ISBN Number"
                           value="{{isset($book->isbn)?$book->isbn:old('book_isbn')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_summary">Book Summary</label>
                    <textarea class="form-control" id="book_summary" name="book_summary"> {{isset($book->summary)?$book->summary:old('book_summary')}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_description">Book Description</label>
                    <textarea class="form-control" id="book_description"
                              name="book_description"> {{isset($book->description)?$book->description:old('book_description')}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_publish_data">Book Publish Date</label>
                    <input type="text" class="form-control" id="book_publish_data" name="book_publish_data"
                           placeholder="book publish data"
                           value="{{isset($book->publish_date)?$book->publish_date:old('book_publish_data')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_name">Book Edition</label>
                    <input type="text" class="form-control" id="book_name" name="book_edition"
                           placeholder="book edition"
                           value="{{isset($book->edition)?$book->edition:old('book_edition')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_publisher_id">Book Publisher</label>
                    <select class="form-control" id="book_publisher_id" name="book_publisher_id">
                        @forelse(App\Model\Publisher::get() as $publisher)
                            <option
                                value="{{isset($publisher->id)?$publisher->id:old('book_publisher_id')}}"
                                {{($publisher->id == $book->publisher_id)?'selected':''}}

                            >
                                {{isset($publisher->name)?$publisher->name:$publisher->name}}
                            </option>
                        @empty
                            <option
                                value="{{old('book_publisher_id')}}">
                                {{'Please Create Publisher'}}
                            </option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_genre_id">Book Genre : </label>

                    @forelse(App\Model\Genre::get() as $genre)

                        <label class="checkbox-inline">
                            <input type="checkbox" id="book_genre_id" name="book_genre_id[]" value="{{$genre->id}}" @foreach($book->genre as $c)
                                {{($c->id == $genre->id)?'checked':''}}
                                @endforeach >{{$genre->title}}

                        </label>
                    @empty

                    @endforelse

                </div>
                <div class="form-group">
                    <label class="control-label" for="book_publisher_id">Book Authors : </label>

                    @forelse(App\Model\Author::get() as $author)

                        <label class="checkbox-inline">
                            <input type="checkbox" id="book_author_id" name="book_author_id[]"
                                   value="{{$author->id}}" @foreach($book->author as $c)
                                {{($c->id == $author->id)?'checked':''}}
                                @endforeach>{{$author->name}}
                        </label>
                    @empty

                    @endforelse

                </div>


                <div class="form-group">
                    <label class="control-label" for="book_coverimage">Book Image</label>
                    <input type="file" class="form-control" id="book_coverimage" name="book_coverimage"
                           value="{{isset($book->coverimage)?$book->coverimage:old('book_coverimage')}}"/>
                    <img src="{{isset($book->coverimage)?URL::asset('storage/Books/'.$book->coverimage):''}}" class="img img-responsive img-thumbnail" />
                </div>


                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
    </div>
@stop
