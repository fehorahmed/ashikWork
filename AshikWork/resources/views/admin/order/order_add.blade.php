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
                                                    @foreach($supplier as $sup)
                                                    <option {{old('supplier_id')==$sup->id?"selected":''}} value="{{$sup->id}}">{{$sup->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        @error('supplier_id')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date">Date *</label>
                                            <input type="date" name="date"  value="{{ old('date') }}"
                                                class="form-control" id="date">
                                        </div>
                                        @error('date')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_no">Order No</label>
                                            <input type="number" name="order_no"  value="{{ old('order_no') }}"
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

                                    @if (old('product_id') != null && sizeof(old('product_id')) > 0)
                                        @foreach(old('product_id') as $item)

                                            <tr id="inputFormRow" class="product-item">
                                                <td>
                                                    <div class="form-group {{ $errors->has('product_id.'.$loop->index) ? 'has-error' :'' }}">
                                                        <select class="form-control select2 product_id" style="width: 100%;" name="product_id[]" data-placeholder="Select Product" >
                                                            <option value="">Select Product</option>

                                                            {{-- @if (old('product_id.'.$loop->index) != '')
                                                                <option value="{{ old('product_id.'.$loop->index) }}" selected>{{ old('product-name.'.$loop->index) }}</option>
                                                            @endif --}}

                                                            @foreach($product as $pro)
                                                            <option value="{{$pro->id}}" {{$item==$pro->id?"selected":""}}>{{$pro->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        {{-- <input type="hidden" name="product-name[]" class="product-name" value="{{ old('product-name.'.$loop->index) }}"> --}}
                                                    </div>
                                                </td>

                                                <div class="text-control field_wrapper">
                                                    <td>
                                                        <div class="form-group {{ $errors->has('quantity.'.$loop->index) ? 'has-error' :'' }}">
                                                            <input type="number" id="quantity" onchange="total()" step="any" class="form-control quantity" name="quantity[]" value="{{ old('quantity.'.$loop->index) }}">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group {{ $errors->has('unit_price.'.$loop->index) ? 'has-error' :'' }}">
                                                            <input type="number" id="unit_price" onchange="total()" class="form-control unit_price" name="unit_price[]" value="{{ old('unit_price.'.$loop->index) }}">
                                                        </div>
                                                    </td>

                                                    <td><input type="number" readonly  name="total_cost[]" value="{{ old('total_cost.'.$loop->index) }}"
                                                        class="form-control" id="total_cost">
                                                  </td>
                                                    <td class="text-center">

                                                        <a id="removeRow" role="button" class="btn btn-danger btn-sm btn-remove">X</a>

                                                    </td>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr id="inputFormRow">
                                            <td>
                                                <select class="form-control" name="product_id[]" id="product_id">
                                                    <option value="">select one</option>
                                                    @foreach($product as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->name}}</option>
                                                    @endforeach

                                                </select>

                                            </td>
                                            <td><input type="number" onchange="total()" name="quantity[]"
                                                class="form-control" id="quantity" placeholder="Enter quantity .">
                                           </td>
                                            <td><input type="number" onchange="total()"  name="unit_price[]"
                                                class="form-control" id="unit_price" placeholder="Enter Price .">
                                           </td>
                                            <td><input type="number"  name="total_cost[]"
                                                 class="form-control" id="total_cost">
                                           </td>
                                            <td></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><p id="addRow" class="btn btn-info">Add more</p></th>
                                            <th></th>
                                            <th>Total Amount</th>
                                            <th id="full_total"></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>



                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
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
        html += ' <select class="form-control" name="product_id[]" id="product_id"><option value="">select one</option> @foreach($product as $pro) <option value="{{$pro->id}}">{{$pro->name}}</option>@endforeach </select> @error('product_id') <p class="alert alert-danger">{{ $message }}</p>@enderror </td>>';
        html += '<td><input type="number" onchange="total()"  name="quantity[]" class="form-control" id="quantity" placeholder="Enter quantity .">@error("quantity")<p class="alert alert-danger">{{ $message }}</p>@enderror</td>';
        html += '<td><input type="number"  onchange="total()"  name="unit_price[]"  class="form-control" id="unit_price" placeholder="Enter Price .">@error('unit_price')<p class="alert alert-danger">{{ $message }}</p>@enderror</td>';
        html += '<td><input type="number" readonly name="total_cost[]" class="form-control" id="total_cost"></td>';
        html += ' <td class="text-center"><a id="removeRow" role="button" class="btn btn-danger btn-sm btn-remove">X</a></td></tr>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });


    function total(){

        var quantity= document.getElementsByName('quantity[]');
        var price= document.getElementsByName('unit_price[]');
        var tt= document.getElementsByName('total_cost[]');
        var full_total=0;
        for(var i=0; i<quantity.length; i++) {
            var total= quantity[i].value*price[i].value;
            tt[i].value = total;
            full_total+=total;
        }
        document.getElementById('full_total').innerHTML= "৳ "+full_total;
       // console.log(quantity.length);


            // var quantity= document.getElementById("quantity").value;
            // var price= document.getElementById("unit_price").value;
            // var total= quantity*price;
            // document.getElementById("total_cost").value = total;
           // console.log(total);

    }
    $( document ).ready(function() {
        var quantity= document.getElementsByName('quantity[]');
        var price= document.getElementsByName('unit_price[]');
        var tt= document.getElementsByName('total_cost[]');
        var full_total=0;
        for(var i=0; i<quantity.length; i++) {
            var total= quantity[i].value*price[i].value;
            tt[i].value = total;
            full_total+=total;
        }
        document.getElementById('full_total').innerHTML= "৳ "+full_total;
});




</script>

@endsection
