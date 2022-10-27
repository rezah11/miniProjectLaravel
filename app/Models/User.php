<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    const TYPE_ADMIN='admin';
    const TYPE_MANAGER='manager';
    const TYPE_USER='user';
    const TYPES=[self::TYPE_ADMIN,self::TYPE_MANAGER,self::TYPE_USER];
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function link()
    {
        return $this->hasMany(Link::class,'user_id','id');
    }
    public function isNormal()
    {
        return $this->type===self::TYPE_USER;
    }

    public function isManager()
    {
        return $this->type===self::TYPE_MANAGER;
    }

    public function isAdmin()
    {
        return $this->type===self::TYPE_ADMIN;
    }


}

