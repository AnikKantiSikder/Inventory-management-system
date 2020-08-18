@extends('layouts.app')

@section('content')


<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="pull-left page-title">Details about MR. <b>{{$singleData->name}}</b></h3>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Anix</a></li>
                                    <li class="active">IT</li>
                                </ol>
                            </div>
                        </div>
                       <br><br><br><br>



                        <div class="row">
                            <!--First part-->
                            <div class="col-md-4" style="border-style: solid; border-width:1px; text-align:center;">
                                <label for="exampleInputEmail1">Email :</label>
                                <p>{{$singleData->email}}</p>
                                <label for="exampleInputEmail1">Phone :</label>
                                <p>{{$singleData->phone}}</p>
                                <label for="exampleInputEmail1">Address :</label>
                                <p>{{$singleData->address}}</p>
                                <label for="exampleInputEmail1">Experience :</label>
                                <p>{{$singleData->experience}}</p>
                            </div>

                            <!--Second part-->
                            <div class="col-md-4" style="text-align: center;">
                                <p><b>{{$singleData->name}}</b></p>
                                
                                <div>
                                <img src="{{ URL::to($singleData->photo) }}" height="190" width="250"/>
                                </div>
                            </div>

                            <!--Third part-->
                            <div class="col-md-4" style="border-style:solid; border-width:1px; text-align: center;">
                            <label for="exampleInputEmail1">National id :</label>
                                <p>{{$singleData->nid_no}}</p>
                                <label for="exampleInputEmail1">Salary :</label>
                                <p>{{$singleData->salary}}</p>
                                <label for="exampleInputEmail1">Vacation :</label>
                                <p>{{$singleData->vacation}}</p>
                                <label for="exampleInputEmail1">City :</label>
                                <p>{{$singleData->city}}</p>
                            </div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
</div>



@endsection