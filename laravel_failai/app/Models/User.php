<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property carbon $created_at
 * @property carbon $updated_at
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_TESTER= 'tester';
    public const ROLES = [

        self::ROLE_USER,
        self::ROLE_ADMIN,
        self::ROLE_TESTER
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $guarded = [
        'id',
        'email_verified_at',
        'remember_token',
        'role'

    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const ROLE_DEFAULT = self::ROLE_USER;

    public function isAdmin(){
       return $this->role === self::ROLE_ADMIN;
   }
    public function isTester(){
        return $this->role === self::ROLE_TESTER;
    }

    public function isPersonnel():bool
    {
        return in_array($this->role,[self::ROLE_ADMIN,self::ROLE_TESTER]);

    }


    public function orders(){

        return $this->hasMany(Order::class);
    }
}
