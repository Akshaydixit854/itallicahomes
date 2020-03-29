<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerServices extends Model
{
    protected $table = 'buyer_services';

    protected $fillable = ['content','cover_image','published_by','content_italian','content_german','is_available' ];

}