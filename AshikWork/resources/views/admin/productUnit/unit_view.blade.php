@extends('admin.layout.main')




@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Product Unit
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Product Unit</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
              <div class="col-xs-12">


                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Unit info</h3>
                    <a class="btn btn-primary pull-right" href="{{route('product_unit.create')}}">Add Unit</a>
                  </div><!-- /.box-header -->
                         @if(Session::has('message'))
                            <p class="alert alert-success">{{session('message')}}</p>
                        @endif
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>

                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>

                        @if(!empty($datas))
                        @foreach($datas as $data)
                        <tr>

                          <td>{{$data->name}}</td>
                          <td><p class="btn btn-{{$data->status==1?"success":"danger"}} btn-xs">{{$data->status==1?"Active":"Inactive"}}</p></td>
                          <td>
                              <a class="btn btn-info"href="{{route('product_unit.edit',['id'=>$data->id])}}">Edit</a>
                          </td>

                        </tr>
                        @endforeach
                      @endif



                      </tbody>
                      <tfoot>
                        <tr>

                            <th>Name</th>
                            <th>Status</th>
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
