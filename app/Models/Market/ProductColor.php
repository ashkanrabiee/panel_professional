<?php

namespace App\Models\Market;

use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    
    use HasFactory, SoftDeletes;

    // protected $fillable = ['color_name', 'product_id', 'price_increase', 'status', 'sold_number', 'frozen_number', 'marketable_number'];
    protected $fillable = ['color_name', 'product_id', 'price_increase', 'status', 'sold_number', 'frozen_number', 'marketable_number', 'color'];

    protected $casts = ['image' => 'array'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
