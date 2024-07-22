<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;
use App\Http\Controllers\CommandeController;

class CommandeController extends Controller
{
    public function index() {
        //listing des commandes
        $commandes = Commande::where('user_id', auth()->user()->id)->orderBy('id',"desc")->get() ;
       
        return view('commandes.lister', compact('commandes'));
        
    }


    public function create() {
        
        //*Lecture du panier *//
        $paniers = Panier::where('user_id', auth()->user()->id)->get() ;
        
        if(count($paniers) == 0){return 'vide' ;}
        
        //* Creation de la commande *//
        $commande = Commande::Create(['user_id'=>auth()->user()->id,
                                        'numero'=>0,               
                                        'total' =>0 ]);
           $total = 0 ;


        foreach($paniers as $panier){
            $commandeId = $commande->id ; // identifiant de la commande
            $productId  = $panier->product_id ; // identifiant du produit
            $quantite   = $panier->quantite ; // Quantité du produit
            $price      = $panier->product->price ; //Prix du produit
            $total      += $price * $quantite ; //  $total = $total + $price * $quantite 
        //* Ajout des élements du panier dans commmande_Item *//
        CommandeItem::create(['commande_id' => $commandeId, 
                                    'product_id'=>$productId,
                                    'quantite'=>$quantite,
                                    'price'=>$price]);
    }                            
        //*Mise a jour du total de la commande *//
            $commande->update(['numero'=>9999 , 'total'=>$total]);
            $commande->save();
            
        //*Vide le panier */    
        Panier::where('user_id', auth()->user()->id)->delete();            
            return 'commander';

    }
}
