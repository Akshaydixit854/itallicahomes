<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $table = 'testimonials';

    protected $fillable = [
         'name','description','cover_image'
    ];

}
