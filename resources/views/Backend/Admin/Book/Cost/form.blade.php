@extends('Backend.Admin.layouts.dashboard')
@section('page_heading',isset($bookcost)?'Edit Book - '.$bookcost->book->name:'Add New Book Cost')

@section('section')
    <div class="col-sm-12">
        <div class="row">
            <form role="form" action="{{isset($bookcost)?route('UpdateBookCost'):route('SaveBookCost')}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="book_cost_id"
                       value="{{isset($bookcost->id)?$bookcost->id:old('book_cost_id')}}"/>


                <div class="form-group">
                    <label class="control-label" for="book_id">Book</label>
                    <select class="form-control" id="book_id" name="book_id">
                        @forelse(App\Model\Book::get() as $book)
                            <option
                                value="{{isset($book->id)?$book->id:old('book_id')}}"

                                {{($bookcost->book_id == $book->id)?'selected':''}}

                            >

                                {{isset($book->name)?$book->name:$book->name}}
                            </option>
                        @empty
                            <option
                                value="{{old('book_id')}}">
                                {{'Please Create Book '}}
                            </option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_supplier_id">Book Supplier</label>
                    <select class="form-control" id="book_supplier_id" name="book_supplier_id">
                        @forelse(App\Model\Supplier::get() as $supplier)
                            <option
                                value="{{isset($supplier->id)?$supplier->id:old('book_supplier_id')}}"
                                {{($bookcost->supplier_id == $supplier->id)?'selected':''}}
                            >
                                {{isset($supplier->name)?$supplier->name:$supplier->name}}

                            </option>
                        @empty
                            <option
                                value="{{old('book_supplier_id')}}">
                                {{'Please Create Book Supplier'}}
                            </option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="book_cost">Book Mrp</label>
                    <input type="text" class="form-control" id="book_cost" name="book_cost"
                           placeholder="Book MRP"
                           value="{{isset($bookcost->cost)?$bookcost->cost:old('book_cost')}}">
                </div>

                <div class="form-group">
                    <label>Book Stock</label>
                    <label class="radio-inline">
                        <input type="radio" name="book_in_stock" id="book_in_stock_yes"
                               value="{{'yes'}}" @if($bookcost->in_stock=='yes') {{'checked'}}@endif> In Stock
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="book_in_stock" id="book_in_stock_no"
                               value="{{'no'}}" @if($bookcost->in_stock=='no') {{'checked'}}@endif >Out of Sotck
                    </label>

                </div>
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
    </div>
@stop
