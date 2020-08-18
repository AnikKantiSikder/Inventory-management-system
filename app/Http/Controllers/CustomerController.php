<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;
//use app\Employee;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//For adding new customer-------------------
    public function AddCustomer(){
        return view('Customer.add_customer');
    }

//For inserting new customer data into database-------------
    public function StoreCustomerData(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'nid_no' => 'required',
            'city' => 'required',
        ]);

        $data= array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['address']= $request->address;
        $data['nid_no']= $request->nid_no;
        $data['city']= $request->city;
        $data['shop_name']= $request->shop_name;
        $data['account_holder']= $request->account_holder;
        $data['account_number']= $request->account_number;
        $data['bank_name']= $request->bank_name;
        $data['bank_branch']= $request->bank_branch;
        

        //For image inserting into the database...............
        $image= $request->photo;
        if ($image) {
            $image_name=  Str::random(20);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name= $image_name. '.' . $ext;
            $upload_path= 'public/CustomerPhoto/';
            $image_url= $upload_path.$image_full_name;
            $success= $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo']= $image_url;
                //Insert query(Insert all the data)
                $post= DB::table('customers')->insert($data);

                if ($post) {
                    $notification= array(
                        'message' =>'Customer added successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
        
    }

//For showing all customers------------------------------------------------------------
    public function AllCustomer(){
        //Query builder
        $showCustomers= DB::table('customers')->get();
        //Elequent ORM
        //$ShowEmployee= Employee::all();
        return view('Customer.all_customer', compact('showCustomers'));
    }

//For showing a single customer--------------------------------------------------------
    public function ViewCustomer($id){
        $singleCustomerData= DB::table('customers')
                            ->where('id', $id)
                            ->first();
        return view('Customer.view_customer', compact('singleCustomerData'));
    }

//For deleting a single customer--------------------------------------------------------
    public function DeleteCustomer($id){
        $allData= DB::table('customers')
                ->where('id', $id)
                ->first();

        $image_path= $allData->photo;
        $deletePath= unlink($image_path);

        $deleteData= DB::table('customers')
                ->where('id', $id)
                ->delete();

        if ($deleteData) {
        $notification= array(
            'message' =>'Customer deleted successfully',
            'alert-type' => 'error'
        );
        return Redirect()->route('all.customers')->with($notification);
        } else {
        return Redirect()->back();
        }
    }


//Edit a single customer-------------------------------------------------------------------
    public function EditCustomer($id){
        $allData= DB::table('customers')
                ->where('id', $id)
                ->first();
        return view('Customer.edit_customer', compact('allData'));
    }

//Updating a single customer into database-------------------------------------------------
    public function UpdateCustomer(Request $request, $id){
        $data= array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['address']= $request->address;
        $data['nid_no']= $request->nid_no;
        $data['city']= $request->city;
        $data['shop_name']= $request->shop_name;
        $data['account_holder']= $request->account_holder;
        $data['account_number']= $request->account_number;
        $data['bank_name']= $request->bank_name;
        $data['bank_branch']= $request->bank_branch;

        $image= $request->file('photo');
        if ($image) {
            $image_name=  Str::random(20);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name= $image_name. '.' . $ext;
            $upload_path= 'public/CustomerPhoto/';
            $image_url= $upload_path.$image_full_name;
            $success= $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo']= $image_url;
                //Update query(Insert all the data)
                $allData= DB::table('customers')->where('id', $id)->first();
                $image_path= $allData->photo;
                $deletePath= unlink($image_path);
                $updateData= DB::table('customers')->where('id', $id)->update($data);

                if ($updateData) {
                    $notification= array(
                        'message' =>'Customer updated successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.customers')->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
        else{
            $previous_customer_photo= $request->old_photo;
            if ($previous_customer_photo) {
                $data['photo']= $previous_customer_photo;
                //Update query(Insert all the data)
                $updateCustomerData= DB::table('customers')->where('id', $id)->update($data);

                if ($updateCustomerData) {
                    $notification= array(
                        'message' =>'Customer updated successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.customers')->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
    }


//Ends here
}
