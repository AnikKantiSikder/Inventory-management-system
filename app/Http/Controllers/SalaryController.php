<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//For adding salary----------------------------------------------
    public function AddAdvanceEmployeeSalary(){
        return view('Salary.advance_employee_salary');
    }
    

//For inserting employee advance salary--------------------------
    public function InsertAdvanceSalary(Request $request){
        
        $monthName= $request->month;
        $employeeId= $request->emp_id;
        $givenAdvanceSalary= DB::table('advance_salaries')
                            ->where('month', $monthName)
                            ->where('emp_id', $employeeId)
                            ->first();

        if($givenAdvanceSalary===NULL){
            $data= array();
            $data['emp_id']= $request->emp_id;
            $data['month']= $request->month;
            $data['year']= $request->year;
            $data['advance_salary']= $request->advance_salary;
//Insert query(Insert all the data)
            $advanceEmployeeSalary= DB::table('advance_salaries')->insert($data);
                
                    if ($advanceEmployeeSalary) {
                        $notification= array(
                            'message' =>'Advance salary added successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->back()->with($notification); 
                    } else {
                        $notification= array(
                            'message' =>'Error !!',
                            'alert-type' => 'error'
                        );
                        return Redirect()->back()->with($notification);
                    }
        }else{
            $notification= array(
                'message' =>'Already advance salary paid to this name',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification); 
        }


        
    }



//For showing all salaries---------------------------------------
    public function AllAdvanceSalary(){
        $showAllAdvanceSalaries= DB::table('advance_salaries')
                                ->join('employees','advance_salaries.emp_id','employees.id')
                                ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
                                ->orderBy('id', 'DESC')
                                ->get();

        return view('Salary.all_advance_salary', compact('showAllAdvanceSalaries'));
    }




//Ends here
}
