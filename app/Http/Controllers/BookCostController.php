<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/7/2019
 * Time: 12:55 PM
 */

namespace App\Http\Controllers;


use App\Model\BookCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCostController extends Controller
{
    public function list()
    {
        $bookcosts = BookCost::Latest()->Paginate(10);

        return view('Backend.Admin.Book.Cost.list', ['bookcosts' => $bookcosts]);
    }

    Public function add()
    {
        return view('Backend.Admin.Book.Cost.form');
    }

    public function save(Request $request)
    {
//        dd($request);

        $bookcost = new BookCost();
        $bookcost->book_id = $request->book_id;
        $bookcost->supplier_id=$request->book_supplier_id;
        $bookcost->cost = $request->book_cost;
        $bookcost->in_stock = $request->book_in_stock;

        if (Auth::user()) {
            $bookcost->user_id = Auth::user()->id;
        }
        $bookcost->save();

        return redirect()->route('ListBookCost')->with('success', 'Book.Cost Created Successfully');
    }

    public function show($id)
    {

        $bookcost = BookCost::findorfail($id);
        return view('Backend.Admin.Book.Cost.show', ['bookcost' => $bookcost]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $bookcost = BookCost::findorfail($id);

        return view('Backend.Admin.Book.Cost.form', ['bookcost' => $bookcost]);
    }

    public function update(Request $request)
    {

        $bookcost = BookCost::findorfail($request->book_cost_id);
        $bookcost->book_id = $request->book_id;
        $bookcost->supplier_id=$request->book_supplier_id;
        $bookcost->cost = $request->book_cost;
        $bookcost->in_stock = $request->book_in_stock;


        if (Auth::user()) {
            $$bookcost->user_id = Auth::user()->id;
        }
        $bookcost->update();

        return redirect()->route('ListBookCost')->with('success', 'Book Cost Updated Successfully');
    }

    public function delete($id)
    {
        $bookcost = BookCost::findorfail($id);
        $bookcost->delete();
        return redirect()->back()->with('success', 'Book Cost Deleted Successfully');
    }
}
