<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $game_id
 * @property string $score
 * @property string $status
 * @method static latest()
 */
class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'status',
    ];

    protected $table = 'scores';

    public function user(){
       return $this->belongsTo(User::class);
    }
    public function game(){
       return $this->belongsTo(GamesList::class);
    }
    public function scores(){
        return $this->belongsTo(Score::class);
    }

}
