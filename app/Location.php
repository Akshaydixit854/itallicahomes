<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
         'location_name'
    ];

    public function property(){
        return $this->hasMany(Property::class,'location_id','id');
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
