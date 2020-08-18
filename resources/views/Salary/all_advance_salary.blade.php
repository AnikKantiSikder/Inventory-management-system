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
                                        <h3 class="panel-title">All advance salary</h3>
                                    </div><br>
                                    <a href="{{route('advance.salaries')}}" class="btn btn-warning pull-right">Provide advance salary</a><br><br>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Salary</th>
                                                            <th>Month</th>
                                                            <th>Advance salary</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                @foreach($showAllAdvanceSalaries as $row)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td><img src="{{ $row->photo }}" height="60" width="70"> </td>
                                                            <td>{{ $row->salary }}</td>
                                                            <td>{{ $row->month }}</td>
                                                            <td>{{ $row->advance_salary }}</td>
                                                            <td>
                                                                <a href="" class="btn btn-info">View</a>
                                                                <a href="" class="btn btn-primary">Edit</a>
                                                                <a href="" class="btn btn-danger">Delete</a>
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

