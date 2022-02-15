@extends('admin.layout.main')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Add
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Order</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            <a class="btn btn-primary" href="{{ route('order.index') }}">Back</a>
                        </div><!-- /.box-header -->
                        @if (Session::has('message'))
                            <p class="alert alert-success">{{ session('message') }}</p>
                        @endif
                        <!-- form start -->
                        <form action="{{ route('order.store') }}" method="POST" role="form">
                            @csrf

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier *</label>
                                            <select class="form-control" name="supplier_id" id="supplier_id">
                                                <option value="">select one</option>
                                                <option value="">one</option>
                                                <option value="">two</option>
                                                <option value="">three</option>
                                            </select>
                                        </div>
                                        @error('name')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date">Date *</label>
                                            <input type="date" name="date" required value="{{ old('date') }}"
                                                class="form-control" id="date">
                                        </div>
                                        @error('date')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_no">Order No</label>
                                            <input type="number" name="order_no" required value="{{ old('order_no') }}"
                                                class="form-control" id="order_no" placeholder="Enter order no.">
                                        </div>
                                        @error('order_no')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Cost</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="newRow">
                                        <tr id="inputFormRow">
                                            <td>
                                                <select class="form-control" name="product_id" id="product_id">
                                                    <option value="">select one</option>
                                                    <option value="">one</option>
                                                    <option value="">two</option>
                                                    <option value="">three</option>
                                                </select>
                                                @error('product_id')
                                                    <p class="alert alert-danger">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input type="number" name="quantity" value="{{ old('quantity') }}"
                                                class="form-control" id="quantity" placeholder="Enter quantity .">
                                            @error('quantity')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror</td>
                                            <td><input type="number" name="unit_price" value="{{ old('unit_price') }}"
                                                class="form-control" id="unit_price" placeholder="Enter Price .">
                                            @error('unit_price')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror</td>
                                            <td><input type="total_cost" readonly name="total_cost"
                                                value="{{ old('total_cost') }}" class="form-control" id="total_cost">
                                            @error('total_cost')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror</td>
                                            <td><p id="removeRow" class="btn btn-success">x</p></td>
                                        </tr>

                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th><button id="addRow" class="btn btn-info">Add more</button></th>
                                            <th></th>
                                            <th>Total Amount</th>

                                            <th>100.00</th>
                                            <th></th>
                                        </tr>
                                    </tfooter>
                                </table>



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
@section('script')

<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<tr id="inputFormRow"> <td>';
        html += '<select class="form-control" name="product_id" id="product_id">';
        html += '<option value="">select one</option><option value="">one</option><option value="">two</option><option value="">three</option></select>';
        html += '@error("product_id")<p class="alert alert-danger">{{ $message }}</p>@enderror  </td>';
        html += '<td><input type="number" name="quantity" value="{{ old('quantity') }}"class="form-control" id="quantity" placeholder="Enter quantity .">@error("quantity")<p class="alert alert-danger">{{ $message }}</p>@enderror</td>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>

@endsection
