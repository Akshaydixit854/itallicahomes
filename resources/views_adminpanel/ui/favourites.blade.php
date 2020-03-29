@extends('ui.layouts.app')

@section('custom-css')

<title>{{ __('app.your_fav_properties')}}</title>
@php
if($properties && sizeof($properties)>0){
        $meta_descr = strip_tags($properties[0]->short_description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
}
@endphp
<meta name="description" content="{{$meta_descr or ''}}">
<meta name="keywords" content="{{$metakey or ''}}">
    <link rel="icon" href={{asset("ui/images/favicon.png")}})}} sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <!-- Custom CSS End -->
    <!-- Autosearch CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/autosearch.css")}}>
    <!-- Autosearch CSS End -->
    <!-- Properties Slider Start -->
    <link rel="stylesheet" href={{asset("ui/css/thumbnail-slider.css")}} type="text/css" media="screen" />
    <!-- Properties Slider End -->
    <!-- Price range Slider Start -->
    {{-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/hot-sneaks/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-2.1.3.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script> --}}
    <!-- Properties Slider End -->
<link rel="stylesheet" href={{asset("ui/css/custom.css")}}>


@endsection
@include('cookieConsent::index')
    @if(Session::has('message'))
    <div class="fav-alert-box row">
   <div class="col-11">
      <p class="fav-alert alert {{ Session::get('alert-class', 'alert-info') }}"><span class="fav-alert-icon"><i class="fas fa-heart"></i></span>{{ Session::get('message') }}</p>
   </div>
   <div class="col-1">
        <a href="javascript:void(0);" class="fav-alert-close"><i class="fas fa-times"></i></a>
   </div>
</div>
    @endif
@section('content')
<!--@php
    $lang1 =Session::get('language');
