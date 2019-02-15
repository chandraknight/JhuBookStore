<?php

namespace App\Http\Controllers;

use App\Model\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    public function list(){
        $genres = Genre::Latest()->Paginate(10);

        return view('Backend.Admin.Genre.list',['genres'=>$genres]);
    }
    Public function add(){
        return view('Backend.Admin.Genre.form');
    }
    public function save(Request $request)
    {
        $genre = new Genre();
        $genre->title = $request->genre_name;
        $genre->slug=str_slug($request->genre_name, '-');
        if(Auth::user()) {
            $genre->user_id = Auth::user()->id;
        }
        $genre->save();

        return redirect()->route('ListGenre')->with('success','Genre Created Successfully');
    }
    public function show($id){

        $genre=Genre::findorfail($id);
        return view('Backend.Admin.Genre.show',['genre'=>$genre]);
    }
    public function edit($id){

        $genre=Genre::findorfail($id);

        return view('Backend.Admin.Genre.form',['genre'=>$genre]);
    }

    public function update(Request $request,$id)
    {
        $genre = Genre::findorfail($request->genre_id);
        $genre->title = $request->genre_name;
        $genre->slug=str_slug($request->genre_name, '-');
        if(Auth::user()) {
            $genre->user_id = Auth::user()->id;
        }
        $genre->update();

        return redirect()-> route('ListGenre')->with('success','Genre Updated Successfully');
    }
    public function delete($id){
        $genre=Genre::findorfail($id);
        $genre->delete();
        return redirect()->back()->with('success','Genre Deleted Successfully');
    }
}
