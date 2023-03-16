<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @method static latest()
 */

class PaymentsTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function paymentsTypes(): BelongsTo
    {
        return $this->belongsTo(PaymentsTypes::class);
    }
}
