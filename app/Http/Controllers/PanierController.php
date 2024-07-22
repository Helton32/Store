<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\PanierController;

class PanierController extends Controller
{
    public function index()  {
        $paniers = Panier::where('user_id',auth()->user()->id)->get();
        
        return view ('panier.lister',compact('paniers'));
    }

    public function ajouter(Products $product)  {
        //search product in unser cart
        $existProduct = Panier::where('user_id','=',auth()->user()->id)->where('product_id', '=',$product->id)->first();

        //if product exist update quantities
            if(isset($existProduct))
            {
                $existProduct->quantite = $existProduct->quantite+1 ;
                $existProduct->save();
            }
            else
            {
            //else add the product
            Panier::create(['user_id'=>auth()->user()->id,
                            'product_id'=> $product->id]);
            }
       
        return redirect()->route('panier.lister');
    }

        public function remove(Panier $panier)  {
            
            $panier->delete();
        
            return back();
    }
    public function moins(Panier $panier)  {
        
        if($panier->quantite == 1){
            
            $panier->delete() ;

        }else{
            $panier->quantite = $panier->quantite -1 ;
            $panier->save();
        }

        
        return back();
    }
    
    public function commander()  {
        return 'commander';
    }
}
