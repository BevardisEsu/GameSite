<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @method static latest()
 */

class Status extends Model
{
    use HasFactory;


    public const STATE_NEW = [];

    public const TYPES = ['order','payment','category','user','product','order_details'];

    protected $fillable = [
        'name',
        'type',
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }

}
