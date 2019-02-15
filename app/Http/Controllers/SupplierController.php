<?php

namespace App\Http\Controllers;

use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    //
    public function list()
    {
        $suppliers = Supplier::Latest()->Paginate(10);
        return view('Backend.Admin.Supplier.list', ['suppliers' => $suppliers]);
    }

    Public function add()
    {
        return view('Backend.Admin.Supplier.form');
    }

    public function save(Request $request)
    {

        $supplier = new Supplier();
        $supplier->name = $request->supplier_name;
        $supplier->slug=str_slug($request->supplier_name, '-');
        $supplier->address = $request->supplier_address;
        $supplier->email = $request->supplier_email;
        $supplier->web = $request->supplier_web;
        $file = $request->file('supplier_logo');
        if ($request->hasFile('supplier_logo')) {
            $filenamewithext = $request->file('supplier_logo')->getClientOriginalName();
            $extension = $request->file('supplier_logo')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename =  clean($filename . time() ). '.' . $extension;
            $file = $request->file('supplier_logo')->storeAs('public/Suppliers/', $storename);
            $supplier->logo = clean($storename);
        }

        if (Auth::user()) {
            $supplier->user_id = Auth::user()->id;
        }
        $supplier->save();

        return redirect()->route('ListSupplier')->with('success', 'Supplier Created Successfully');
    }

    public function show($id)
    {
        $supplier = Supplier::findorfail($id);
        return view('Backend.Admin.Supplier.show', ['supplier' => $supplier]);
    }

    public function edit($id)
    {
        $supplier = Supplier::findorfail($id);
        return view('Backend.Admin.Supplier.form', ['supplier' => $supplier]);
    }

    public function update(Request $request)
    {
        $supplier =Supplier::findorfail($request->supplier_id);
        $supplier->name = $request->supplier_name;
        $supplier->slug=str_slug($request->supplier_name, '-');
        $supplier->address = $request->supplier_address;
        $supplier->email = $request->supplier_email;
        $supplier->web = $request->supplier_web;
        $file = $request->file('supplier_logo');
        if ($request->hasFile('supplier_logo')) {

            if(Storage::disk('public')->exists('/Suppliers/', $supplier->logo)) {
                Storage::disk('public')->delete('/Suppliers/', $supplier->logo);
            }
            $filenamewithext = $request->file('supplier_logo')->getClientOriginalName();
            $extension = $request->file('supplier_logo')->getClientOriginalExtension();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $storename = clean($filename . time() ). '.' . $extension;
            $file = $request->file('supplier_logo')->storeAs('public/Suppliers/', $storename);
            $supplier->logo = $storename;
        }
        $supplier->update();

        return redirect()->route('ListSupplier')->with('success', 'Supplier Updated Successfully');
    }

    public function delete($id)
    {
        $supplier = Supplier::findorfail($id);
        if(Storage::disk('public')->exists('/Suppliers/', $supplier->logo)) {
            Storage::disk('public')->delete('/Suppliers/', $supplier->logo);
        }
        $supplier->delete();
        return redirect()->back()->with('success', 'Supplier Deleted Successfully');
    }
}
