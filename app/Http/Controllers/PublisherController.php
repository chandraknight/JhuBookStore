<?php

namespace App\Http\Controllers;

use App\Model\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublisherController extends Controller
{
    //
    public function list()
    {
        $publishers = Publisher::Latest()->Paginate(10);
        return view('Backend.Admin.Publisher.list', ['publishers' => $publishers]);
    }

    Public function add()
    {
        return view('Backend.Admin.Publisher.form');
    }

    public function save(Request $request)
    {


        $publisher = new Publisher();
        $publisher->name = $request->publisher_name;
        $publisher->slug=str_slug($request->publisher_name, '-');
        $publisher->description = $request->publisher_description;
        $publisher->email = $request->publisher_email;
        $publisher->web = $request->publisher_web;
        $publisher->address = $request->publisher_address;
        $publisher->phone = $request->publisher_phone;
        $file = $request->file('publisher_logo');
        if ($request->hasFile('publisher_logo')) {
            $filenamewithext = $request->file('publisher_logo')->getClientOriginalName();
            $extension = $request->file('publisher_logo')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename = clean($filename . time() ). '.' . $extension;
            $file = $request->file('publisher_logo')->storeAs('/public/Publishers/', $storename);
            $publisher->logo = $storename;
        }
        if (Auth::user()) {
            $publisher->user_id = Auth::user()->id;
        }
        $publisher->save();
        return redirect()->route('ListPublisher')->with('success', 'Publisher Created Successfully');
    }

    public function show($id)
    {
        $publisher = Publisher::findorfail($id);
        return view('Backend.Admin.Publisher.show', ['publisher' => $publisher]);
    }

    public function edit($id)
    {
        $publisher = Publisher::findorfail($id);
        return view('Backend.Admin.Publisher.form', ['publisher' => $publisher]);
    }

    public function update(Request $request)
    {
        $publisher =Publisher::findorfail($request->publisher_id);
        $publisher->name = $request->publisher_name;
        $publisher->slug=str_slug($request->publisher_name, '-');
        $publisher->description = $request->publisher_description;
        $publisher->email = $request->publisher_email;
        $publisher->web = $request->publisher_web;
        $publisher->address = $request->publisher_address;
        $publisher->phone = $request->publisher_phone;
        $file = $request->file('publisher_logo');
        if ($request->hasFile('publisher_logo')) {
            if(Storage::disk('public')->exists('Publisher/', $publisher->logo)) {
                Storage::disk('public')->delete('Publishers/', $publisher->logo);
        }
            $filenamewithext = $request->file('publisher_logo')->getClientOriginalName();
            $extension = $request->file('publisher_logo')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename = clean($filename . time() ). '.' . $extension;
            $file = $request->file('publisher_logo')->storeAs('/public/Publishers/', $storename);
            $publisher->logo = $storename;
        }
        if (Auth::user()) {
            $publisher->user_id = Auth::user()->id;
        }
        $publisher->update();
        return redirect()->route('ListPublisher')->with('success', 'Publisher Updated Successfully');
    }

    public function delete($id)
    {
        $publisher = Publisher::findorfail($id);
        if(Storage::disk('public')->exists('Publisher/', $publisher->logo)) {
            Storage::disk('public')->delete('Publishers/', $publisher->logo);
        }
        $publisher->delete();
        return redirect()->back()->with('success', 'Publisher Deleted Successfully');
    }
}
