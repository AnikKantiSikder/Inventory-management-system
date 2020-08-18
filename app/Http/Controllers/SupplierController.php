<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;
//use app\Employee;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//For adding new employee----------------------------------
    public function AddSupplier(){
        return view('Supplier.add_supplier');
    }

//For inserting supplier data into database----------------
    public function StoreSupplierData(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
            
        ]);

        $data= array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['address']= $request->address;
        $data['type']= $request->type;
        $data['shop_name']= $request->shop_name;
        $data['account_holder']= $request->account_holder;
        $data['account_number']= $request->account_number;
        $data['bank_name']= $request->bank_name;
        $data['branch_name']= $request->branch_name;

        
//For image inserting into the database...............
        $image= $request->photo;
        if ($image) {
            $image_name=  Str::random(20);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name= $image_name. '.' . $ext;
            $upload_path= 'public/SupplierPhoto/';
            $image_url= $upload_path.$image_full_name;
            $success= $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo']= $image_url;
                //Insert query(Insert all the data)
                $insertSupplierData= DB::table('suppliers')->insert($data);

                if ($insertSupplierData) {
                    $notification= array(
                        'message' =>'Supplier added successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.suppliers')->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }

    }


//For showing all suppliers--------------------------------------------------------------
        public function AllSupplier(){
            //Query builder
            $showSuppliers= DB::table('suppliers')->get();
            //Elequent ORM
            //$ShowEmployee= Employee::all();
            return view('Supplier.all_supplier', compact('showSuppliers'));

        }


//For showing a single supplier----------------------------------------------------------
       public function ViewSupplier($id){
           $singleSupplierData= DB::table('suppliers')
                            ->where('id', $id)
                            ->first();
        return view('Supplier.view_supplier', compact('singleSupplierData'));
       }

//For deleting a single supplier---------------------------------------------------------
       public function DeleteSupplier($id){

           $allData= DB::table('suppliers')
                            ->where('id', $id)
                            ->first();
            $image_path= $allData->photo;
            $deletePath= unlink($image_path);
    
            $deleteSupplierData= DB::table('suppliers')
                    ->where('id', $id)
                    ->delete();
    
            if ($deleteSupplierData) {
            $notification= array(
                'message' =>'Supplier deleted successfully',
                'alert-type' => 'error'
            );
            return Redirect()->route('all.suppliers')->with($notification);
            } else {
            return Redirect()->back();
            }
       }


//Edit a single supplier-------------------------------------------------------------------
        public function EditSupplier($id){

            $allData= DB::table('suppliers')
                    ->where('id', $id)
                    ->first();
        return view('Supplier.edit_supplier', compact('allData'));
        }


//Update a single supplier data------------------------------------------------------------
        public function UpdateSupplier(Request $request, $id){

            $data= array();
            $data['name']= $request->name;
            $data['email']= $request->email;
            $data['phone']= $request->phone;
            $data['address']= $request->address;
            $data['type']= $request->type;
            $data['shop_name']= $request->shop_name;
            $data['account_holder']= $request->account_holder;
            $data['account_number']= $request->account_number;
            $data['bank_name']= $request->bank_name;
            $data['branch_name']= $request->branch_name;
    
            $image= $request->file('photo');
            if ($image) {
                $image_name=  Str::random(20);
                $ext= strtolower($image->getClientOriginalExtension());
    
                $image_full_name= $image_name. '.' . $ext;
                $upload_path= 'public/SupplierPhoto/';
                $image_url= $upload_path.$image_full_name;
                $success= $image->move($upload_path, $image_full_name);
    
                if ($success) {
                    $data['photo']= $image_url;
                    //Update query(Insert all the data)
                    $allData= DB::table('suppliers')->where('id', $id)->first();
                    $image_path= $allData->photo;
                    $deletePath= unlink($image_path);
                    $updateSupplierData= DB::table('suppliers')->where('id', $id)->update($data);
    
                    if ($updateSupplierData) {
                        $notification= array(
                            'message' =>'Supplier updated successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('all.suppliers')->with($notification);
                    } else {
                        return Redirect()->back();
                    }
                }
            }
            else{
                $previous_photo= $request->old_photo;
                if ($previous_photo) {
                    $data['photo']= $previous_photo;
                    //Update query(Insert all the data)
                    $updateSupplierData= DB::table('suppliers')->where('id', $id)->update($data);
    
                    if ($updateSupplierData) {
                        $notification= array(
                            'message' =>'Supplier updated successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('all.suppliers')->with($notification);
                    } else {
                        return Redirect()->back();
                    }
                }
            }



        }


//End
}
