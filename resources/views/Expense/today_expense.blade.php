@extends('layouts.app')

@section('content')

<div class="content-page">
                <!-- Start content -->
    <div class="content">
        <div class="container">
                @php
                    $date= date("d/m/y");
                    $totalTodayExpense= DB::table('expenses')->where('date', $date)->sum('amount');
                @endphp


                        <!-- Start form -->
                <div class="row" ">


                        <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Today's expense
                                            <span class="pull-right" >Total: {{$totalTodayExpense}} taka</span>
                                        </h3>
                                    </div><br>
                                    <a href="{{route('add.expense')}}" class="btn btn-warning pull-right">Add expense</a><br><br>
                                    <div class="panel-body">
                                        <div class="row" >
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                            <th>Amount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    @foreach($todayExpenseData as $row)
                                                    <tbody>
                                                        <tr style="text-align: center;">
                                                            <td>{{ $row->details }}</td>
                                                            <td>{{ $row->amount }}</td>
                                                            <td>
                                                                <a href="{{URL::to('/edit-today-expense/'.$row->id)}}" class="btn btn-primary">Edit</>
                                                               
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

