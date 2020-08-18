<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;

class PaysalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//Pay salary to employee------------------------------
    public function PaySalary(){

        $employee_data= DB::table('employees')->get();
        return view('Paysalary.pay_salary', compact('employee_data'));
    }
}
