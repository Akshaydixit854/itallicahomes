<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';

    protected $fillable = [
         'agent_name','phone_number','email'
    ];
}
