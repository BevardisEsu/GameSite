<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @method static latest()
 */

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];


}
