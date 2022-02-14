<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{

    public function index()
    {

        $data= ProductUnit::all();
        return view('admin.productUnit.unit_view',['datas'=>$data]);
    }

    public function create()
    {

        return view('admin.productUnit.unit_add');
    }


    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required',
            'status'=>'required',
       ]);
       $model= new ProductUnit();

       $model->name=$request->name;
       $model->status=$request->status;
       $model->save();


       return redirect()->back()->with('message','Product Unit Added...!');
    }



    public function edit($id)
    {
        $data =ProductUnit::where('id', $id)->get();
        return view('admin.productUnit.unit_edit',compact('data'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
       ]);
       $id=$request->id;
       $model=ProductUnit::find($id);
       $model->name=$request->name;
       $model->status=$request->status;
       $model->update();


       return redirect()->back()->with('message','Product Unit Updated...!');
    }


}
