<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMeta extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'product_meta';

    protected $fillable = ['meta_key', 'meta_value', 'product_id'];
}
