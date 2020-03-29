<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table = 'property_types';

    protected $fillable = [
         'type_name','description'
    ];

    public function property(){
        return $this->hasMany(Property::class,'type_id','id');
    }
}
