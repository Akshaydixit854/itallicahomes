<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'property_offer';

    protected $fillable = [
         'offer_name'
    ];

}
