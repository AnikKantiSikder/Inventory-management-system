<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddExpense(){
        return view('Expense.add_new_expense');
    }

    public function InsertExpense(Request $request){
        $data= array();
        $data['details']= $request->details;
        $data['amount']= $request->amount;
        $data['date']= $request->date;
        $data['month']= $request->month;
        $data['year']= $request->year;

        $insertExpense= DB::table('expenses')->insert($data);
        if ($insertExpense) {
            $notification= array(
                'message' =>'New expenses added successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        } else {
            return Redirect()->back();
        }
    }


//For today expense------------------------------------------------
    public function TodayExpense(){
        $date= date("d/m/y");
       
        $todayExpenseData= DB::table('expenses')->where('date', $date)->get();
        return view('Expense.today_expense', compact('todayExpenseData'));
    }


//Edit today expense----------------------------------------------------------
    public function EditTodayExpense($id){
        $expenseData= DB::table('expenses')->where('id', $id)->first();
        return view('Expense.edit_today_expense', compact('expenseData'));
    }

//Update today expense--------------------------------------------------------
    public function UpdateTodayExpense(Request $request, $id){
        $data= array();
        $data['details']= $request->details;
        $data['amount']= $request->amount;
        $data['date']= $request->date;
        $data['month']= $request->month;
        $data['year']= $request->year;

        $updateExpense= DB::table('expenses')->where('id', $id)->update($data);
        if ($updateExpense) {
            $notification= array(
                'message' =>'Expense updated successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        } else {
            return Redirect()->back();
        }
    }



//For monthly expense-------------------------------------------------------------
    public function MonthlyExpense(){
        $month= date("F");

        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

//For early expense----------------------------------------------------------------
    public function YearlyExpense(){
        $year= date("Y");
        $allData= DB::table('expenses')->where('year', $year)->get();

        return view('Expense.yearly_expense', compact('allData'));
    }


//For 12 month show--------------------------------------------------
    public function JanuaryExpense(){
        $month= 'January' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }
    public function FebruaryExpense(){
        $month= 'February' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function MarchExpense(){
        $month= 'March' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function AprilExpense(){
        $month= 'April' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function MayExpense(){
        $month= 'May' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function JuneExpense(){
        $month= 'June' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }
    public function JulyExpense(){
        $month= 'July' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function AugustExpense(){
        $month= 'August' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function SeptemberExpense(){
        $month= 'September' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function OctoberExpense(){
        $month= 'October' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }

    public function NovemberExpense(){
        $month= 'November' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }


    public function DecemberExpense(){
        $month= 'December' ;
        $allData= DB::table('expenses')->where('month', $month)->get();
        return view('Expense.monthly_expense', compact('allData'));
    }





//Ends
}