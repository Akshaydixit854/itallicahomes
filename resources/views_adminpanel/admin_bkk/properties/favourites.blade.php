@extends('ui.layouts.app')

@section('custom-css')
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
    <!-- Banner Section Start -->
    <div class="wrapper">

    <!-- Banner Section End -->
    <!-- Properties Heading Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper properties-text-wrapper remove-shadow-section">
            <div class="main-container-wrapper">
                <span class="main-heading">Preview Properties<p>Card</p></span>
            </div>
        </div>
    </div>
    <!-- Properties Heading End -->
    <!-- Properties List Start -->
    <div class="wrapper">
        <div class="properties-banner">
            <div class="main-container-wrapper">
                <div class="wrapper">
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-md-4">
                                <div class="properties-list-wrapper home-pro equal-height">
                                    <div class="properties-pic-section">
                                        <span><img src={{asset("/images/cover-images/".$property->cover_image_name)}}></span>
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
                                            $color = '';
                                            if(!is_null($property->type)){
                                                $color = $property->type->ui_color;
                                            }
                                        @endphp
                                        <abbr class="red-tag" style="background: {{$color}}">
                                            @php
                                                $property_type = (new \App\Services\PropertyService)->propertySingleType($property->type_id)
                                            @endphp
                                            {{$property_type}}

                                        </abbr>
                                    </div>
                                    <div class="properties-name">
                                        @if(\Lang::has('property.property_title_'.$property->id))
                                            <span><em>{{(new \App\Services\PropertyService)->truncate(trans('property.property_title_'.$property->id)) }}</em><i><a class="heart-fav" href="/favourite/{{$property->id}}">{!! (new \App\Services\PropertyService)->checkFav($property->id) !!}</a></i></span>
                                        @else
                                            <span><em>{{(new \App\Services\PropertyService)->truncate($property->name)}}</em><i><a  class="heart-fav"href="/favourite/{{$property->id}}">{!! (new \App\Services\PropertyService)->checkFav($property->id) !!}</a></i></span>
                                        @endif
                                        <abbr class="properties-loction"><em>&#xf041;</em>
                                            @if(\Lang::has('region.region_title_'.$property->region_id))
                                                {{trans('region.region_title_'.$property->region_id)}}
                                            @else
                                                {{(new \App\Services\PropertyService)->getRegion($property->region_id) }}
                                            @endif

                                        </abbr>
                                        <i class="properties-price-doller"><span class="price-range">{{number_format($property->price , 0, ',', '.')}}</spa></i>
                                    </div>
                                    <div class="properties-decription">
                                        @if(App::isLocale('en'))
                                            {{(new \App\Services\PropertyService)->truncate($property->short_description,150) }}
                                        @elseif(App::isLocale('it'))
                                            {{(new \App\Services\PropertyService)->truncate($property->short_description_in_italian,150) }}
                                        @elseif(App::isLocale('de'))
                                            {{(new \App\Services\PropertyService)->truncate($property->short_description_in_german,150) }}
                                        @endif
                                    </div>
                                    <a href="/properties/{{$property->id}}" class="properties-link">@lang('app.read_more')</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="properties-view-all">
                        <a href="/search">@lang('app.view_all')</a>
                    </div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlVWqoyW0m38zUFtbQ88f3h_kYYQtc9g0&callback=initMap" type="text/javascript"></script>


    <script>
          $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut();
          });
    </script>
    <script>
        $(".panel-left").resizable({
            handleSelector: ".splitter",
            resizeHeight: false,
            handles: 'e',
            distance:0,
            minWidth: 316

            //(".panel-left").minWidth('500px');
        });

    </script>
    <!-- resizable Start -->
    <script>
        $(document).ready(function(){
            $('.price-location-adv-filter-wrapper').hide();
            $('.show-all-filter').on('click', function(event) {
                alert('not working');
            $('.filer-show-block').addClass('close-pro-filter');
            $('.filer-show-block').removeClass('show-all-filter');
                 $('.price-location-adv-filter-wrapper').toggle('show');
            });
        });
        $(document).ready(function(){

        });
        // Autosearch Start
        $( function() {
            var availableTags = [];
            $.ajax({
                url: '/properties/autocomplete',
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
