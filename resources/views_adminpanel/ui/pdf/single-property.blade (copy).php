<span>
   <p>Property Name - {{$property->name}} / {{$types->type_name}} / Vat - {{$property->vat}} / Price - {{$property->price}}</p>
   <p>Property ID - {{$property->property_id}}</p>
   <p>Region/Location - {{$regions->region_name}}</p>
   <p>Condition - {{$conditions->condition_name}}</p>
   <p>Beds - {{$property->beds}} / Baths - {{$property->baths}} / Kitchen - 1</p>
   <p>Plot Size - {{$property->plot_size}}</p>
   <p>Amenities -
       @foreach($amenities as $amenity)
           {{$amenity->amenities_name}}/
       @endforeach
   </p>
   <p>Property Description - {{$property->detail_description}}</p>
</span>
