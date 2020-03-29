
@section('custom-css')
    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <!-- Custom CSS End -->
@endsection
@foreach($data as $image_list)
    <div class="col-xs-3">
        <img src="{{public_path('images/cover-images/'.$image_list->image)}}" width="300px" height="300px">
    </div>
@endforeach
<div class="col-md-4">
  <div class="properties-list-wrapper home-pro equal-height">
      <div class="properties-pic-section">
          
          <ul class="properties-list">
              @if($property->beds > 0)
                  <li>
                      <span>{{$property->beds}}</span>
                      <abbr>@lang('app.bedrooms')</abbr>
                  </li>
              @endif
              @if($property->baths > 0)
                  <li>
                      <span>{{$property->baths}}</span>
                      <abbr>@lang('app.baths')</abbr>
                  </li>
              @endif
              @if($property->kitchens > 0)
                  <li>
                      <span>{{$property->kitchens}}</span>
                      <abbr>@lang('app.kitchen')</abbr>
                  </li>
              @endif
              @if($property->parking > 0)
                  <li>
                      <span>{{$property->parking}}</span>
                      <abbr>@lang('app.parking')</abbr>
                  </li>
              @endif
              @if($property->fire_place > 0)
                  <li>
                      <span>{{$property->fire_place}}</span>
                      <abbr>@lang('app.fireplace')</abbr>
                  </li>
              @endif
          </ul>
          @php
              $property_ui = (new \App\Services\PropertyService)->propertySingleResourceType($property->type_id);
          @endphp
          <abbr class="red-tag">
              @php
                  $property_type = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
              @endphp
              {{$property_type}}

          </abbr>
      </div>
      
      <div class="properties-decription">
          @if(\Lang::has('property.property_short_desc_'.$property->id))
              {{(new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$property->id),150) }}
          @else
              {{(new \App\Services\PropertyService)->truncate($property->short_description,150) }}
          @endif
      </div>
  </div>
</div>