@endphp-->
    <!-- Banner Section Start -->
    <div class="wrapper">

    <!-- Banner Section End -->
    <!-- Properties Heading Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper properties-text-wrapper remove-shadow-section">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.your_fav_properties')<p>There are <abbr>{{count($properties)}}</abbr>propertie(s)</p></span>
            </div>
        </div>
    </div>
    <!-- Properties Heading End -->
    <!-- Properties List Start -->
    <div class="wrapper">
        <div class="properties-view-main">
            <div class="wrapper">

                <div class="row tab-content panel-container">
                    <div class="col-md-12 res-properties-view panel-left" >
                        @php
                            $fills = 0;
                            $property_markers = array();
                        @endphp
                        <?php //dd($properties);?>
                        @foreach ($properties as $property)
                            @php
                                $property_markers[$fills]['name'] = $property->name;
                                $property_markers[$fills]['latitude'] = $property->property_location_latitude;
                                $property_markers[$fills]['longitude'] = $property->property_location_longitude;
                                $fills++
                            @endphp
                            <div class="col-md-3 properties-list-block">
                                <div class="properties-list-wrapper properties-inner-list">
                                    <div class="properties-pic-section">
                                        <span><a href="@if($lang1 == 'en')                        
                                       {{url('')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}
                                    @else {{url(''.$lang1.'')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}@endif" class="properties-link">
                                            <img id="prop_images_{{$property->id}}" class="prop_images" data-main-id="{{$property->id}}"  src={{asset("/images/cover-images/".$property->cover_image_name)}}></a></span>
                                        <ul class="properties-list">
                                            @if($property->beds > 0)
                                                <li>
                                                    <span>{{$property->beds}}</span>
                                                    <abbr>@lang('app.bedrooms')</abbr>
                                                    <em>&#xf236;</em>
                                                </li>
                                            @endif
                                            @if($property->baths > 0)
                                                <li>
                                                    <span>{{$property->baths}}</span>
                                                    <abbr>@lang('app.baths')</abbr>
                                                    <em>&#xf2cd;</em>
                                                </li>
                                            @endif
                                            @if($property->kitchens > 0)
                                                <li>
                                                    <span>{{$property->kitchens}}</span>
                                                    <abbr>@lang('app.kitchen')</abbr>
                                                    <em>&#xf0f5;</em>
                                                </li>
                                            @endif
                                            @if($property->parking > 0)
                                                <li>
                                                    <span>{{$property->parking}}</span>
                                                    <abbr>@lang('app.parking')</abbr>
                                                    <em><i class="fas fa-car"></i></em>
                                                </li>
                                            @endif
                                            @if($property->fire_place > 0)
                                                <li>
                                                    <span>{{$property->fire_place}}</span>
                                                    <abbr>@lang('app.fireplace')</abbr>
                                                    <em><img src="{{asset("ui/images/campfire.svg")}}" class="pro-icon-img small-icon"></em>
                                                </li>
                                            @endif
                                        </ul>
                                        @php
                                            $property_type = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                        @endphp
                                        @php
                                            $property_ui = (new \App\Services\PropertyService)->propertySingleResourceType($property->type_id);
                                        @endphp
                                        <abbr class="red-tag" style="background: {{$property_ui->ui_color}}">{{$property_type}}</abbr>
                                    </div>
                                    <div class="properties-name">
                                        <span><em>{{(new \App\Services\PropertyService)->truncate(trans('property.property_title_'.$property->id)) }}</em><i><a class="heart-fav" href="/favourite/{{$property->id}}">{!! (new \App\Services\PropertyService)->checkFav($property->id) !!}</a></i></span>
                                        <abbr class="properties-loction"><em>&#xf041;</em>
                                            @if(\Lang::has('region.region_title_'.$property->region_id))
                                                {{trans('region.region_title_'.$property->region_id)}}
                                            @else
                                                {{(new \App\Services\PropertyService)->getRegion($property->region_id) }}
                                            @endif

                                        </abbr>
                                        <i class="properties-price-doller"><span class="price-range">{{number_format($property->price , 0, ',', '.')}}</span></i>
                                    </div>
                                    <div class="properties-decription">
                                        @if(\Lang::has('property.property_short_desc_'.$property->id))
                                            {{(new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$property->id),150) }}
                                        @else
                                            {{(new \App\Services\PropertyService)->truncate($property->short_description,150) }}
                                        @endif

                                    </div>
                                        <a href="{{url('')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}" class="properties-link">@lang('app.read_more')</a></div>
                                    </div>
                        @endforeach

                        @if ($fills < count($properties))
                            <div class="properties-view-all">
                                <a href="#">@lang('app.view_all')</a>
                            </div>
                        @endif

                    </div>
                    {{-- <div class="properties-map-section panel-right">
                        <span class="splitter map-arrow-btn">&#xf104;<i>&#xf105;</i></span>
                        <div class="property-view-map">
                            <!-- <div style="width:100%;height:100%;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5297.447035450058!2d13.3855753!3d48.4042525!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4774435f60d1e2b7%3A0x3714d97cce651b72!2sSch%C3%B6merweg+14%2C+94060+Pocking%2C+Germany!5e0!3m2!1sen!2sin!4v1537985697608" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div> -->
                            <div id="map" style="width:100%;height:100%;"></div>
                        </div>
                    </div> --}}
                    <!-- Map Pointer Hover Start -->
                    <!-- <div class="map-hover-view">
                       <div class="properties-list-wrapper properties-map-inner-list">
                           <div class="properties-pic-section">
                              <span><img src="images/hotol.png"></span>
                           </div>
                           <div class="properties-name">
                              <span><em>Unique Seafront Villa in The</em><i>&#xf006;</i></span>
                              <abbr class="properties-loction"><em>&#xf041;</em>Laglio, Como, Italy</abbr>
                              <i class="properties-price-doller">12540</i>
                           </div>
                           <div class="map-hover-properties-btn">
                             <a href="#" data-toggle="modal" data-target="#view-properties-details" class="quick-btn">Quick View</a>
                             <a href="#" class="property-btn">Go to Property</a>
                           </div>
                        </div>
                    </div> -->
                    <!-- Map Pointer Hover End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Properties List End -->
@endsection

@section('custom-js')
    <!-- Bootstrap JS Start -->
    <script src={{asset("ui/js/jquery-library.js")}}></script>
    <script src={{asset("ui/js/popper.min.js")}}></script>
    <script src={{asset("ui/js/bootstrap.min.js")}}></script>
    <script src={{asset("ui/js/auto-search.js")}}></script>
    <script src={{asset("ui/js/thumbnail-slider.js")}}></script>
    <script src={{asset("ui/js/jquery-resizable.js")}}></script>
    <script src={{asset("ui/js/price_range_script.js")}}></script>
    <script>
        $(".panel-left").resizable({
            handleSelector: ".splitter",
            resizeHeight: false,
            handles: 'e',
            distance:0,
            minWidth: 316
        });
    </script>
    
    <!-- resizable Start -->
    <script>
        $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut(4000);
          });

        $(document).ready(function(){
            $('.price-location-adv-filter-wrapper').hide();
            $('.show-all-filter').on('click', function(event) {
                alert('not working');
            $('.filer-show-block').addClass('close-pro-filter');
            $('.filer-show-block').removeClass('show-all-filter');
                 $('.price-location-adv-filter-wrapper').toggle('show');
            });
             if($('.fav-alert-box').length){
                $('.fav-alert-box').fadeOut(4000);
            }

        });
      
        // Autosearch Start
        $( function() {
            var availableTags = [];
            $.ajax({
                url: '{{url('')}}/properties/autocomplete',
                dataType: "JSON",
                type: "GET",
                success: function(data){
                    var properties = data.properties;
                    for(var i = 0;i < properties.length;i++){
                        availableTags.push(properties[i]['name']);
                    }
                }
            });
            $( "#autosearchbar" ).autocomplete({
                source: availableTags,
            });
        } );
        // Autosearch End
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem:8,
            auto:true
        });
        $(".quick-btn").click(function() {
            $(window).resize();
            $(window).resize();
        });
    </script>
    <!-- Properties Slider End -->
    
    <script>
        // Responsive Menu  Start
        $(document).on('ready', function() {
            $( ".menu-list li ul" ).before( "<i class='sub-menu-icon'> &#xf0dd; </i>" );
            $('#menuBtn').click(function(){
                $('#menuBtn').toggleClass('open');
                $('.menu-list').toggleClass('menuvisible');
            });
            $(".menu-list li i").click(function(e) {
                $(this).next("ul").slideToggle();
            });
        });
        // Responsive Menu  Start
    </script>
@endsection
