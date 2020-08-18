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

                <?php $serial=1; ?>
                        <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All product</h3>
                                    </div><br>
                                    <a href="{{route('add.products')}}" class="btn btn-warning pull-right">Add product</a><br><br>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Product name</th>
                                                            <th>Product code</th>
                                                            <th>Product warehouse</th>
                                                            <th>Product route</th>
                                                            <th>Image</th>
                                                            <th>Selling price</th>
                                                            <th>Expire date</>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                @foreach($allProductData as $row)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$serial++}}</td>
                                                            <td>{{ $row->product_name }}</td>
                                                            <td>{{ $row->product_code }}</td>
                                                            <td>{{ $row->product_warhouse }}</td>
                                                            <td>{{ $row->product_route }}</td>
                                                            <td><img src="{{ $row->product_image }}" height="60" width="70"> </td>
                                                            <td>{{ $row->selling_price }}</td>
                                                            <td>{{ $row->expire_date }}</td>
                                                            
                                                            <td>
                                                                <a href="{{URL::to('/view-product/'.$row->id)}}" class="btn btn-info">View</a>
                                                                <a href="{{URL::to('/edit-product/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                                                <a href="{{URL::to('/delete-product/'.$row->id)}}" class="btn btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                @endforeach
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                </div>
                        <!-- End row-->

        </div> <!-- container -->
                               
    </div> <!-- content -->
</div>



@endsection

