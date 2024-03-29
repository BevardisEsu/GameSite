<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 * @property string $image
 * @property int $price
 * @method static latest()
 */

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'price',
    ];
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function products(){
       return $this->belongsTo(Product::class);
    }
}
