<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory , SoftDeletes , Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                    'source' => 'name'
            ]

        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'description', 'slug', 'image', 'status', 'tags', 'show_in_menu', 'parent_id'];

     // اصلاح: رابطه parent به درستی تعریف شده است
     public function parent()
     {
         return $this->belongsTo(ProductCategory::class, 'parent_id');
     }
 
     // تعریف رابطه children برای دسته‌بندی‌های فرزند
     public function children()
     {
         return $this->hasMany(ProductCategory::class, 'parent_id');
     }
 
     public function products()
     {
         return $this->hasMany(Product::class, 'category_id');
     }
 
     public function attributes()
     {
         return $this->hasMany(CategoryAttribute::class);
     }


}
