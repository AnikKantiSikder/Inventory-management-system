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
                        <div class="panel panel-primary ">
                            <div class="panel-heading "><h3 class="panel-title text-white">
                                Edit category <span class="pull-right text-black" >Today: {{date("Y-m-d")}}</span></h3></div>
                            <div class="panel-body">

        

                                <form role="form" action="{{url('/update-category/'.$categoryData->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                             
                                    <div class="form-group">
                                        <label for="exampleInputAddress">Add category</label>
                                        <input type="text" class="form-control" name="category_name" value="{{$categoryData->cat_name}}">
                                    </div>

                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div>
                <!-- End row-->

            </div> <!-- container -->
                        
        </div> <!-- content -->
</div>



@endsection