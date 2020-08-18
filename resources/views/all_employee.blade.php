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
                                        <h3 class="panel-title">All employees</h3>
                                    </div><br>
                                    <a href="{{route('add.employee')}}" class="btn btn-warning pull-right">Add employee</a><br><br>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Image</th>
                                                            <th>Salary</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                @foreach($ShowEmployees as $row)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->phone }}</td>
                                                            <td>{{ $row->address }}</td>
                                                            <td><img src="{{ $row->photo }}" height="60" width="70"> </td>
                                                            <td>{{ $row->salary }}</td>
                                                            <td>
                                                                <a href="{{URL::to('view-employee/'.$row->id)}}" class="btn btn-info ">View</a>
                                                                <a href="{{URL::to('edit-employee/'.$row->id)}}" class="btn btn-primary ">Edit</a>
                                                                <a href="{{URL::to('delete-employee/'.$row->id)}}" class="btn btn-danger">Delete</a>
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

