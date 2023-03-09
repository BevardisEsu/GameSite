<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'status',
    ];
    public function user(){
        $this->belongsTo(User::class);
    }
    public function game(){
        $this->belongsTo(GamesList::class);
    }
}
