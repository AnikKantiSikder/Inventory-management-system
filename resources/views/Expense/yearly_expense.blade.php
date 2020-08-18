@extends('layouts.app')

@section('content')

<div class="content-page">
                <!-- Start content -->
    <div class="content">
        <div class="container">
                            <!-- Page-Title -->

     
          <!-- Start form -->
                <div class="row" ">


                <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"> Yearly expense from- {{date('Y')}}</h3>
                            </div><br>
                            
                            <div class="panel-body">
                                <div class="row" >
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Details</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>

                                        @foreach($allData as $row)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $row->details }}</td>
                                                    <td>{{ $row->amount }}  taka</td>
                                                </tr>
                                                
                                            </tbody>
                                        @endforeach

                                        </table>

                                    @php
                                    $year= date("Y");

                                    $totalYearlyExppense= DB::table('expenses')->where('year', $year)->sum('amount');
                                    @endphp
                                    <h4 style="text-align: center;">Total expense: {{ $totalYearlyExppense }} taka</h4>
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

