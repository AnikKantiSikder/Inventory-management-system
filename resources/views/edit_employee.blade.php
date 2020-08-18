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
                                    <div class="panel-heading"><h3 class="panel-title">Update employee information</h3></div>
                                    <div class="panel-body">

                                        <form role="form" action="{{ url('/update-employee/'.$allData->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="exampleInputName1">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $allData->name }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" value="{{ $allData->email }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" name="phone"value="{{ $allData->phone }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ $allData->address }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Experience</label>
                                                <input type="text" class="form-control" name="experience" value="{{ $allData->experience }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Nid number</label>
                                                <input type="text" class="form-control" name="nid_no" value="{{ $allData->nid_no }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputSalary">Salary</label>
                                                <input type="text" class="form-control" name="salary" value="{{ $allData->salary }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputVacation">Vacation</label>
                                                <input type="text" class="form-control" name="vacation" value="{{ $allData->vacation }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputCity">City</label>
                                                <input type="text" class="form-control" name="city" value="{{ $allData->city }}" required>
                                            </div>

                                            <div class="form-group">
                                                <img id="image" src="#"/>
                                                <label for="exampleInputPhoto">New photo</label>
                                                <input type="file" name="photo" accept="image/*"
                                                class="upload" onchange="readURL(this);">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{URL::to($allData->photo)}}" name="old_photo" style="height: 60px; width:70px;">
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