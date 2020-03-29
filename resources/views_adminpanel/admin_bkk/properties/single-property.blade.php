@extends('ui.layouts.app')

@section('custom-css')
    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">

    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <!-- Custom CSS End -->
    <link rel="stylesheet" href={{asset("ui/css/owl.carousel.min.css")}}>

    <link rel="stylesheet" href={{asset("ui/css/thumbnail-slider.css")}}  media="screen">
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
@endsection
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
        <div class="about-page-banner">
            <img src={{asset("/images/cover-images/".$property->cover_image_name)}} alt="about" />
        </div>
        <div class="properties-view-btn">
           <a href="#"  data-toggle="modal" data-target="#view-properties-details" class="quick-btn"><i>&#xf009;</i>@lang('app.view_gallery')</a>
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper single-about-us-text-wrapper">
            <div class="main-container-wrapper">
                <ul class="single-properties-price">
                    <li>
                         <abbr>
                              @if(\Lang::has('property_offer.property_offer_title_'.$property->offer_id))
                                  {{trans('property_offer.property_offer_title_'.$property->offer_id)}}
                              @else
                                  {{(new \App\Services\PropertyService)->getOffer($property->offer_id) }}
                              @endif
                              /
                          </abbr>
                          <i>&#xf153;</i>{{number_format($property->price , 0, ',', '.')}}
                          <span>+ {{ str_replace('.',',',$property->vat) }}% @lang('app.taxmode')  </span>
                    </li>
                    {{-- <li style="margin-top: 2px;"><i><a class="heart-fav" href="/favourite/{{$property->id}}">{!! (new \App\Services\PropertyService)->checkFav($property->id) !!}</a></i></li> --}}
                    {{-- <li><a href="javascript:void(0)" class="properties-contact-page" data-toggle="modal" data-target="#myModal"><i>&#xf003;</i>@lang('app.contact')</a></li> --}}
                    <ul>
                        <div class="">
                            <div class="properties-id-block row">
                                <div class="col-md-6 col-sm-6">
                                   <h2 class="pro-tit">
                                    @if(App::isLocale('en'))
                                        {{$property->name}}
                                    @elseif(App::isLocale('it'))
                                        {{$property->name_in_italian}}
                                    @elseif(App::isLocale('de'))
                                        {{$property->name_in_german}}
                                    @endif
                                    </h2>
                                    <p class="pro-id">@lang('app.property_id'): {{$property->property_id}}</p>
                                </div>
                                 <div class="col-md-6 col-sm-6">
                                <ul class="single-properties-share text-right">
                                    <li>
                                        <a href="/property/{{$property->id}}/pdf">&#xf1c1;</a>
                                    </li>
                                    <li>
                                        <a href="#share-detail4" class="idattrlink">&#xf045;</a>
                                        <div class="share-social-media idcontainer" id="share-detail4" style="display:none;">
                                            <div class="share-block-header">
                                                <span>Share</span>
                                                <abbr class="idcontainer-close">&#xf057;</abbr>
                                            </div>
                                            <div class="share-inner-content">
                                                <ul class="share-social-media-icon">
                                                    <li style="width: 16%;"><a href="javascript:void(0)" class="btnShare"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="far fa-envelope"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/property/{{$property->id}}/print">&#xf02f;</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="calendar">&#xf073;</a>
                                        <span>{{date('F d Y', strtotime($property->created_at))}}</span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="properties-service-list">
                            <ul class="properties-list12 single-feature-list row">
                                <li>
                                    <span>{{$property->beds}}</span>
                                    <abbr>@lang('app.bedrooms')</abbr>
                                    <em>&#xf236;</em>
                                </li>
                                <li>
                                    <span>{{$property->baths}}</span>
                                    <abbr>@lang('app.baths')</abbr>
                                    <em>&#xf2cd;</em>
                                </li>
                                <li>
                                    <span>{{$property->kitchens}}</span>
                                    <abbr>@lang('app.kitchen')</abbr>
                                    <em>&#xf0f5;</em>
                                </li>
                                <li>
                                    <span>{{$property->parking}}</span>
                                    <abbr>@lang('app.parking')</abbr>
                                    <em><i class="fas fa-car"></i></em>
                                </li>
                                <li>
                                    <span>{{$property->fire_place}}</span>
                                    <abbr>@lang('app.fireplace')</abbr>
                                    <em><i class="fas fa-fire"></i></em>
                                </li>
                                <li>
                                    <span>{{$property->terrace}}</span>
                                    <abbr>@lang('app.terrace')</abbr>
                                    <em><i class="fas fa-umbrella-beach"></i></em>
                                </li>
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
                                <li>
                                    <span class="tick"><i class="@if(in_array(1,$ids)) {{'fas fa-check'}} @endif"></i></span>
                                    <abbr>@lang('app.heating')</abbr>
                                    <em><i class="fas fa-fire"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="@if(in_array(6,$ids)) {{'fas fa-check'}} @endif"></i></span>
                                    <abbr>Beach &amp; Sea</abbr>
                                    <em><i class="fas fa-umbrella-beach"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="@if(in_array(3,$ids)) {{'fas fa-check'}} @endif"></i></span>
                                    <abbr>@lang('app.swimming_pool')</abbr>
                                    <em><i class="fas fa-swimmer"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="@if(in_array(4,$ids)) {{'fas fa-check'}} @endif"></i></span>
                                    <abbr>Garden</abbr>
                                    <em><i class="fab fa-pagelines"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="@if(in_array(5,$ids)) {{'fas fa-check'}} @endif"></i></span>
                                    <abbr>Horses</abbr>
                                    <em><img src="{{asset("ui/images/horse-riding.svg")}}" class="pro-icon-img"></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="@if(in_array(2,$ids)) {{'fas fa-check'}} @endif"></i></span>
                                    <abbr>@lang('app.sea_view')</abbr>
                                    <em><img src="{{asset("ui/images/sea.svg")}}" class="pro-icon-img"></em>
                                </li>
                            </ul>
                        </div>
                        <div class="properties-des-block">
                            <span>@lang('app.description')</span>
                            @if(App::isLocale('en'))
                                {!! $property->detail_description !!}
                            @elseif(App::isLocale('it'))
                                {!! $property->detail_description_in_italian !!}
                            @elseif(App::isLocale('de'))
                                {!! $property->detail_description_in_german !!}
                            @endif
                        </div>
                        <div class="properties-des-block pb50">
                            <span>@lang('app.details')</span>
                            <ul class="properties-custome-detail">
                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>@lang('app.region')<i>
                                     @if(\Lang::has('region.region_title_'.$property->region_id))
                                         {{trans('region.region_title_'.$property->region_id)}}
                                     @else
                                         {{(new \App\Services\PropertyService)->getRegion($property->region_id) }}
                                     @endif
                                 </i></em>
                              </span>
                                </li>
                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>@lang('app.type')<i>
                                     @php
                                        $new = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                     @endphp
                                     {{ $new }}
                                 </i></em>
                              </span>
                                </li>

                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>@lang('app.condition')<i>
                                     @if(\Lang::has('condition.condition_display_name_'.$property->condition_id))
                                         {{trans('condition.condition_display_name_'.$property->condition_id)}}
                                     @else
                                         @php
                                            $new_condition = (new \App\Services\PropertyService)->condition($property->condition_id);
                                         @endphp
                                         {{ $new_condition->condition_display_name }}
                                     @endif

                                 </i></em>
                              </span>
                                </li>

                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>@lang('app.plot')<i>{{$property->plot_size}} m2</i></em>
                              </span>
                                </li>

                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>@lang('app.size')<i>{{$property->living_area}} m2</i></em>
                              </span>
                                </li>

                                 <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>@lang('app.location')<i>{{$areas->area_name}}</i></em>
                              </span>
                                </li>

                                  <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>@lang('app.destination')<i>{{$destination_name}}</i></em>
                              </span>
                                </li>

                                {{-- <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em>Exterior<i>{{$property->plot_size}}</i></em>
                              </span>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="properties-des-block pb50">
                            <span>@lang('app.ameneties')</span>
                            <ul class="properties-amenities-list">
                                @foreach($amenities as $amenity)
                                    @if(\Lang::has('ameneties.ameneties_display_name_'.$amenity['amenities']['id']))
                                        <li>{{trans('ameneties.ameneties_display_name_'.$amenity['amenities']['id'])}}</li>
                                    @else
                                        <li>{{$amenity['amenities']['amenities_display_name']}}</li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
            </div>
            <div class="">
                <div class="main-container-wrapper">
                    <div class="properties-des-block properties-border-bottom-remove">
                        <span>Map</span>
                    </div>
                </div>

                <div class="properties-map-wrapper">
                    <iframe src="https://www.google.com/maps/embed/v1/place?q={{$property->property_location_latitude}},{{$property->property_location_longitude}}&amp;key=AIzaSyAlVWqoyW0m38zUFtbQ88f3h_kYYQtc9g0" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="wrapper">
                <div class="single-about-us-banner">
                    <div class="main-container-wrapper">
                        <span class="main-heading singla-properties-heading">About
                            @if(\Lang::has('region.region_title_'.$property->region_id))
                                {{ trans('region.region_title_'.$property->region_id) }}
                            @else
                                {{(new \App\Services\PropertyService)->getRegion($property->region_id) }}
                            @endif


                        </span>
                        <div class="wrapper">
                            <div class="row">
                                @php
                                    $region_data = (new \App\Services\PropertyService)->getRegion($property->region_id,1);
                                @endphp
                                <div class="col-md-5">
                                    <div class="about-right-side-img singla-properties-img">
                                        <img src="{{asset("/images/cover-images/".$region_data->image)}}" alt="about-pic" class="responsive" />
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="about-us-content singla-properties-content">
                                        <p>
                                            @if(\Lang::has('region.region_description_'.$property->region_id))
                                                {!! trans('region.region_description_'.$property->region_id) !!}
                                            @else
                                                {{ $region_data->description }}
                                            @endif


                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Start -->
           <div class="modal fade" id="view-properties-details" role="dialog">
              <button type="button" class="btn btn-default close-btn" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <div class="modal-dialog small-model-width">
                 <div class="modal-content">
                    <div class="modal-body">
                       <div class="wrapper">
                          <div class="row">
                             <div class="col-md-12">
                                 <div class="demo">
                                   <ul id="lightSlider">
                                       @if(!$gallery_images->isEmpty())
                                           @foreach($gallery_images as $gallery_image)
                                               <li data-thumb="{{asset("/images/cover-images/".$gallery_image->image)}}">
                                                   <img src="{{asset("/images/cover-images/".$gallery_image->image)}}"/ class="gallery-img">
                                               </li>
                                           @endforeach
                                       @else
                                          <li>No Preview Available</li>
                                       @endif
                                   </ul>
                               </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        <!-- Modal Start -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-body">
                  <div class="grey-bg section">
                      <div class="container">
                          <div class="query-form-sec">
                              <h4 class="query-tit">Send Query For This Property</h4>
                              <form class="query-form" action="/property_enquiry" method="post">
                                  {{csrf_field()}}
                                  <div class="form-group">
                                      <input type="text" class="form-control name" name="name" placeholder="Your Name (required)">
                                      <input type="hidden" name="property_id" value="{{$property->id}}">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control email" name="email" placeholder="Your Email (required)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control phone" name="phone" placeholder="Your Phone (required)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control address" name="address" placeholder="Your Address (required)">
                                  </div>
                                  <div class="form-group">
                                      <textarea class="form-control message" rows="5" name="message" placeholder="Your Message"></textarea>
                                  </div>
                                  <button class="js-contact query-btn red-color">Submit Request</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- blog End -->
@endsection

@section('custom-js')
    <!-- Bootstrap JS Start -->
    <script src={{asset("ui/js/jquery-library.js")}}></script>
    <script src={{asset("ui/js/popper.min.js")}}></script>
    <script src={{asset("ui/js/bootstrap.min.js")}}></script>
    <!-- Slider Js Start -->
    <script src={{asset("ui/js/owl.carousel.min.js")}}></script>
    <script src={{asset("ui/js/thumbnail-slider.js")}}></script>
    <script src={{asset("ui/js/jquery.matchHeight-min.js")}}></script>
    <script>
          $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut();
          });
    </script>
    <!-- Slider Js Start -->
    <script>
    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        }else{
            return false;
        }
    }
    </script>
    <script>
         $(function() {
            $('.equal-height').matchHeight({
                byRow: true,
                property: 'height'
            });
        });

         $(document).ready(function() {
             var count  = 0
             $('#view-properties-details').on('shown.bs.modal', function () {
                if (count === 1) return;
                 $('#image-gallery').addClass('cS-hidden');
                     $('#lightSlider').lightSlider({
                     gallery:true,
                     item:1,
                     thumbItem:8,
                     slideMargin: 0,
                     speed:500,
                     auto:false,
                     loop:true,
                     autoWidth : false,
                     onSliderLoad: function() {
                         $('#image-gallery').removeClass('cS-hidden');
                     }
                 });
                count++;
            });
         });
     </script>
     <script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script>
    <script>
        window.fbAsyncInit = function(){
            FB.init({
                appId: '965744690218951',
                status: true,
                cookie: true,
                xfbml: true
            });
        };
        (function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if(d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id;
        js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
        ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
        function postToFeed(title, desc, url, image){
            var obj = {method: 'feed',link: url, picture: 'http://www.url.com/images/'+image,name: title,description: desc};
            function callback(response){}
            FB.ui(obj, callback);
        }

        $('.btnShare').click(function(){
            elem = $(this);
            postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));
            return false;
        });



        // Slider Start
        $(document).ready(function(){
            $('.js-contact').click(function(){
                if($('.error').length > 0){
                    $('.error').remove();
                }
                var name = $('.name').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var message = $('.message').val();
                var address = $('.address').val();
                if(name.trim() == '' || email.trim() == '' || phone.trim() == '' || address.trim() == '' || message.trim() == ''){
                    if(name.trim() == ''){
                        $('.name').after('<p class="error">Required</p>');
                    }
                    if(email.trim() == ''){
                        $('.email').after('<p class="error">Required</p>');
                    }
                    if(phone.trim() == ''){
                        $('.phone').after('<p class="error">Required</p>');
                    }
                    if(address.trim() == ''){
                        $('.address').after('<p class="error">Required</p>');
                    }
                    if(message.trim() == ''){
                        $('.message').after('<p class="error">Required</p>');
                    }
                    return false;
                }
                if(!validateEmail(email) || isNaN(phone)){
                    if(!validateEmail(email)){
                        $('.email').after('<p class="error">Invalid email</p>');
                        return false;
                    }
                    if(isNaN(phone)){
                        $('.phone').after('<p class="error">Invalid phone</p>');
                        return false;
                    }
                }
            });
            $("#testimonial-slider").owlCarousel({
                items:3,
                itemsDesktop:[1000,1],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination:false,
                navigation:true,
                navigationText:["",""],
                autoPlay:true
            });
        });
        // Slider End
        // Share blog Start
        $(document).ready(function()
        {
            var tdiv = $('.idcontainer')
            tdiv.hide();
            $('.idattrlink').click(function(event){
                event.preventDefault();
                var targetDiv = $($(this).attr('href'));
                $('.idattrlink').removeClass("active");
                if(targetDiv.css("display") == "none")
                {
                    tdiv.hide();
                    $(this).addClass("active");
                    targetDiv.slideDown();
                }
                else
                {
                    tdiv.slideUp();
                    $(this).removeClass("active");
                }
            });
            $('.idcontainer-close').click(function(e) {
                $('.idcontainer').slideUp(300);
                $('.idattrlink').removeClass('active');
            });
        })
        // Share blog End
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
