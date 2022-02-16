<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {

        $data= Supplier::all();
        return view('admin.supplier.supplier_view',['datas'=>$data]);
    }

    public function create()
    {

        return view('admin.supplier.supplier_add');
    }


    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required',
            'c_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required',
       ]);
       $model= new Supplier();

       $model->name=$request->name;
       $model->c_name=$request->c_name;
       $model->phone=$request->phone;
       $model->address=$request->address;
       $model->status=$request->status;
       $model->save();


       return redirect()->route('supplier.index')->with('message','Supplier Added...!');
    }



    public function edit($id)
    {
        $data =Supplier::where('id', $id)->get();
        return view('admin.supplier.supplier_edit',compact('data'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'c_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'due'=>'required|numeric',
            'status'=>'required',
       ]);
       $id=$request->id;
       $model=Supplier::find($id);
       $model->name=$request->name;
       $model->c_name=$request->c_name;
       $model->phone=$request->phone;
       $model->address=$request->address;
       $model->due=$request->due;
       $model->status=$request->status;
       $model->update();


       return redirect()->route('supplier.index')->with('message','Supplier Updated...!');
    }

}
