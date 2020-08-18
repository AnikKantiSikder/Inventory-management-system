<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//Setting-----------------------------------------------
    public function Setting(){

        $settingData= DB::table('settings')->first();
        
        return view('Setting.viewSetting', compact('settingData'));
    }

//Update setting----------------------------------------------------
    public function UpdateSettig(Request $request, $id){

        // $validatedData = $request->validate([
        //     'company_name' => 'required',
        //     'company_address' => 'required|max:255',
        //     'company_email' => 'required|max:20',
        //     'company_phone' => 'required',
        //     'company_mobile' => 'required',
        //     'company_city' => 'required',
        //     'company_country' => 'required|max:20',
        //     'company_zipcode' => 'required',
        // ]);
    
        $data= array();
        $data['company_name']= $request->company_name;
        $data['company_address']= $request->company_address;
        $data['company_email']= $request->company_email;
        $data['company_phone']= $request->company_phone;
        $data['company_mobile']= $request->company_mobile;
        $data['company_city']= $request->company_city;
        $data['company_country']= $request->company_country;
        $data['company_zipcode']= $request->company_zipcode;
        

        $image= $request->file('company_logo');
        if ($image) {
            $image_name=  Str::random(20);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name= $image_name. '.' . $ext;
            $upload_path= 'public/CompanyPhoto/';
            $image_url= $upload_path.$image_full_name;
            $success= $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['company_logo']= $image_url;
                //Update query(Insert all the data)
                $allData= DB::table('settings')->where('id', $id)->first();
                $image_path= $allData->company_logo;
                $deletePath= unlink($image_path);
                $updateData= DB::table('settings')->where('id', $id)->update($data);

                if ($updateData) {
                    $notification= array(
                        'message' =>'Company infromation updated successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
        else{
            $previous_company_logo= $request->old_photo;
            if ($previous_company_logo) {
                $data['company_logo']= $previous_company_logo;
                //Update query(Insert all the data)
                $updateSettingData= DB::table('settings')->where('id', $id)->update($data);

                if ($updateSettingData) {
                    $notification= array(
                        'message' =>'Company infromation updated successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }

    }
}
