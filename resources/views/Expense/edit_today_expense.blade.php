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
                            <div class="panel-heading "><h3 class="panel-title text-white">Edit today expense</h3>
                        </div><br>

        

                            <div class="panel-body">


                                <form role="form" action="{{url('/update-todayexpense/'.$expenseData->id)}}" method="post" >
                                    @csrf
                             
                                    <div class="form-group">
                                        <label for="exampleInputAddress">Expense details</label>
                                        <textarea class="form-control" name="details" rows="4" >{{$expenseData->details}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="amountDetails">Amount</label>
                                        <input type="text" class="form-control" name="amount" value="{{$expenseData->amount}}">
                                    </div>

                                    <div class="form-group">
                                
                                        <input type="hidden" class="form-control" name="date" value="{{ date('d/m/y') }}">
                                    </div>

                                    <div class="form-group">
                                        
                                        <input type="hidden" class="form-control" name="month" value="{{ date('F') }}">
                                    </div>
        
                                    <div class="form-group">
                                        
                                        <input type="hidden" class="form-control" name="year" value="{{ date('Y') }}">
                                    </div>
        

                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
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