<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSettings extends Model
{   
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value'];
}
