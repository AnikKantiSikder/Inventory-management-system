<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;
use App\Attendence;

class AttendenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //For taking attendence----------------------------------
    public function TakeAttendence()
    {
        $allEmployee= DB::table('employees')->get();
        return view('Attendence.take_attendence', compact('allEmployee'));
    }

    //For inserting attendence--------------------------------------------------
    public function InsertAttendence(Request $request)
    {
        $date= $request->att_date;
        $att_date= DB::table('attendences')->where('att_date', $date)->first();

        if ($att_date) {
            $notification= array(
                'message' =>'Attendence is already taken today',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->user_id as $id) {
                $data[]= [
                    "user_id"=> $id,
                    "attendence"=> $request->attendence[$id],
                    "att_date"=> $request->att_date,
                    "att_year"=> $request->att_year,
                    "month"=> $request->month,
                    "edit_date"=> date('d_m_y')
                ];
            }

            $attendence= DB::table('attendences')->insert($data);

            
            if ($attendence) {
                $notification= array(
                'message' =>'Attendence taken successfully',
                'alert-type' => 'success'
            );
                return Redirect()->back()->with($notification);
            } else {
                $notification= array(
                'message' =>'Something is wrong',
                'alert-type' => 'error'
            );
                return Redirect()->back()->with($notification);
            }
        }
    }

//For showing all attendences--------------------------------------------------------------------
    public function AllAttendence()
    {
        $allAttData= DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
        return view('Attendence.all_attendence', compact('allAttData'));
    }

//For editing attendence--------------------------------------------------------------------------
    public function EditAttendence($edit_date){

        $dateData= DB::table('attendences')->where('edit_date', $edit_date)->first();

        $data= DB::table('attendences')
                        ->join('employees','attendences.user_id','employees.id')
                        ->select('employees.name','employees.photo','attendences.*')
                        ->where('edit_date', $edit_date)
                        ->get();
        return view('Attendence.edit_attendence', compact('data','dateData'));
    }

//Update attendence-------------------------------------------------------------------------------
    public function UpdateAttendence(Request $request){
        
        foreach ($request->id as $id) {

            $data= [
            
                "attendence"=> $request->attendence[$id],

            ];

            $updateAttendence= Attendence::where(['att_date'=> $request->att_date, 'id'=> $id])->first();
            $updateAttendence->update($data);
        }

        if ($updateAttendence) {
            $notification= array(
            'message' =>'Attendence updated successfully',
            'alert-type' => 'success'
        );
            return Redirect()->route('all.attendence')->with($notification);
        } else {
            $notification= array(
            'message' =>'Something is wrong',
            'alert-type' => 'error'
        );
            return Redirect()->back()->with($notification);
        }

    }


//View attendence---------------------------------------------------------------------------------------------
    public function ViewAttendence($edit_date){

        $dateData= DB::table('attendences')->where('edit_date', $edit_date)->first();

        $data= DB::table('attendences')
                        ->join('employees','attendences.user_id','employees.id')
                        ->select('employees.name','employees.photo','attendences.*')
                        ->where('edit_date', $edit_date)
                        ->get();

        return view('Attendence.view_attendence', compact('data','dateData'));
    }





//end
}