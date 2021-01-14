<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'total', 'order_state_lang_id', 'user_id', 'identify', 'payment_method', 'notes'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStateLang::class, 'order_state_lang_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details');
    }

    public function scopeIdentify($query, $filter)
    {
        if( !empty( $filter) ) {
            $query->where('identify', 'LIKE', '%'.$filter.'%');
        }
    }

    public function scopePostCode($query, $filter)
    {
        if( !empty( $filter) ) {
            $query->where('post_code', 'LIKE', '%'.$filter.'%');
        }
    }

    public function scopeFrom($query, $date)
    {
        if ($date) {
            $date = Carbon::createFromFormat('d/m/Y', $date);

            $query->whereDate('created_at', '>=', $date);
        }
    }

    public function scopeStatus($query, $filter)
    {
        if( !empty( $filter) ) {
            $query->whereHas('status', function ($query) use ($filter) {
                        $query->where('name', 'LIKE', '%'.$filter.'%');
                    });
        }
    }

}
