<?php
<<<<<<< HEAD

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
}
=======
namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $casts = ["image"=>"array"];
    protected $guarded = [];
}
>>>>>>> main
