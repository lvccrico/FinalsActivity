<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shoppingcart_id', 'total_amount', 'total_items'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function shipping() {
        return $this->belongsTo('App\Shipping');
    }
}
