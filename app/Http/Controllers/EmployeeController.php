<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;
//use app\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//For adding new employee----------------------------------
    public function AddEmployee(){
        return view('add_employee');
    }

//For inserting employee data into database--------------
    public function StoreEmployeeData(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|unique:employees|max:12',
            'address' => 'required',
            'experience' => 'required',
            'photo' => 'required',
            'nid_no' => 'required|unique:employees|max:20',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
        ]);

        $data= array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['address']= $request->address;
        $data['experience']= $request->experience;
        $data['nid_no']= $request->nid_no;
        $data['salary']= $request->salary;
        $data['vacation']= $request->vacation;
        $data['city']= $request->city;

//For image inserting into the database...............
        $image= $request->photo;
        if ($image) {
            $image_name=  Str::random(20);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name= $image_name. '.' . $ext;
            $upload_path= 'public/EmployeePhoto/';
            $image_url= $upload_path.$image_full_name;
            $success= $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo']= $image_url;
                //Insert query(Insert all the data)
                $post= DB::table('employees')->insert($data);

                if ($post) {
                    $notification= array(
                        'message' =>'Employee added successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
        
    }

//For showing all employee-------------------------------
    public function AllEmployee(){

        //Query builder
        $ShowEmployees= DB::table('employees')->get();
        //Elequent ORM
        //$ShowEmployee= Employee::all();
        return view('all_employee',compact('ShowEmployees'));

    }

//For showing a single employee---------------------------
    public function ViewEmployee($id){

        //$singleData= Employee::findorfail($id);
        $singleData= DB::table('employees')
                    ->where('id', $id)
                    ->first();
        
        return view('view_employee', compact('singleData'));
    }

//For deleting a single employee---------------------------
    public function DeleteEmployee($id){
        $allData= DB::table('employees')
                    ->where('id', $id)
                    ->first();

        $image_path= $allData->photo;
        $deletePath= unlink($image_path);

        $deleteData= DB::table('employees')
                     ->where('id', $id)
                     ->delete();

        if ($deleteData) {
            $notification= array(
                'message' =>'Employee deleted successfully',
                'alert-type' => 'error'
            );
            return Redirect()->route('all.employee')->with($notification);
        } else {
            return Redirect()->back();
        }
    }

//Edit a single employee------------------------
    public function EditEmployee($id){
        $allData= DB::table('employees')
                    ->where('id', $id)
                    ->first();
        return view('edit_employee', compact('allData'));
    }
//Update a single employee into database---------
    public function UpdateEmployeeData(Request $request, $id){
        
        $data= array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['address']= $request->address;
        $data['experience']= $request->experience;
        $data['nid_no']= $request->nid_no;
        $data['salary']= $request->salary;
        $data['vacation']= $request->vacation;
        $data['city']= $request->city;

        $image= $request->file('photo');
        if ($image) {
            $image_name=  Str::random(20);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name= $image_name. '.' . $ext;
            $upload_path= 'public/EmployeePhoto/';
            $image_url= $upload_path.$image_full_name;
            $success= $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo']= $image_url;
                //Update query(Insert all the data)
                $allData= DB::table('employees')->where('id', $id)->first();
                $image_path= $allData->photo;
                $deletePath= unlink($image_path);
                $updateData= DB::table('employees')->where('id', $id)->update($data);

                if ($updateData) {
                    $notification= array(
                        'message' =>'Employee updated successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
        else{
            $previous_employee_photo= $request->old_photo;
            if ($previous_employee_photo) {
                $data['photo']= $previous_employee_photo;
                //Update query(Insert all the data)
                $updateEmployeeData= DB::table('employees')->where('id', $id)->update($data);

                if ($updateEmployeeData) {
                    $notification= array(
                        'message' =>'Employee updated successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
    }

//Ends here
}
