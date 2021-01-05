<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
