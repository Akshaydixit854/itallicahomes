<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAmenities extends Model
{
    protected $table = 'property_amenities';

    public function amenities()
    {
        return $this->belongsTo(Amenities::class, 'amenity_id', 'id');
    }
}
