<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $amount
 * @property int $status_id
 * @property carbon $created_at
 * @property carbon $updated_at
 * @method static latest()
 */


class Payment extends Model
{

    //Kintamieji kurių negalima pildyti MassAssignment metu

    protected $guarded = [

        'id',
    ];

    //Kintamieji kurie gali būti pildomi MassAssignment metu

    protected $fillable = [

        'name',
        'amount',
        'status_id'
    ];

    public function payment()
    {
        return $this->belongsTo(Status::class);
    }

}
