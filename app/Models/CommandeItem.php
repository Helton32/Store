<?php

namespace App\Models;

use App\Models\Commande;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeItem extends Model
{
    use HasFactory;
    protected $fillable = ['commande_id' ,'product_id','quantite','price','price'];

    /**
     * Get the Commande that owns the CommandeItem
     *
     * @return BelongsTo
     */
    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class, 'foreign_key', 'other_key');
    }
    /**
     * Get the Products that owns the CommandeItem
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'foreign_key', 'other_key');
    }

}
