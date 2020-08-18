@extends('layouts.app')

@section('content')

<div class="content-page">
                <!-- Start content -->
    <div class="content">
        <div class="container">

        <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! {{date('Y')}}</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Anix</a></li>
                        <li class="active">IT</li>
                    </ol>
                </div>
            </div>
            <div style="text-align: center;">
                <a href="{{route('january.expense')}}" class="btn btn-sm btn-info" >JANUARY</a>
                <a href="{{route('february.expense')}}" class="btn btn-sm btn-danger" >FEBRUARY</a>
                <a href="{{route('march.expense')}}" class="btn btn-sm btn-warning">MARCH</a>
                <a href="{{route('april.expense')}}" class="btn btn-sm btn-info" >APRIL</a>
                <a href="{{route('may.expense')}}" class="btn btn-sm btn-danger" >MAY</a>
                <a href="{{route('june.expense')}}" class="btn btn-sm btn-warning" >JUNE</a>
                <a href="{{route('july.expense')}}" class="btn btn-sm btn-info" >JULY</a>
                <a href="{{route('august.expense')}}" class="btn btn-sm btn-danger" >AUGUST</a>
                <a href="{{route('september.expense')}}" class="btn btn-sm btn-warning" >SEPTEMBER</a>
                <a href="{{route('october.expense')}}" class="btn btn-sm btn-info" >OCTOBER</a>
                <a href="{{route('november.expense')}}" class="btn btn-sm btn-danger" >NOVEMBER</a>
                <a href="{{route('december.expense')}}" class="btn btn-sm btn-warning" >DECEMBER</a>
            </div>
           <br><br>
     
          <!-- Start form -->
                <div class="row" ">


                <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"> <!--Monthly expense from- {{date('F')}}--></h3>
                            </div><br>
                            
                            <div class="panel-body">
                                <div class="row" >
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Details</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>

                                            @foreach($allData as $row)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $row->details }}</td>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->amount }}  taka</td>
                                                </tr>
                                                
                                            </tbody>
                                        @endforeach

                                        </table>

                                    @php
                                    $month= date("F");

                                    $totalMonthlyExppense= DB::table('expenses')->where('month', $month)->sum('amount');
                                    @endphp
                                    <h4 style="text-align: center;">Total expense: {{ $totalMonthlyExppense }} taka</h4>
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

