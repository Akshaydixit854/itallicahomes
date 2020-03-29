<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerServices extends Model
{
    protected $table = 'owner_services';

    protected $fillable = ['content','cover_image','published_by','content_italian','content_german','is_available' ];

}