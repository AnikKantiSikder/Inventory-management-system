@extends('layouts.app')

@section('content')

<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Anix</a></li>
                            <li class="active">IT</li>
                        </ol>
                    </div>
                </div>

            <!-- Start form -->
            <div class="row">
                <div class="col-md-2"></div> 
                <!-- Basic example -->
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Add new product</h3></div>
                        <div class="panel-body">
                        <a href="{{route('all.products')}}" class="btn btn-warning pull-right">All product</a><br><br>

                            <form role="form" action="{{ url('/insert-product') }}" method="post" enctype="multipart/form-data">
                                @csrf

<!--Product name--------------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputName1">Product name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter product name" required>
                                </div>
<!--Product code--------------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product code</label>
                                    <input type="text" class="form-control" name="product_code" placeholder="Enter product code" required>
                                </div>
<!--Product category name form category table---------->
                                <div class="form-group">
                                    <label for="exampleInputAddress">Product category</label>
                                    @php
                                    $allCategory= DB::table('categories')->get();
                                    @endphp

                                    <select name="cat_id" class="form-control">
                                        <option disabled selected></option>
                                        @foreach($allCategory as $row)
                                        <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
<!--Product supplier name form supplier table---------->
                                <div class="form-group">
                                    <label for="exampleInputAddress">Product supplier</label>
                                    @php
                                    $allSupplier= DB::table('suppliers')->get();
                                    @endphp

                                    <select name="sup_id" class="form-control">
                                        <option disabled selected></option>
                                        @foreach($allSupplier as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
<!--Product warehouse name----------------------------->                               
                                <div class="form-group">
                                    <label for="exampleInputAddress">Warehouse</label>
                                    <input type="text" class="form-control" name="product_warhouse" placeholder="Enter product warehouse">
                                </div>
<!--Product route name--------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputCity">Product route</label>
                                    <input type="text" class="form-control" name="product_route" placeholder="Enter product route" required>
                                </div>
<!--Product buying date-------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputAddress">Buying date</label>
                                    <input type="date" class="form-control" name="buy_date" placeholder="Product buying date" required>
                                </div>

  <!--Product expire date------------------------------>                              
                                <div class="form-group">
                                    <label for="exampleInputAddress"> Expire date </label>
                                    <input type="date" class="form-control" name="expire_date" placeholder="Produce expire date">
                                </div>
<!--Product buying price------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputAddress"> Buying price </label>
                                    <input type="text" class="form-control" name="buying_price" placeholder="Product buying price">
                                </div>
<!--Product selling price------------------------------>
                                <div class="form-group">
                                    <label for="exampleInputAddress"> Selling price </label>
                                    <input type="text" class="form-control" name="selling_price" placeholder="Product selling price">
                                </div>
<!--Product image-------------------------------------->
                                <div class="form-group">
                                    <img id="image" src="#"/>
                                    <label for="exampleInputPhoto">Product photo</label>
                                    <input type="file" name="product_image" accept="image/*"
                                    class="upload" onchange="readURL(this);">
                                </div>


                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div>
            <!-- End row-->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
</div>

<script type="text/javascript">

        function readURL(input){
            if(input.files && input.files[0]){
                var reader= new FileReader();
                reader.onload= function(e){
                    $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

</script>


@endsection