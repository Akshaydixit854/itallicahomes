<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    protected $table = 'property_features';

    protected $fillable = [
         'value'
    ];

}
