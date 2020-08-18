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
                        <h3 class="panel-title">Take attendence
                            <span class="pull-right" style="font-size:x-large;">Date: {{date("d/m/y")}}</span>
                        </h3>
                    </div><br>
                    <a href="{{route('all.attendence')}}" class="btn btn-warning pull-right">All attendence</a><br><br>
                    <div class="panel-body">
                        <div class="row" style="text-align: center;">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                <form role="form" action="{{ url('/insert-attendence') }}" method="post">
                                    @csrf
                                @foreach($allEmployee as $row)
                                    <tbody>
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td><img src="{{ $row->photo }}" height="60" width="70"> </td>

                                            <input type="hidden" name="user_id[]" value="{{$row->id}}">
                                            <td>
                                                <input type="radio" name="attendence[{{$row->id}}]" value="Present" required>Present
                                                <input type="radio" name="attendence[{{$row->id}}]" value="Absent">Absent
                                            </td>
                                            <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
                                            <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                            <input type="hidden" name="month" value="{{ date('F') }}">
                                        </tr>
                                    </tbody>
                                @endforeach



                                </table>
                                <button type="submit" class="btn btn-success" >Take attendence</button>
                                </form> 

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

