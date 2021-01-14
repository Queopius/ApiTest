<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name', 'country_lang_id', 'address_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::needsRehash($password) ? \Hash::make($password) : $password;
    }

    public function country()
    {
        return $this->belongsTo(CountryLang::class, 'country_lang_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class)->withDefault();
    }
}
