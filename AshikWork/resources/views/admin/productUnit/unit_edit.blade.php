@extends('admin.layout.main')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Product Unit Edit
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Quick Example</h3>
                            <a class="btn btn-primary pull-right" href="{{route('product_unit.index')}}">Back</a>
                        </div><!-- /.box-header -->
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{session('message')}}</p>
                        @endif
                        <!-- form start -->
                        <form action="{{route('product_unit.update')}}" method="POST" role="form">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" required value="{{old('name',$data[0]->name)}}" class="form-control" id="name"
                                        placeholder="Enter name">
                                </div>
                                @error('name')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror
                                <div class="radio">

                                   <b>Status *</b>
                                    <label><input type="radio" name="status" {{$data[0]->status==1? "checked":""}}  value="1"> Active </label>&nbsp;&nbsp;
                                    <label><input type="radio" name="status" {{$data[0]->status==0? "checked":""}} value="0"> Inactive</label>
                                </div>
                                @error('status')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                               <input type="hidden" name="id" value="{{$data[0]->id}}">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

            </div> <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
