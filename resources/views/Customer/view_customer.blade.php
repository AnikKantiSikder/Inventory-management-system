@extends('layouts.app')


@section('content')

<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="pull-left page-title">Details about Customer</h3>
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
                                <p>{{$singleCustomerData->email}}</p>
                                <label for="exampleInputEmail1">Phone :</label>
                                <p>{{$singleCustomerData->phone}}</p>
                                <label for="exampleInputEmail1">Address :</label>
                                <p>{{$singleCustomerData->address}}</p>
                                <label for="exampleInputEmail1">City :</label>
                                <p>{{$singleCustomerData->city}}</p>
                                <label for="exampleInputEmail1">Shop name :</label>
                                <p>{{$singleCustomerData->shop_name}}</p>
                            </div>

                            <!--Second part-->
                            <div class="col-md-4" style="text-align: center;">
                            <label for="exampleInputEmail1">Customer name</label>
                                <p>{{$singleCustomerData->name}}</p>
                                
                                <div>
                                <img src="{{ URL::to($singleCustomerData->photo) }}" height="190" width="250"/>
                                </div>
                            </div>

                            <!--Third part-->
                            <div class="col-md-4" style="border-style:solid; border-width:1px; text-align: center;">
                                <label for="exampleInputEmail1"> NID number :</label>
                                <p>{{$singleCustomerData->nid_no}}</p>
                                <label for="exampleInputEmail1">Account holder :</label>
                                <p>{{$singleCustomerData->account_holder}}</p>
                                <label for="exampleInputEmail1">Account number :</label>
                                <p>{{$singleCustomerData->account_number}}</p>
                                <label for="exampleInputEmail1">Bank name :</label>
                                <p>{{$singleCustomerData->bank_name}}</p>
                                <label for="exampleInputEmail1">Bank branch :</label>
                                <p>{{$singleCustomerData->bank_branch}}</p>
                            </div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
</div>



@endsection