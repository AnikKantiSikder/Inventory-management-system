<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//Add category--------------------------------------
    public function AddCategory(){
        return view('Category.add_category');
    }

//Insert category-----------------------------------
    public function InsertCategory(Request $request){

        $categoryData= array();
        $categoryData['cat_name']= $request->category_name;
        $insertCatData= DB::table('categories')->insert($categoryData);

        if ($insertCatData) {
            $notification= array(
                'message' =>'Category added successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            return Redirect()->back();
        }

    }


//Add category--------------------------------------------------------
    public function AllCategory(){
        $allCategory= DB::table('categories')->get();
        return view('Category.all_category', compact('allCategory'));
    }
//Delete category----------------------------------------------------
    public function DeleteCategory($id){
        $deleteCategory= DB::table('categories')->where('id', $id)->delete();

        if ($deleteCategory) {
            $notification= array(
                'message' =>'Category deleted successfully',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            return Redirect()->back();
        }
    }

//Edit category-------------------------------------------------------
    public function EditCategory($id){
        $categoryData= DB::table('categories')->where('id', $id)->first();
        return view('Category.edit_category', compact('categoryData'));
    }

//Update category-----------------------------------------------------
   public function UpdateCategory(Request $request, $id){

       $categoryData= array();
       $categoryData['cat_name']= $request->category_name;

       $updateCategoryData= DB::table('categories')->where('id', $id)->update( $categoryData);

       if ($updateCategoryData) {
        $notification= array(
            'message' =>'Category updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.categories')->with($notification);
    } else {
        return Redirect()->back();
    }
   }

//Ends
}
