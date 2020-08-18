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
                                        <h3 class="panel-title">All attendence</h3>
                                    </div><br>
                                    <a href="{{route('take.attendence')}}" class="btn btn-warning pull-right">Take attendence</a><br><br>
                                    <div class="panel-body">
                                        <div class="row" >
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    $sl= 1;
                                                    ?>
                                                @foreach($allAttData as $row)
                                                    <tbody>
                                                        <tr style="text-align: center;">
                                                            <td>{{ $sl++ }}</td>
                                                            <td>{{ (str_replace("_","/","$row->edit_date"))}}</td>
                                                            <td>
                                                                <a href="{{ URL::to('/view-attendence/'.$row->edit_date) }}" class="btn btn-success">View</>
                                                                <a href="{{ URL::to('/edit-attendence/'.$row->edit_date) }}" class="btn btn-primary">Edit</>
                                                                
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

