<?php

namespace App\Filters;

class PropertyFilter extends AbstractFilter
{
    protected $filters = [
        'type' => TypeFilter::class,
        'offer' => OfferFilter::class
    ];
}