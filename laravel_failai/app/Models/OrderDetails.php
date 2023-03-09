<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'price'
    ];

    public function order(){
        $this->belongsTo(Order::class);
    }
    public function product(){
        $this->belongsTo(Product::class);
    }
    public function status(){
        $this->belongsTo(Status::class);
    }
}
