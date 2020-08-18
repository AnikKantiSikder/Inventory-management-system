@extends('layouts.app')

@section('content')

<div class="content-page">
                <!-- Start content -->
    <div class="content">
        <div class="container">



                        <!-- Start form -->
                <div class="row" ">

                        <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All category</h3>
                                    </div><br>
                                    <a href="{{route('add.categories')}}" class="btn btn-warning pull-right">Add category</a><br><br>
                                    <div class="panel-body">
                                        <div class="row" >
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Category name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                @foreach($allCategory as $row)
                                                    <tbody>
                                                        <tr style="text-align: center;">
                                                            <td>{{ $row->id }}</td>
                                                            <td>{{ $row->cat_name }}</td>
                                                            <td>
                                                                <a href="{{URL::to('/edit-category/'.$row->id)}}" class="btn btn-primary">Edit</>
                                                                <a href="{{URL::to('/delete-category/'.$row->id)}}" class="btn btn-danger">Delete</a>
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

