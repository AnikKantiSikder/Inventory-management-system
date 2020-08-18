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
                    <div class="col-md-2"></div> 
                    <!-- Basic example -->
                    <div class="col-md-8">
                        <div class="panel panel-primary ">
                            <div class="panel-heading "><h3 class="panel-title text-white">Provide advanced salary</h3></div>
                            <div class="panel-body">
                            <a href="{{route('all.advancesalaries')}}" class="btn btn-warning pull-right">Already provided advance salaries</a><br><br>
                                <form role="form" action="{{url('/insert-advancesalary')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                                          
                                    <div class="form-group">
                                        <label for="exampleInputAddress">Employee</label>
                                        @php
                                        $employeeData= DB::table('employees')->get();
                                        @endphp

                                        <select name="emp_id" class="form-control">
                                        <option disabled selected></option>
                                        @foreach($employeeData as $row)
                                              <option value="{{$row->id }}">{{$row->name}}</option>
                                        @endforeach
                                          
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputAddress">Month</label>
                                        <select name="month" class="form-control">
                                            <option disabled selected></option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                             
                                    <div class="form-group">
                                        <label for="exampleInputAddress">Advance salary</label>
                                        <input type="text" class="form-control" name="advance_salary" placeholder="Amount" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputYear">Year</label>
                                        <input type="text" class="form-control" name="year" placeholder="Year" required>
                                    </div>


                                    <button type="submit" class="btn btn-success waves-effect waves-light pull-right">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div>
                <!-- End row-->

            </div> <!-- container -->
                        
        </div> <!-- content -->
</div>



@endsection