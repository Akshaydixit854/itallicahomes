<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    protected $table = 'amenities';

    protected $fillable = [
         'amenities_display_name','amenities_name','flag'
    ];
}
