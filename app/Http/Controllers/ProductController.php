<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//Add product----------------------------------
    public function AddProduct(){
        return view('Product.add_product');
    }

//Insert product-------------------------------
    public function InsertProduct(Request $request){

        
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products|max:255',
            'product_route' => 'required|unique:products|max:12',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_warhouse' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ]);


        $data= array();
        $data['product_name']= $request->product_name;
        $data['product_code']= $request->product_code;
        $data['cat_id']= $request->cat_id;
        $data['sup_id']= $request->sup_id;
        $data['product_warhouse']= $request->product_warhouse;
        $data['product_route']= $request->product_route;
        $data['buy_date']= $request->buy_date;
        $data['expire_date']= $request->expire_date;
        $data['buying_price']= $request->buying_price;
        $data['selling_price']= $request->selling_price;

//For image inserting into the database...............
        $image= $request->product_image;
        if ($image) {
            $image_name=  Str::random(20);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name= $image_name. '.' . $ext;
            $upload_path= 'public/ProductPhoto/';
            $image_url= $upload_path.$image_full_name;
            $success= $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['product_image']= $image_url;
                //Insert query(Insert all the data)
                $postProductData= DB::table('products')->insert($data);

                if ($postProductData) {
                    $notification= array(
                        'message' =>'Product added successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }

    }



//All product----------------------------------------------------------
    public function AllProduct(){

        $allProductData= DB::table('products')->get();

        return view('Product.all_product', compact('allProductData'));
    }

//Delete a single product----------------------------------------------
    public function DeleteProduct($id){

        $allData= DB::table('products')->where('id', $id)->first();

        $image_path= $allData->product_image;
        $deletePath= unlink($image_path);

        $deleteProduct= DB::table('products')
                     ->where('id', $id)
                     ->delete();

        if ($deleteProduct) {
            $notification= array(
                'message' =>'Product deleted successfully',
                'alert-type' => 'error'
            );
            return Redirect()->route('all.products')->with($notification);
        } else {
            return Redirect()->back();
        }
    }


//View a single product details------------------------------------------
   public function ViewProduct($id){

       $viewProductData= DB::table('products')
                        ->join('categories','products.cat_id','categories.id')
                        ->join('suppliers','products.sup_id','suppliers.id')
                        ->select('categories.cat_name','products.*','suppliers.name')
                        ->where('products.id', $id)
                        ->first();

       return view('Product.view_product', compact('viewProductData'));
   }

//Edit a single product---------------------------------------------------
   public function EditProduct($id){

        $productData= DB::table('products')
                    ->where('id', $id)
                    ->first();
        return view('Product.edit_product', compact('productData'));
   }


//Update a single product data---------------------------------------------
   public function UpdateProduct(Request $request, $id){


    $data= array();
    $data['product_name']= $request->product_name;
    $data['product_code']= $request->product_code;
    $data['cat_id']= $request->cat_id;
    $data['sup_id']= $request->sup_id;
    $data['product_warhouse']= $request->product_warhouse;
    $data['product_route']= $request->product_route;
    $data['buy_date']= $request->buy_date;
    $data['expire_date']= $request->expire_date;
    $data['buying_price']= $request->buying_price;
    $data['selling_price']= $request->selling_price;

    $image= $request->file('product_image');
    if ($image) {
        $image_name=  Str::random(20);
        $ext= strtolower($image->getClientOriginalExtension());

        $image_full_name= $image_name. '.' . $ext;
        $upload_path= 'public/ProductPhoto/';
        $image_url= $upload_path.$image_full_name;
        $success= $image->move($upload_path, $image_full_name);

        if ($success) {
            $data['product_image']= $image_url;
            //Update query(Insert all the data)
            $allData= DB::table('products')->where('id', $id)->first();
            $image_path= $allData->product_image;
            $deletePath= unlink($image_path);
            $updateProductData= DB::table('products')->where('id', $id)->update($data);

            if ($updateProductData) {
                $notification= array(
                    'message' =>'Product updated successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.products')->with($notification);
            } else {
                return Redirect()->back();
            }
        }
    }
    else{
        $previous_photo= $request->old_photo;
        if ($previous_photo) {
            $data['product_image']= $previous_photo;
            //Update query(Insert all the data)
            $updateProductData= DB::table('products')->where('id', $id)->update($data);

            if ($updateProductData) {
                $notification= array(
                    'message' =>'Product updated successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.products')->with($notification);
            } else {
                return Redirect()->back();
            }
        }
    }

   }





//Ends 
}
