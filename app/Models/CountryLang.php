<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryLang extends Model
{
    protected $table = 'country_langs';
    protected $fillable = ['name', 'code'];

    public function users()
    {
        return $this->hasMany(User::class, 'country_lang_id');
    }
}
