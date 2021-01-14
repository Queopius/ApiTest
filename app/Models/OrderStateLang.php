<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStateLang extends Model
{
    protected $table = 'order_state_langs';
    protected $fillable = ['name'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
