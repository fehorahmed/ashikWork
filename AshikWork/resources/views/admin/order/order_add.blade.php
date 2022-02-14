@extends('admin.layout.main')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Product Add
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Product</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            <a class="btn btn-primary" href="{{route('product.index')}}">Back</a>
                        </div><!-- /.box-header -->
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{session('message')}}</p>
                        @endif
                        <!-- form start -->
                        <form action="{{route('product.store')}}" method="POST" role="form">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" required value="{{old('name')}}" class="form-control" id="name"
                                        placeholder="Enter name">
                                </div>
                                @error('name')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="unit_id">Unit</label>
                                    <select name="unit_id" class="form-control" id="unit_id">
                                        <option value="">Select one</option>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('unit_id')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" name="code" value="{{old('code')}}" class="form-control" id="code"
                                        placeholder="Enter code .">
                                </div>
                                @error('code')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror


                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="{{old('description')}}" class="form-control" id="description"
                                        placeholder="Enter description.">
                                </div>
                                @error('description')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror

                                <div class="radio">

                                   <b>Status *</b>
                                    <label><input type="radio" name="status"  value="1"> Active </label>&nbsp;&nbsp;
                                    <label><input type="radio" name="status"  value="0"> Inactive</label>
                                </div>
                                @error('status')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
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
