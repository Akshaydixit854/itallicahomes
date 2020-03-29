<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
         'title','content','cover_image','published_by'
    ];

    /*public function location(){
        return $this->hasMany(Location::class,'region_id','id');
    }*/
}
