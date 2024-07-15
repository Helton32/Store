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
        $products = Products::orderBy('id','DESC')->paginate(8);

        return view ('products.products', compact ('categories','products'));

    }
    /*Show Products by category */
    public function ProductByCategory($id = 0) {
        $categories = Category::all() ;

        $products = Products::where('category_id',$id)
                    ->orderBy('id','DESC')->paginate(8);


        return view ('products.products', compact ('categories','products'));
    }
    /**show product detail */

    public function show(Products $product){
        
        //Affichage Produits similaires

        $products = Products::where('category_id', $product->category_id)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        return view('products.show',compact ('product','products'));
    }
}