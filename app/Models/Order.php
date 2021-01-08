<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    protected $visible = ['id', 'client', 'status', 'orderDetails', 'created_at'];

    public static function listOrder()
    {
        return Order::with(['client.country', 'client.address', 'status', 'orderDetails.product']);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStateLang::class, 'order_state_lang_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }

    public function scopeFilterItemsOrder($query, $filter)
    {
        if( !empty( $filter) ) {
            $query->where('id', 'LIKE', '%'.$filter.'%')
                ->orWhereHas('address', function ($query) use ($filter) {
                        $query->where('post_code', 'LIKE', '%'.$filter.'%');
                    })
                ->orWhereHas('status', function ($query) use ($filter) {
                        $query->where('name', 'LIKE', '%'.$filter.'%');
                    })
                ->orWhereHas('client', function ($query) use ($filter) {
                        $query->where('name', 'LIKE', '%'.$filter.'%');
                    })
                ->orWhereHas('orderDetails.product', function ($query) use ($filter) {
                        $query->where('name', 'LIKE', '%'.$filter.'%');
                    })
                ->orWhereHas('client.country', function ($query) use ($filter) {
                        $query->where('name', 'LIKE', '%'.$filter.'%');
                    });
        }
    }
}
