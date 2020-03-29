<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
         'province_name'
    ];

    public function region(){
        return $this->belongsTo(Region::class,'region_id','id');
    }
}