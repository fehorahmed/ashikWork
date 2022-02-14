<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $units=ProductUnit::all();
        $data= Product::all();
        return view('admin.product.product_view',['datas'=>$data,'units'=>$units]);
    }

    public function create()
    {
        $units=ProductUnit::all();
        return view('admin.product.product_add',compact('units'));
    }


    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required',
            'unit_id'=>'required',
            'code'=>'numeric',
            'status'=>'required',
       ]);
       $model= new Product();

       $model->name=$request->name;
       $model->unit_id=$request->unit_id;
       $model->code=$request->code;
       $model->description=$request->description;
       $model->status=$request->status;
       $model->save();


       return redirect()->back()->with('message','Product Added...!');
    }



    public function edit($id)
    {
        $units=ProductUnit::all();
        $data =Product::where('id', $id)->get();
        return view('admin.product.product_edit',compact(['data','units']));
    }


    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'unit_id'=>'required',
            'code'=>'numeric',
            'status'=>'required',
       ]);
       $id=$request->id;
       $model=Product::find($id);
       $model->name=$request->name;
       $model->unit_id=$request->unit_id;
       $model->code=$request->code;
       $model->description=$request->description;
       $model->status=$request->status;
       $model->update();


       return redirect()->back()->with('message','Product Updated...!');
    }

}
