<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all() ;
        $products = Products::orderBy('id','DESC')->paginate(10);

        return view ('products.products', compact ('categories','products'));

    }
    /*Show Products by category */
    public function ProductByCategory() {
        return view ('products.products');
    }
    /**show product detail */

    public function show(){

        return view('products.show');
    }
}