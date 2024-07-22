<?php

namespace App\Models;

use App\Models\Favoris;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name','description','price','images',];
    protected $casts = [
        'images' => 'array',
    ];
    /**
     * Get the category that owns the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function favori(): BelongsTo
    {
        return $this->belongsTo(Favoris::class);
    }
  
}
