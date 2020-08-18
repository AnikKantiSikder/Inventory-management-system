<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Cart;
use Cart;



class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


//For adding cart-------------------------------------------------

    public function cartAdd(Request $request){
        
        // $data= array();
        // $data['id']= $request->id;
        // $data['name']= $request->name;
        // $data['qty']= $request->qty;
        // $data['price']= $request->price;
        // $data['weight']= $request->weight;

        $check= Cart::add([
            'id'=> $request->id,
            'name'=> $request->name,
            'qty'=> $request->qty,
            'price'=> $request->price,
            'weight'=> 550
        ]);

       
        if ($check) {
            $notification= array(
                'message' =>'Product added to cart successfully',
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


    public function cartUpdate(Request $request, $rowId){

        $quantity= $request->qty;

        $updateCart= Cart::update($rowId, $quantity);

        if ($updateCart) {
            $notification= array(
                'message' =>'Product updated successfully',
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


    public function cartRemove($rowId){

        $removeCart= Cart::remove($rowId);

        if ($removeCart) {
            $notification= array(
                'message' =>'Product removed successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification= array(
                'message' =>'Product removed successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

    }



    public function CreateInvoice(Request $request){

        
        $validatedData = $request->validate(
            [
                'select_customer' => 'required',
            ],
            [
                'select_customer.required'=> 'Please select a customer first'
            ]
            
        );

        $customer_id= $request->select_customer;
        $customer_info= DB::table('customers')->where('id',  $customer_id)->first();
        $contents= Cart::content();
        return view('Pos.invoice', compact('customer_info','contents'));


    }


    public function FinalInvoice(Request $request){

        $data= array();
        $data['customer_id']= $request->customer_id;
        $data['order_date']= $request->order_date;
        $data['order_status']= $request->order_status;
        $data['total_products']= $request->total_products;
        $data['sub_total']= $request->sub_total;
        $data['vat']= $request->vat;
        $data['total']= $request->total;
        $data['payment_status']= $request->payment_status;
        $data['paid_amount']= $request->paid_amount;
        $data['due_amount']= $request->due_amount;

      

        $order_id= DB::table('orderdetails')->insertGetId($data);
        $cartData= Cart::content();

        $orderData= array();

        foreach ($cartData as $value) {
           
           $orderData['order_id']= $order_id;
           $orderData['product_id']= $value->id;
           $orderData['quantity']= $value->qty;
           $orderData['unit_cost']= $value->price;
           $orderData['total']= $value->total;
           
           $insertOrderData= DB::table('orders')->insert($orderData);
        }

        if ($insertOrderData) {
            $notification= array(
                'message' =>'Successfully invoice ceated. Please deliver the product',
                'alert-type' => 'success'
            );
            Cart::destroy();
            return Redirect()->route('home')->with($notification);
        } else {
            $notification= array(
                'message' =>'Error',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }





    }



//Ends here
}
