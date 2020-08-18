@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 style="font-size:x-large;text-align:center;" class="pull-left page-title"><b>Point of sale</b></h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Anixit</a></li>
                                    <li class="active"><b>{{ date("d/m/y") }}</b></li>
                                </ol>
                            </div>
                        </div><br>
<!--For category------------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="portfolioFilter"><h4><b>Categories: </b></h4>
                                    @foreach($allCategories as $row)
                                    <a href="" data-filter="*" class="current">{{$row->cat_name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div><br>
<!--For category-------------------------------------------------------------------------------------->

<!--To add new customer and show all customer------------------------------------------------------------------------------->
        <div class="row">
            <div class="col-lg-6">




<!--Pricing card--------------------------------------------------------------------------------------------->
            <div class="price_card text-center">
                        
                        <ul class="price-features">
                            <table class="table table-bordered">
                                <thead class="bg-danger">
                                    <tr>
                                        <th class="text-white">Name</th>
                                        <th class="text-white">Quantity</th>
                                        <th class="text-white">Unit price</th>
                                        <th class="text-white">Sub total</th>
                                        <th class="text-white">Action</th>
                                    </tr>

                                </thead>

                                @php
                                    $cartContents= Cart::content();
                                    $total= 0;
                                @endphp
                                                   

                                <tbody>
                                    @foreach ($cartContents as $element)
                                    <tr>
                                        <th>{{ $element->name }}</th>
                                        <th>
                                            <form action="{{ url('/cart-update/'.$element->rowId) }}" method="post">
                                                @csrf
                                                <input type="number" name="qty" value="{{$element->qty}}" 
                                                style="width: 60px">
                                                    <button type="submit" class="btn btn-sm btn-success"
                                                    style="margin-top: -2px;"> <i class="md-check"></i>
                                                    </button>
                                            </form>
                                        </th>
                                        <th>{{ $element->price }}</th>
                                        {{-- <th>{{$element->price*$element->qty}}</th> --}}
                                        <th>{{$element->subtotal}}</th>

                                        <th>
                                            <a href="{{URL::to('/cart-remove/'.$element->rowId)}}">
                                                <i class="ion-trash-a text-danger" style="font-size:large;"></i>
                                            </a>
                                        </th>
                                    </tr>

                                    {{-- @php
                                        $total+= $element->subtotal;
                                    @endphp --}}
                                    @endforeach
                                </tbody>
                            </table>
                    
                        </ul>
                        <div class="pricing-footer bg-primary">
                            <p style="font-size:20px;">Quantity: {{Cart::count()}}</p>
                            <p style="font-size:20px;">Subtotal: {{Cart::subtotal()}}</p>
                            <p style="font-size:20px;">Vat: {{Cart::tax()}}</p>
                            <hr>
                            <p>
                                <h3 class="text-white">Total</h3>
                                <h3 class="text-white">{{Cart::total()}}</h3>
                            </p>
                        </div>

                        <form method="post" action="{{url('/create-invoice')}}">
                            @csrf
                            
                            <div class="panel">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>                                  
                                @endif



                                <h3 class="text-info">
                                    <b>Select customer</b>
                                    <a href="" class="btn btn-md btn-info pull-right waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal" >Add new</a>
                                </h3><br>

                            <select name="select_customer" class="form-control">
                                <option disabled selected>Select customer</option>
                                @foreach($allCustomers as $customer_row)
                                <option value="{{$customer_row->id}}">{{$customer_row->name}}</option>
                                @endforeach
                            </select>
                            </div>
                             <button type="submit" class="btn btn-success">Create invoice</button>
                        </form>
                       
                </div>
            </div>
 <!-- end Pricing card ----------------------------------------------------------------------------------------------------->





<!--All products---------------------------------------------------------------------------------------->
    <div class="col-lg-6">
            <h3>All products</h3><br><br>

                    <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Category name</th>
                                    <th>Product code</th>
                                    <th>Selling price</th>
                                    <th>Add</th>
                                    
                                </tr>
                            </thead>

                        @foreach($allProducts as $row)
                            <tbody>
                                <tr style="text-align: center;">

                                <form action="{{ url('/cart-add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Taking values--------------------------------------------------->
                                        <input type="hidden" name="id" value="{{$row->id}}">
                                        <input type="hidden" name="name" value="{{$row->product_name}}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="price" value="{{$row->selling_price}}">
                                        
                                        {{-- <input type="hidden" name="weight" value="550"> --}}
                                    <!-- Taking values--------------------------------------------------->
                                        <td>
                                            <img src="{{URL::to($row->product_image)}}" height="60" width="70">
                                        </td>
                                        <td>{{ $row->product_name }}</td>
                                        <td>{{ $row->cat_name }}</td>
                                        <td>{{ $row->product_code }}</td>
                                        <td>{{ $row->selling_price }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-warning" style="font-size:20px;">
                                            <i class="md-add-circle"></i>
                                            </button>
                                        </td>
                                    </form>

                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
<!--End all products----------------------------------------------------------------------------------------------------------------->
                        </div>

        </div>
    </div>
</div>



<!--Customer add modal-->



<form action="{{url('/insert-customer')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog"> 
                    <div class="modal-content bg-success"> 
                        <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">Add a new customer</h4> 
                        </div> 
                        <div class="modal-body"> 

                    <!--Row 1------------------------------------------------------------------------------------------------->
                            <div class="row"> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-4" class="control-label">Name</label> 
                                            <input type="text" class="form-control" id="field-4" name="name" required> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-5" class="control-label">Email</label> 
                                            <input type="email" class="form-control" id="field-5" name="email" required> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Phone</label> 
                                            <input type="text" class="form-control" id="field-6" name="phone" required> 
                                        </div> 
                                    </div>
                            </div>
                            <!--Row 2------------------------------------------------------------------------------------------>
                            <div class="row">
                                   <div class="col-md-4"> 
                                    <div class="form-group"> 
                                            <label for="field-6" class="control-label">NID</label> 
                                            <input type="text" class="form-control" id="field-6" name="nid_no" required> 
                                        </div> 
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">City</label> 
                                            <input type="text" class="form-control" id="field-6" name="city" required> 
                                        </div> 
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Address</label> 
                                            <input type="text" class="form-control" id="field-6" name="address" required> 
                                        </div> 
                                    </div>

                            </div>
                            <!--Row 3------------------------------------------------------------------------------------------->
                            <div class="row">
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Shop name</label> 
                                            <input type="text" class="form-control" id="field-6" name="shop_name" required> 
                                        </div> 
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Account number</label> 
                                            <input type="text" class="form-control" id="field-6" name="account_number" required> 
                                        </div> 
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Account holder</label> 
                                            <input type="text" class="form-control" id="field-6" name="account_holder" required> 
                                        </div> 
                                    </div>

                            </div>
                            <!--Row 4------------------------------------------------------------------------------------------->
                            <div class="row">
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Bank name</label> 
                                            <input type="text" class="form-control" id="field-6" name="bank_name" required> 
                                        </div> 
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Bank branch</label> 
                                            <input type="text" class="form-control" id="field-6" name="bank_branch" required> 
                                        </div> 
                                    </div>
                                    <div class="col-md-4"> 
                                        <div class="form-group">

                                        <label for="field-6" class="control-label">Photo</label> 
                                            <input type="file" name="photo" accept="image/*"
                                            class="upload" required onchange="readURL(this);">

                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <div class="form-group">
                                        <img id="image" src="#"/>
                                        <label for="exampleInputPhoto">Photo</label>
                                    </div>
                                </div>
                            </div>

                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                            <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
                        </div> 
                    </div> 
                </div>
    </div><!-- /.modal -->

</form>
<!--Customer add modal-->

<script type="text/javascript">

        function readURL(input){
            if(input.files && input.files[0]){
                var reader= new FileReader();
                reader.onload= function(e){
                    $('#image')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

@endsection