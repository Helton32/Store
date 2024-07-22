<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use App\Models\Products;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
   public function index()  
    {
        
      $favoris = Favoris::where('user_id',auth()->user()->id)->get() ;
       return view ('liste', compact('favoris'));
    }
    public function ajouter(Products $product)  
    {
        $favoris = Favoris::where('user_id', '=', auth()->user()->id)
        ->where('product_id', '=', $product->id)
        ->first();

    if (isset($favoris)) {
        $favoris->delete();
    } else {
        Favoris::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id
        ]);
    }

    return back();

    }
    public function remove(Favoris $favoris)  
    {
        Favoris::destroy($favoris->id);
       return back();
    }   
}    
