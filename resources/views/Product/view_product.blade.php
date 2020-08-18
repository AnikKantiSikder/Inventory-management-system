@extends('layouts.app')

@section('content')


<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="pull-left page-title">Details of <b>Product</b></h3>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Anix</a></li>
                                    <li class="active">IT</li>
                                </ol>
                            </div>
                        </div>
                       <br><br><br><br>



                        <div class="row">
                            <!--First part-->
                            <div class="col-md-4" style="text-align:center; font-size: x-large;">
                    
                                <label for="exampleInputEmail1">Category :</label>
                                <p>{{$viewProductData->cat_name}}</p>
                                <label for="exampleInputEmail1">Supplier :</label>
                                <p>{{$viewProductData->name}}</p>
                                <label for="exampleInputEmail1">Product warehouse :</label>
                                <p>{{$viewProductData->product_warhouse}}</p>
                                <label for="exampleInputEmail1"> Product route :</label>
                                <p>{{$viewProductData->product_route}}</p>
                            </div>

                            <!--Second part-->
                            <div class="col-md-4" style="text-align: center; font-size: x-large;">
                                <p><b>{{$viewProductData->product_name}}</b></p>
                                <p>Product code: <b>{{$viewProductData->product_code}}</b></p>
                                
                                <div>
                                <img src="{{ URL::to($viewProductData->product_image) }}" height="400" width="400"/>
                                </div>
                            </div>

                            <!--Third part-->
                            <div class="col-md-4" style=" text-align: center; font-size:x-large">
                                <label for="exampleInputEmail1">Buying date :</label>
                                <p>{{$viewProductData->buy_date}}</p>
                                <label for="exampleInputEmail1">Expire date :</label>
                                <p>{{$viewProductData->expire_date}}</p>
                                <label for="exampleInputEmail1">Buying price :</label>
                                <p>{{$viewProductData->buying_price}}</p>
                                <label for="exampleInputEmail1">Selling price :</label>
                                <p>{{$viewProductData->selling_price}}</p>
                            </div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
</div>



@endsection