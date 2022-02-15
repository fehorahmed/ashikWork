@extends('admin.layout.main')




@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order View
                <small>Control panel</small>
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

                    <a class="btn btn-primary" href="{{route('order.create')}}">Add Order</a>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>

                          <th>Name</th>
                          <th>Company Name</th>
                          <th>Order No</th>
                          <th>Date</th>
                          <th>Total Price</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>

                        @if(!empty($datas))
                        @foreach($datas as $data)
                        <tr>

                          <td>{{$data->supplier->name}}</td>
                          <td>
                            {{$data->supplier->c_name}}
                            </td>
                          <td>{{$data->order_no}}</td>
                          <td>{{$data->date}}</td>
                          <td>{{$data->total}}</td>
                          <td>
                              <a class="btn btn-info"href="{{route('order.view',['id'=>$data->id])}}">View</a>
                              {{-- <a class="btn btn-info"href="{{route('order.edit',['id'=>$data->id])}}">Edit</a> --}}
                          </td>

                        </tr>
                        @endforeach
                      @endif



                      </tbody>
                      <tfoot>
                        <tr>

                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Order No</th>
                            <th>Date</th>
                            <th>Total Price</th>
                            <th>Action</th>

                        </tr>
                      </tfoot>
                    </table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
@section('script')

<script src="{{asset('admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('admin')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
@endsection
