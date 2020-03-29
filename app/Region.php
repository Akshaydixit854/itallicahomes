<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $fillable = [
         'region_name','description'
    ];

    public function location(){
        return $this->hasMany(Location::class,'region_id','id');
    }

    public function province(){
        return $this->hasMany(Province::class,'province_id','id');
    }


}
