<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



//Pos------------------------------------------------------
    public function PosIndex(){

        $allProducts= DB::table('products')
                    ->join('categories', 'products.cat_id', 'categories.id')
                    ->select('categories.cat_name', 'products.*')
                    ->get();

        $allCustomers= DB::table('customers')->get();
        $allCategories= DB::table('categories')->get();
        
        return view('Pos.pos_index', compact('allProducts', 'allCustomers', 'allCategories'));
    }
}
