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
                                    <div class="panel-heading"><h3 class="panel-title">Add new employee</h3></div>
                                    <div class="panel-body">
                                    <a href="{{route('all.employee')}}" class="btn btn-warning pull-right">All employee</a><br><br>

                                        <form role="form" action="{{ url('/insert-employee') }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="exampleInputName1">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter fullname" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Enter phone number" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Enter your address" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Experience</label>
                                                <input type="text" class="form-control" name="experience" placeholder="Your experiences" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputAddress">Nid number</label>
                                                <input type="text" class="form-control" name="nid_no" placeholder="Enter your NID number">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputSalary">Salary</label>
                                                <input type="text" class="form-control" name="salary" placeholder="Salary" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputVacation">Vacation</label>
                                                <input type="text" class="form-control" name="vacation" placeholder="Vacation" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputCity">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" required>
                                            </div>

                                            <div class="form-group">
                                                <img id="image" src="#"/>
                                                <label for="exampleInputPhoto">Photo</label>
                                                <input type="file" name="photo" accept="image/*"
                                                class="upload" required onchange="readURL(this);">
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