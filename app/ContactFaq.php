<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactFaq extends Model
{
    protected $table = 'contact_faq';

    protected $fillable = [
         'name','email','question'
    ];

}
