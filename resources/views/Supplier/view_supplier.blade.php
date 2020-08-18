@extends('layouts.app')


@section('content')

<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="pull-left page-title">Details about {{$singleSupplierData->name}}</h3>
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
                                <p>{{$singleSupplierData->email}}</p>
                                <label for="exampleInputEmail1">Phone :</label>
                                <p>{{$singleSupplierData->phone}}</p>
                                <label for="exampleInputEmail1">Address :</label>
                                <p>{{$singleSupplierData->address}}</p>
                                <label for="exampleInputEmail1">Shop name :</label>
                                <p>{{$singleSupplierData->shop_name}}</p>
                            </div>

                            <!--Second part-->
                            <div class="col-md-4" style="text-align: center;">
                                <label for="exampleInputEmail1">Type :</label>
                                <p>{{$singleSupplierData->type}}</p>
                                
                                <div>
                                <img src="{{ URL::to($singleSupplierData->photo) }}" height="170" width="230"/>
                                </div>
                            </div>

                            <!--Third part-->
                            <div class="col-md-4" style="border-style:solid; border-width:1px; text-align: center;">
                                <label for="exampleInputEmail1">Account holder :</label>
                                <p>{{$singleSupplierData->account_holder}}</p>
                                <label for="exampleInputEmail1">Account number :</label>
                                <p>{{$singleSupplierData->account_number}}</p>
                                <label for="exampleInputEmail1">Bank name :</label>
                                <p>{{$singleSupplierData->bank_name}}</p>
                                <label for="exampleInputEmail1">Bank branch :</label>
                                <p>{{$singleSupplierData->branch_name}}</p>
                            </div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
</div>



@endsection