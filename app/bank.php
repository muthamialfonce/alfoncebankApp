<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bank extends Model
{	
	public $timestamps = true;
    protected $fillable=[
        'amount',
    ];
}
