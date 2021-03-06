<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'city', 'dirrection1', 'dirrection2', 'post_code', 'state'
    ];
}
