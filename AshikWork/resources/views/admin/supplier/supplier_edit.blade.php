@extends('admin.layout.main')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Supplier Edit
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Supplier</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            <a class="btn btn-primary" href="{{route('supplier.index')}}">Back</a>
                        </div><!-- /.box-header -->
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{session('message')}}</p>
                        @endif
                        <!-- form start -->
                        <form action="{{route('supplier.update')}}" method="POST" role="form">
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


                                <div class="form-group">
                                    <label for="c_name">Company Name *</label>
                                    <input type="text" name="c_name" required value="{{old('c_name',$data[0]->c_name)}}" class="form-control" id="c_name"
                                        placeholder="Enter company name.">
                                </div>
                                @error('c_name')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="c_name">Phone No. *</label>
                                    <input type="text" name="phone" required value="{{old('phone',$data[0]->phone)}}" class="form-control" id="phone"
                                        placeholder="Enter phone no.">
                                </div>
                                @error('phone')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="address">Address *</label>
                                    <input type="text" name="address" required value="{{old('address',$data[0]->address)}}" class="form-control" id="address"
                                        placeholder="Enter address.">
                                </div>
                                @error('address')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="due">Opening Due *</label>
                                    <input type="number" name="due" required value="{{old('due',$data[0]->due)}}" class="form-control" id="due"
                                        placeholder="Enter Opening Due.">
                                </div>
                                @error('due')
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
