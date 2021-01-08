<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStateLang extends Model
{
    protected $table = 'order_state_langs';
    protected $guarded = [];
    protected $visible = ['id', 'name'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
