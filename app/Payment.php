<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'card_type',
    	'card_number',
    	'card_code',
    	'exp_month',
    	'exp_year'
    ];
}
