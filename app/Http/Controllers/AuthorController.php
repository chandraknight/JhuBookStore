<?php

namespace App\Http\Controllers;

use App\Model\Author;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{

    public function list()
    {
        $authors = Author::Latest()->Paginate(10);

        return view('Backend.Admin.Author.list', ['authors' => $authors]);
    }

    Public function add()
    {
        return view('Backend.Admin.Author.form');
    }

    public function save(Request $request)
    {

        $author = new Author();
        $author->name = $request->author_name;
        $author->slug=str_slug($request->author_name, '-');
        $author->bio = $request->author_bio;
        $author->email = $request->author_email;
        $author->web = $request->author_web;
        $author->fb_link = $request->author_fb_link;
        $author->twitter_link = $request->author_twitter_link;
        $author->insta_link = $request->author_insta_link;
        $author->linkedin_link = $request->author_linked_link;
        $author->youtube_link = $request->author_youtube_link;
        $author->rss_link = $request->author_rss_link;
        $file = $request->file('author_photo');
        if ($request->hasFile('author_photo')) {
            $filenamewithext = $request->file('author_photo')->getClientOriginalName();
            $extension = $request->file('author_photo')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename = clean($filename . time() ). '.' . $extension;
            $file = $request->file('author_photo')->storeAs(Storage::disk('public').'Authors/', $storename);
            $author->photo = $file;
        }

        if (Auth::user()) {
            $author->user_id = Auth::user()->id;
        }
        $author->save();

        return redirect()->route('ListAuthor')->with('success', 'Author Created Successfully');
    }

    public function show($id)
    {

        $author = Author::findorfail($id);
        return view('Backend.Admin.Author.show', ['author' => $author]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $author = Author::findorfail($id);

        return view('Backend.Admin.Author.form', ['author' => $author]);
    }

    public function update(Request $request)
    {

        $author = Author::findorfail($request->author_id);
        $author->name = $request->author_name;
        $author->slug=str_slug($request->author_name, '-');
        $author->bio = $request->author_bio;
        $author->email = $request->author_email;
        $author->web = $request->author_web;
        $author->fb_link = $request->author_fb_link;
        $author->twitter_link = $request->author_twitter_link;
        $author->insta_link = $request->author_insta_link;
        $author->linkedin_link = $request->author_linked_link;
        $author->youtube_link = $request->author_youtube_link;
        $author->rss_link = $request->author_rss_link;
        $file = $request->file('author_photo');
        if ($request->hasFile('author_photo')) {
            if(Storage::disk('public')->exists('Authors/', $author->photo)) {
                Storage::disk('public')->delete('Authors/', $author->photo);
            }

            $filenamewithext = $request->file('author_photo')->getClientOriginalName();
            $extension = $request->file('author_photo')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename = clean($filename . time() ). '.' . $extension;
            $path = $request->file('author_photo')->storeAs('/public/Authors', $storename);
            $author->photo = $storename;
        }
        if (Auth::user()) {
            $author->user_id = Auth::user()->id;
        }
        $author->update();

        return redirect()->route('ListAuthor')->with('success', 'Author Updated Successfully');
    }

    public function delete($id)
    {
        $author = Author::findorfail($id);
        if(File::exists(Storage::disk('public').'Authors/', $author->photo)) {
            File::delete(Storage::disk('public').'Authors/', $author->photo);
        }
        $author->delete();
        return redirect()->back()->with('success', 'Author Deleted Successfully');
    }
}
