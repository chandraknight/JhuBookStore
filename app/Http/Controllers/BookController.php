<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/3/2019
 * Time: 4:26 PM
 */

namespace App\Http\Controllers;


use App\Model\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function list()
    {

        $books =Book::Latest()->Paginate(10);
        return view('Backend.Admin.Book.list', ['books' => $books]);
    }

    Public function add()
    {

        return view('Backend.Admin.Book.form');
    }

    public function save(Request $request)
    {
//        dd($request);
        $book = new book();
        $book->name = $request->book_name;
        $book->isbn = $request->book_isbn;
        $book->description = $request->book_description;
        $book->publish_date = $request->book_publish_data;
        $book->slug=str_slug($request->book_name, '-');
        $book->edition = $request->book_edition;
        $book->summary = $request->book_summary;
        $book->publisher_id = $request->book_publisher_id;
        $file = $request->file('book_coverimage');
        if ($request->hasFile('book_coverimage')) {
            $filenamewithext = $request->file('book_coverimage')->getClientOriginalName();
            $extension = $request->file('book_coverimage')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename = clean($filename . time() ). '.' . $extension;
            $file = $request->file('book_coverimage')->storeAs('/public/Books/', $storename);
            $book->coverimage = $storename;
        }

        if (Auth::user()) {
            $book->user_id = Auth::user()->id;
        }
        $saved=$book->save();
        if($saved){
            $book->author()->sync($request->book_author_id);
            $book->genre()->sync($request->book_genre_id);
        }

        return redirect()->route('ListBook')->with('success', 'book Created Successfully');
    }

    public function show($id)
    {
        $book = book::findorfail($id);
        return view('Backend.Admin.book.show', ['book' => $book]);
    }

    public function edit($id)
    {
        $book = book::findorfail($id);
        return view('Backend.Admin.book.form', ['book' => $book]);
    }

    public function update(Request $request)
    {

        $book =Book::findorfail($request->book_id);
        $book->name = $request->book_name;
        $book->isbn = $request->book_isbn;
        $book->description = $request->book_description;
        $book->publish_date = $request->book_publish_data;
        $book->slug=str_slug($request->book_name, '-');
        $book->edition = $request->book_edition;
        $book->summary = $request->book_summary;
        $book->publisher_id = $request->book_publisher_id;
        $file = $request->file('book_coverimage');
        if ($request->hasFile('book_coverimage')) {
            if(Storage::disk('public')->exists('/Books/', $book->photo)) {
                Storage::disk('public')->delete('/Books/', $book->photo);
            }
            $filenamewithext = $request->file('book_coverimage')->getClientOriginalName();
            $extension = $request->file('book_coverimage')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename =clean($filename . time() ). '.' . $extension;
            $file = $request->file('book_coverimage')->storeAs('/public/Books/', $storename);
            $book->coverimage = $storename;
        }
        $updated=$book->update();
        if($updated){
            $book->author()->sync($request->book_author_id);
            $book->genre()->sync($request->book_genre_id);
        }

        return redirect()->route('ListBook')->with('success', 'Book Updated Successfully');
    }

    public function delete($id)
    {
        $book = Book::findorfail($id);
        if(Storage::disk('public')->exists('Books/', $book->coverimage)) {
            Storage::disk('public')->delete('Books/', $book->coverimage);
        }
        $book->delete();
        return redirect()->back()->with('success', 'Book Deleted Successfully');
    }
}
