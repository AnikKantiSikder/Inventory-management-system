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
                                    <div class="panel-heading"><h3 class="panel-title">Update company information</h3></div>
                                    <div class="panel-body">

                                        <form role="form" action="{{ url('/update-setting/'.$settingData->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="exampleInputName1">Company name</label>
                                                <input type="text" class="form-control" name="company_name" value="{{ $settingData->company_name}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company address</label>
                                                <input type="text" class="form-control" name="company_address" value="{{ $settingData->company_address }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company email</label>
                                                <input type="email" class="form-control" name="company_email" value="{{ $settingData->company_email }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company phone</label>
                                                <input type="text" class="form-control" name="company_phone"value="{{ $settingData->company_phone}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Company mobile</label>
                                                <input type="text" class="form-control" name="company_mobile" value="{{ $settingData->company_mobile }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Company city</label>
                                                <input type="text" class="form-control" name="company_city" value="{{ $settingData->company_city  }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Company country</label>
                                                <input type="text" class="form-control" name="company_country" value="{{ $settingData->company_country }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputSalary">Country zipcode</label>
                                                <input type="text" class="form-control" name="company_zipcode" value="{{ $settingData->company_zipcode }}" required>
                                            </div>


                                            <div class="form-group">
                                                <img id="image" src="#"/>
                                                <label for="exampleInputPhoto">New photo</label>
                                                <input type="file" name="company_logo" accept="image/*"
                                                class="upload" onchange="readURL(this);">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{URL::to($settingData->company_logo)}}" name="company_logo" style="height: 60px; width:70px;">
                                                <input type="hidden" name="old_photo" value="{{$settingData->company_logo}}">
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