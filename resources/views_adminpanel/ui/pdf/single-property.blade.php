<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Italica</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="{{url('')}}/ui/css/pdf_css/style.css" rel="stylesheet">
    <style type="text/css">
    
      .pro-ser-box-outer {
    width: 16%;
}

/*.big-img img {
    
}*/

 </style>
</head>

<body>
    @php
    $lang1 =Session::get('language');

    @endphp
    <div class="main-sec">
        <div class="content-sec">
            <div class="logo-sec text-center">
                <a href="http://www.italicahomes.com" target="_blank" class="logo-img"><img src="{{url('')}}/ui/images/pdf_template/logo.png" style="margin-left:45%"></a>
            </div>
            <div class="det-property">
                <a href="{{url('')}}/properties/{{$property}}" target="_blank" class="property-img"><img  style="height: 300px;"   src={{asset("/images/cover-images/".$property->cover_image_name)}}></a>
                <div class="about-nav">
                    <p>
                        <span>
                           @if(\Lang::has('region.region_title_'.$property->region_id))
                               {{trans('region.region_title_'.$property->region_id)}}
                           @else
                               {{(new \App\Services\PropertyService)->getRegion($property->region_id) }}
                           @endif
                       </span> /
                       <span>
                        @if(\Lang::has('destination.destination_title_'.$property->destination_id))
                                         {{trans('destination.destination_title_'.$property->destination_id)}}
                                     @else
                                         {{$destination_name}}
                                     @endif
                        
                       </span> /
                       <span>
                           @if(\Lang::has('property.property_title_'.$property->id))
                               {{trans('property.property_title_'.$property->id)}}
                           @else
                               {{$property->name}}
                           @endif
                       </span>
                    </p>
                </div>
                <div class="property-cost">
                    <b> @if(\Lang::has('property_offer.property_offer_title_'.$property->offer_id))
                              {{trans('property_offer.property_offer_title_'.$property->offer_id)}}
                          @else
                              {{(new \App\Services\PropertyService)->getOffer($property->offer_id) }}
                          @endif
                          /</b> {{number_format($property->price , 0, ',', '.')}} €
                    <span>+ {{ $property->vat }}% @lang('app.taxmode') </span>
                </div>
                <div class="property-name">
                    <a href="{{url('')}}/properties/{{$property->id}}" target="_blank" class="red-color pro-tit"><h3 class="red-color">@if(\Lang::has('property.property_title_'.$property->id))
                                        {{trans('property.property_title_'.$property->id)}}
                                    @else
                                        {{$property->name}}
                                    @endif</h3></a>
                    @if($lang1 =='en')
                    <p class="text pro-url">@lang('app.property_url'):<a href="{{url('')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}" target="_blank">{{url('')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}</a></p>
                    @else 
                    <p class="text pro-url">@lang('app.property_url'):<a href="{{url(''.$lang1.'')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}" target="_blank">{{url(''.$lang1.'')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}</a></p>

                    @endif
                    <p class="pro-date">{{date('F d Y', strtotime($property->created_at))}}</p>
                    <p>@lang('app.property_id'): {{$property->id}}</p>
                </div>
                <div class="propety-ser-list row">
                    <!-- Property Service Box Starts -->
                      @if($property->beds > 0)
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count">{{$property->beds}}</p>
                            <p class="pro-txt">@lang('app.bedrooms')</p>
                            <img src="{{url('')}}/ui/images/pdf_template/bed.png" class="ser-img">
                        </div>
                    </div>
                     @endif
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                       @if($property->baths > 0)
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count">{{$property->baths}}</p>
                            <p class="pro-txt">@lang('app.baths')</p>
                            <img src={{asset("ui/images/pdf_template/bathtub.png")}} class="ser-img">
                        </div>
                    </div>
                    @endif
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                       @if($property->kitchens > 0)
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count">{{$property->kitchens}}</p>
                            <p class="pro-txt">@lang('app.kitchen')</p>
                            <img src="{{url('')}}/ui/images/pdf_template/kitchen.png" class="ser-img">
                        </div>
                    </div>
                     @endif
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                      @if($property->parking > 0)
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count">{{$property->parking}}</p>
                            <p class="pro-txt">@lang('app.parking')</p>
                            <img src="{{url('')}}/ui/images/pdf_template/car.png" class="ser-img">
                        </div>
                    </div>
                     @endif
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                     @if($property->fire_place > 0)
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count">{{$property->fire_place}}</p>
                            <p class="pro-txt">@lang('app.fireplace')</p>
                            <img src="{{url('')}}/ui/images/pdf_template/fireplace.png" class="ser-img">
                        </div>
                    </div>
                    @endif
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                      @if($property->terrace > 0)
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count">{{$property->terrace}}</p>
                            <p class="pro-txt">@lang('app.terrace')</p>
                            <img src="{{url('')}}/ui/images/pdf_template/balcony.png" class="ser-img">
                        </div>
                    </div>
                </div>
                     @endif
                        @php
                                    $ids = array();
                                @endphp
                                @foreach($amenities as $amenity)
                                    @if(isset($amenity['amenities']['flag']) && $amenity['amenities']['flag'] != null)
                                        @php
                                            $ids[] = $amenity['amenities']['flag'];
                                        @endphp
                                    @endif
                                @endforeach
                                @if(in_array(1,$ids))
                          <div class="propety-ser-list row">
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="{{url('')}}/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt">@lang('app.heating')</p>
                                        <img src="{{url('')}}/ui/images/pdf_template/fire.png" class="ser-img">
                                    </div>
                                </div>
                                @endif
                                @if(in_array(6,$ids))

                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="{{url('')}}/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt">@lang('app.beach_and_sea')</p>
                                        <img src="{{url('')}}/ui/images/pdf_template/beach.png" class="ser-img">
                                    </div>
                                </div>
                                @endif
                                @if(in_array(3,$ids))
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="{{url('')}}/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt">@lang('app.swimming_pool')</p>
                                        <img src="{{url('')}}/ui/images/pdf_template/pool.png" class="ser-img">
                                    </div>
                                </div>
                         
                                @endif
                                @if(in_array(4,$ids))
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                       <img src="{{url('')}}/ui/images/pdf_template/tick.png" class="tick-img">
                                       <p class="pro-txt">@lang('app.garden')</p>
                                       <img src="{{url('')}}/ui/images/pdf_template/garden.png" class="ser-img">
                                   </div>
                               </div>
                                                           
                                @endif
                                @if(in_array(5,$ids))
                                 <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                       <img src="{{url('')}}/ui/images/pdf_template/tick.png" class="tick-img">
                                       <p class="pro-txt">@lang('app.horses')</p>
                                       <img src="{{url('')}}/ui/images/pdf_template/horse_riding.png" class="ser-img">
                                   </div>
                               </div>
                                @endif
                                @if(in_array(2,$ids))
                                        <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                       <img src="{{url('')}}/ui/images/pdf_template/tick.png" class="tick-img">
                                       <p class="pro-txt">@lang('app.sea_view')</p>
                                       <img src="{{url('')}}/ui/images/pdf_template/sea_view.png" class="ser-img">
                                   </div>
                               </div>
                                @endif
                                @if(in_array(7,$ids))
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="{{url('')}}/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt">@lang('app.wifi')</p>
                                        <img src="{{url('')}}/ui/images/pdf_template/wifi.png" class="ser-img">
                                    </div>
                                </div>
                              
                                @endif
                    <!-- Property Service Box Ends -->
                  
                </div>
                <div class="property-des">
                    <h4 class="main-tit">@lang('app.description')</h4>
                    <p class="text">@if(\Lang::has('property.property_'.$property->id))
                                {!! trans('property.property_'.$property->id) !!}
                            @else
                                {!! $property->detail_description !!}
                            @endif</p>
                </div>
                <!-- Details Starts -->
                <div class="details">
                    <h4 class="main-tit">@lang('app.details')</h4>
                    <div class="details-list">
                        <div class="row">
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit">@lang('app.region')</h6>
                                    <p class="details-txt text"> @if(\Lang::has('region.region_title_'.$property->region_id))
                                         {{trans('region.region_title_'.$property->region_id)}}
                                     @else
                                         {{(new \App\Services\PropertyService)->getRegion($property->region_id) }}
                                     @endif</p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit">@lang('app.type')</h6>
                                    <p class="details-txt text">  @if(\Lang::has('property_type.property_type_'.$property->type_id))
                                         {{trans('property_type.property_type_'.$property->type_id)}}
                                     @else
                                         @php
                                            $new = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                         @endphp
                                         {{ $new }}
                                     @endif</p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit">@lang('app.condition')</h6>
                                    <p class="details-txt text"> @if(\Lang::has('condition.condition_display_name_'.$property->condition_id))
                                         {{trans('condition.condition_display_name_'.$property->condition_id)}}
                                     @else
                                         @php
                                            $new_condition = (new \App\Services\PropertyService)->condition($property->condition_id);
                                         @endphp
                                         {{ $new_condition->condition_display_name }}
                                     @endif</p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit">@lang('app.plot')</h6>
                                    <p class="details-txt text">{{$property->plot_size}} m<sup>2</sup></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit">@lang('app.size')</h6>
                                    <p class="details-txt text">{{$property->living_area}} m<sup>2</sup></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit">@lang('app.location')</h6>
                                    <p class="details-txt text"> @if(\Lang::has('area.area_title_'.$property->area_id))
                                         {{trans('area.area_title_'.$property->area_id)}}
                                     @else
                                         {{$areas->area_name}}
                                     @endif</p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit">@lang('app.destination')</h6>
                                    <p class="details-txt text">@if(\Lang::has('destination.destination_title_'.$property->destination_id))
                                         {{trans('destination.destination_title_'.$property->destination_id)}}
                                     @else
                                         {{$destination_name}}
                                     @endif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Details Ends -->
                <!-- Ameneties Starts -->
                <div class="ameneties mt-20" style="margin-top: 30px;">
                    <h4 class="main-tit">@lang('app.ameneties')</h4>
                    <ul class="row amenity-list">
                         @if(isset($amenities) && sizeof($amenities)>0)
                         @foreach($amenities as $amenity)
                        <li class="amenity-list-item col col-6">
                            <div class="row">
                                <span>     
                                        <img style='width: 15px;height:20px;' src="{{url('')}}/ui/images/pdf_template/tick.png">
                                    </span>
                                <span>
                                  @if(\Lang::has('ameneties.ameneties_display_name_'.$amenity['amenities']['id']))
                                <span class="amenity-txt">{{trans('ameneties.ameneties_display_name_'.$amenity['amenities']['id'])}}</span>
                                @else
                                <span class="amenity-txt">{{$amenity['amenities']['amenities_display_name']}}</span>
                                @endif
                                </span>
                            </div>                            
                        </li>
                         @endforeach
                         @else 
                                 <div class="row">
                                <p>No amenities</p>
                            </div> 
                         @endif
                    </ul>
                </div>
                <!-- Ameneties Ends -->
               <!--  <div class="map-sec mt-20">
                	<h4 class="main-tit">Map</h4>
                	<div class="" id="map" style="width: 100%; height: 300px;"></div>
                    <div class="" id="map" style="width: 100%; height: 300px;"><img src="{{ url('/') }}{{ Storage::url('public/ui/images/pdf_template/somename.png')}}" alt="" style="width: 100%;">
                    </div>
                    
                </div> -->
                <!-- Galeery Section Starts -->
                <div class="gallery-sec mt-20">
                    <h4 class="main-tit">@lang('app.gallery')</h4>
                    <div class="row">
                        <!-- Gallery Box Starts -->
                         @if(!$data->isEmpty())
                                           @foreach($data as $gallery_image)
                        <div class="">
                            <div class="gallery-box big-img">
                                <img  style ="height: 370px;width: 100%;" src={{asset("/images/cover-images/".$gallery_image->image)}}>
                            </div>
                        </div>
                          @endforeach
                                       @else
                                        <div class="gallery-box big-img">
                                            <li>@lang('app.no_preview')</li>
                                        </div>
                                          
                                       @endif
                        <!-- Gallery Box Ends -->
                    </div>
                </div>
                <!-- Galeery Section Ends -->
            </div>
            <footer class="text-center">
                <ul id="social-list" style="margin-left: 35%;">
                   <p style="width: 30px;display: inline-block;">
                            <a target="_blank" href="https://www.facebook.com/italicahomes/" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/facebook.png"></a>
                        </p>
                        <p style="width: 30px;display: inline-block;">
                            <a target="_blank" href="https://twitter.com/livingartIT" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/twitter.png"></a>
                        </p>
                        <p style="width: 30px;display: inline-block;">
                            <a target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/linkedin.png"></a>
                        </p>
                    </ul>
                   <!--  <ul id="social-list">  -->
                       <!--  <span>
                            <a target="_blank" href="https://www.facebook.com/italicahomes/" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/facebook.png"></a>
                        </span>
                        <span>
                            <a target="_blank" href="https://twitter.com/livingartIT" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/twitter.png"></a>
                        </span>
                        <span>
                            <a target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/linkedin.png"></a>
                        </span> -->
                    <!--     <li>
                            <a target="_blank" href="https://www.facebook.com/italicahomes/" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/facebook.png"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://twitter.com/livingartIT" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/twitter.png"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="social-link"><img src="{{url('')}}/ui/images/pdf_template/linkedin.png"></a>
                        </li> -->
                  <!--   </ul> -->

                   <!--  <div style="text-align: center;"> -->
                    <!--   <p style="width: 100%;text-align: center;"> -->
                          
                  
                      <!-- </p>   -->
                   <!--  </div> -->
                <div class="address">
                    <p class="text">
                        Schömerweg 14 94050 Pocking/Germany
                    </p>
                </div>
                <div class="number-block">
                    <ul class="num-list list-unstyled inline m-0">
                        <li>
                            <p class="num-txt">@lang('app.phone_number'): <a href="javascript:void(0);" class="num-link">&nbsp; +49 8538 2659988</a></p>
                        </li>
                        <li>
                            <p class="num-txt">Fax: <a href="#javascript:void(0); class="num-link">&nbsp; +49 821 9998501223</a></p>
                        </li>
                    </ul>
                </div>
                <div class="number-block">
                    <ul class="num-list list-unstyled inline m-0">
                        <li>
                            <p class="num-txt">Email: <a href="mailto:info@italica.de" class="num-link">&nbsp; info@italica.de</a></p>
                        </li>
                    </ul>
                </div>                
                <div class="text-center foot-logo"><a href="http://www.italicahomes.com/properties/33" target="_blank"><img src="{{url('')}}/ui/images/logo.png"></a></div>
                <p class="text-center text copy-txt">@lang('app.Copyright') &copy; italicahomes</p>
            </footer>
        </div>
    </div>
    <!-- Scripts -->
    <script src={{asset("ui/js/pdf_js/jquery-3.4.1.min.js")}}></script>
 </body>

</html>