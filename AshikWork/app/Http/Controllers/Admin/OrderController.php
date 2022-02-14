<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // $units=ProductUnit::all();
        // $data= Product::all();
        //,['datas'=>$data,'units'=>$units]
        return view('admin.order.order_view');
    }
}
