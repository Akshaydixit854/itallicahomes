<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    protected $table = 'contact_enquiry';

    protected $fillable = [
         'name','email','message','subject'
    ];

}
