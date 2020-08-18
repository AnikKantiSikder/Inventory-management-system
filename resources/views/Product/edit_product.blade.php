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
                        <div class="panel-heading"><h3 class="panel-title">Edit product</h3></div>
                        <div class="panel-body">
                        <a href="{{route('all.products')}}" class="btn btn-warning pull-right">All product</a><br><br>

                            <form role="form" action="{{ url('/update-product/'.$productData->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

<!--Product name--------------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputName1">Product name</label>
                                    <input type="text" class="form-control" name="product_name" value="{{$productData->product_name}}">
                                </div>
<!--Product code--------------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product code</label>
                                    <input type="text" class="form-control" name="product_code" value="{{$productData->product_code}}">
                                </div>
<!--Product category name form category table---------->
                                <div class="form-group">
                                    <label for="exampleInputAddress">Product category</label>
                                    @php
                                    $allCategory= DB::table('categories')->get();
                                    @endphp

                                    <select name="cat_id" class="form-control">
                
                                        @foreach($allCategory as $row)

                                        <option value="{{$row->id}}"
                                            <?php if($productData->cat_id==$row->id)
                                            {
                                                echo "selected";
                                            }
                                            ?>
                                        >
                                        {{$row->cat_name}}
                                        </option>
                                        
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

                                        @foreach($allSupplier as $row)

                                        <option value="{{$row->id}}"
                                            <?php if($productData->sup_id==$row->id)
                                            {
                                                echo "selected";
                                            } 
                                            ?> 

                                        >
                                        {{$row->name}}
                                        </option>

                                        @endforeach

                                    </select>
                                </div>
<!--Product warehouse name----------------------------->                               
                                <div class="form-group">
                                    <label for="exampleInputAddress">Warehouse</label>
                                    <input type="text" class="form-control" name="product_warhouse" value="{{$productData->product_warhouse}}">
                                </div>
<!--Product route name--------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputCity">Product route</label>
                                    <input type="text" class="form-control" name="product_route" value="{{$productData->product_route}}">
                                </div>
<!--Product buying date-------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputAddress">Buying date</label>
                                    <input type="date" class="form-control" name="buy_date" value="{{$productData->buy_date}}">
                                </div>

  <!--Product expire date------------------------------>                              
                                <div class="form-group">
                                    <label for="exampleInputAddress"> Expire date </label>
                                    <input type="date" class="form-control" name="expire_date" value="{{$productData->expire_date}}">
                                </div>
<!--Product buying price------------------------------->
                                <div class="form-group">
                                    <label for="exampleInputAddress"> Buying price </label>
                                    <input type="text" class="form-control" name="buying_price" value="{{$productData->buying_price}}">
                                </div>
<!--Product selling price------------------------------>
                                <div class="form-group">
                                    <label for="exampleInputAddress"> Selling price </label>
                                    <input type="text" class="form-control" name="selling_price" value="{{$productData->selling_price}}">
                                </div>
<!--Product image-------------------------------------->
                                <div class="form-group">
                                    <img id="image" src="#"/>
                                    <label for="exampleInputPhoto">Product photo</label>
                                    <input type="file" name="product_image" accept="image/*"
                                    class="upload" onchange="readURL(this);">
                                </div>
                                <div class="form-group">
                                    <img src="{{URL::to($productData->product_image)}}"  style="height: 60px; width:70px;">
                                    <input type="hidden" name="old_photo" value="{{$productData->product_image}}">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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