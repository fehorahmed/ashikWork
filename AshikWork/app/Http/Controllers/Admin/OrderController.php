<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {

         $datas= Order::all();
        //,['datas'=>$data,'units'=>$units]
        return view('admin.order.order_view',compact(['datas']));
    }
    public function create()
    {
        $supplier=Supplier::all();
        $product= Product::all();
        return view('admin.order.order_add',compact(['supplier', 'product']));
    }
    public function store(Request $request) {


        $validated = $request->validate([
            'supplier_id'=>'required',
            'date'=>'required',
            'order_no'=>'required|unique:orders',
            'product_id'=>'required',
            'product_id.*'=>'required',
            'quantity.*'=>'required',
            'unit_price.*'=>'required',
        ]);

        $model = new Order();
        $model->supplier_id=$request->supplier_id;
        $model->order_no=$request->order_no;
        $model->date=$request->date;
        $model->total=0;
        $model->save();

        $full_total = 0;
        foreach ($request->product_id as $key=>$pid){
            $d_model = new OrderDetails();
            $d_model->product_id=$pid;
            $d_model->quantity=$request->quantity[$key];
            $d_model->unit_price=$request->unit_price[$key];
            $d_model->total_cost=$request->quantity[$key] * $request->unit_price[$key];
            $d_model->order_id= $model->id;

            $total=$request->quantity[$key] * $request->unit_price[$key];


            $full_total += $total;

            $d_model->save();
        }
        $model->total=$full_total;
        $model->update();



       return redirect()->route('order.index')->with('message','Order Added..!');

    }

    function view($id){
        $datas= Order::where('id', $id)->get();

        return view('admin.order.view',compact('datas'));
    }
}
