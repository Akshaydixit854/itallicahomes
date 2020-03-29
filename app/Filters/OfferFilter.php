<?php

namespace App\Filters;


class OfferFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('offer_id', $value);
    }
}