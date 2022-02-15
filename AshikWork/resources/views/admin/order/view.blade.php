@extends('admin.layout.main')




@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Receipt View
                <a class="btn btn-primary"href="{{route('order.index')}}">Back</a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Order </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
              <div class="col-xs-12">


                <div class="box">
                  <div class="box-header">

                    <button onclick="window.print()" class="btn btn-primary">Print</button>
                    <hr>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Order No.</th>
                                    <td>{{$datas[0]->order_no}}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{$datas[0]->date}}</td>
                                </tr>
                                <tr>
                                    <th>Receive Date</th>
                                    <td>Not Recieved</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">Supplier Info</th>

                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$datas[0]->supplier->name}}</td>
                                </tr>
                                <tr>
                                    <th>Company Name</th>
                                    <td>{{$datas[0]->supplier->c_name}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{$datas[0]->supplier->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$datas[0]->supplier->address}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>

                                </tr>
                                @if(isset($datas[0]->details))
                                @foreach($datas[0]->details as $detail)
                                <tr>
                                    <td>{{$detail->product->name}}</td>
                                    <td>{{$detail->quantity}}</td>
                                    <td>৳ {{$detail->unit_price}}</td>
                                    <td>৳ {{$detail->total_cost}}</td>
                                </tr>
                                @endforeach
                                @endif

                            </table>
                        </div>
                        <div class="col-md-offset-8 col-md-3">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Total Amount</th>
                                    <td>৳ {{$datas[0]->total}}</td>


                                </tr>
                            </table>
                        </div>
                    </div>


                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection

