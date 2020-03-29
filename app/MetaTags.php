<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class MetaTags extends Model
{
    protected $table = 'meta_tags';

    protected $fillable = [
         'meta_title','meta_description','meta_title_italian','meta_title_german','meta_desc_italian', 'meta_desc_german','page','meta_keyword','meta_keyword_italian','meta_keyword_german'
    ];

}
