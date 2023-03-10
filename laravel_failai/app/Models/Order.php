<?php

namespace App\Models;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property int $user_id
 * @property int $payment_id
 * @property int $status_id
 */

class Order extends Model
{
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class);
    }

    public function payment(){
        $this->belongsTo(Payment::class);

    }
    public function status(){
        $this->belongsTo(Status::class);
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(
            Product::class,
            OrderDetails::class,
            'order_id',
            'id',
            'id',
            'product_id',
        );
    }

}
