<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */

class PaymentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function paymentsTypes(){
        return $this->belongsTo(PaymentType::class);
    }
}
