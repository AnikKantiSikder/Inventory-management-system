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

                        <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Salary pay <span class="pull-right text-white" >{{date("F Y")}}</span></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered" style="text-align: center;">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Salary</th>
                                                            <th>Month</th>
                                                            <th>Advanced</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                
                                                    <tbody>
                                                        @foreach($employee_data as $row)
                                                        <tr>
                                                            <td><b>{{$row->name}}</b></td>
                                                            <td><img src="{{URL::to($row->photo)}}" height="60" width="70"></td>
                                                            <td><b>{{$row->salary}}</b></td>
                                                            <td><span class="badge badge-success">{{date("F", strtotime('-1 months'))}}</span></td>
                                                            <td></td>
                                                            <td>
                                                                <a href="" class="btn btn-warning ">Pay now</a>
                                                               
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                       
                                                    </tbody>
                                              
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

