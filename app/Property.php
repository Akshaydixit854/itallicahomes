<?php

namespace App;

use App\Filters\PropertyFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = [
        'name', 'gallery_token','short_description', 'detail_description', 'beds', 'baths', 'plot_size', 'living_area', 'parking',
        'availability', 'property_location_latitude', 'property_location_longitude', 'cover_image','kitchen','area_id','address','fire_place','terrace'
    ];

	public function getSlugAttribute($lang=null): string
    {
      if($lang=='it')return str_slug($this->name_in_italian);
	else if ($lang=='de')return str_slug($this->name_in_german);
	else return str_slug($this->name);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'type_id', 'id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id', 'id');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function property_amenities()
    {
        return $this->hasMany(PropertyAmenities::class, 'property_id', 'id');
    }

    public function property_image_gallery()
    {
        return $this->hasMany(PropertyImageGallery::class, 'property_id', 'id');
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new PropertyFilter($request))->filter($builder);
    }

     public function property_agent()
    {
        return $this->belongsTo(Agent::class,'agent_id','id');
    }

}
