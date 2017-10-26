<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
    	'user_id',
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'zip_code',
        'phone_number',
    ];

    public function orders() {
    	return $this->hasMany('App\Order');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
