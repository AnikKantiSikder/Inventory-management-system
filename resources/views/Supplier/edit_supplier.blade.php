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
                            <div class="panel-heading"><h3 class="panel-title">Edit supplier data</h3></div>
                            <div class="panel-body">

                                <form role="form" action="{{ url('/update-supplier/'.$allData->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" name="name"  value="{{ $allData->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email"  value="{{ $allData->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone"  value="{{ $allData->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputAddress">Address</label>
                                        <input type="text" class="form-control" name="address"  value="{{ $allData->address }}">
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="exampleInputAddress">Supplier type</label>
                                        <select name="type" class="form-control">
                                            
                                            <option value="{{ $allData->type }}">{{ $allData->type }}</option>
                                        </select>
                                    </div>

                             
                                    <div class="form-group">
                                        <label for="exampleInputAddress">Shop name</label>
                                        <input type="text" class="form-control" name="shop_name"  value="{{ $allData->shop_name }}">
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="exampleInputAddress"> Account holder </label>
                                        <input type="text" class="form-control" name="account_holder"  value="{{ $allData->account_holder }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputAddress"> Account number </label>
                                        <input type="text" class="form-control" name="account_number" value="{{ $allData->account_number }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputAddress"> Bank name </label>
                                        <input type="text" class="form-control" name="bank_name" value="{{ $allData->bank_name }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputVacation">Bank branch</label>
                                        <input type="text" class="form-control" name="branch_name" value="{{ $allData->branch_name }}">
                                    </div>



                                    <div class="form-group">
                                        <img id="image" src="#"/>
                                        <label for="exampleInputPhoto">Photo</label>
                                        <input type="file" name="photo" accept="image/*"
                                        class="upload" onchange="readURL(this);">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{URL::to($allData->photo)}}"  style="height: 60px; width:70px;">
                                        <input type="hidden" name="old_photo" value="{{$allData->photo}}">
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