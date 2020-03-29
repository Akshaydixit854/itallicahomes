<?php


namespace App\Respositories;


use App\Property;

class PropertyRepository
{

    public function findLatest(int $count)
    {
        return Property::orderBy('id','desc')->take($count)->get();
    }
}