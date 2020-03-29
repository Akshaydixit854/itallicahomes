@extends('ui.layouts.app')

@section('custom-css')
    <title>{{$destination->destination_name}}</title>
@php
    if($destination){
    $meta_descr = strip_tags($destination->description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
}
@endphp
<style>

div svg {
    width: 35px;
    height: 33px;
    margin: 0px 7px 6px;
  cursor: pointer;
  overflow: visible;
}
div svg polygon, div svg path {
  transition: all 0.5s cubic-bezier(0.2, 1, 0.3, 1);
}
div svg:hover polygon, div svg:hover path {
  transition: all 1s cubic-bezier(0.2, 1, 0.3, 1);
  fill: #FF4136;
}
div svg:hover .arrow {
  animation: arrow-anim 2.5s cubic-bezier(0.2, 1, 0.3, 1) infinite;
}
div svg:hover .arrow-fixed {
  animation: arrow-fixed-anim 2.5s cubic-bezier(0.2, 1, 0.3, 1) infinite;
}

@keyframes arrow-anim {
  0% {
    opacity: 1;
    transform: translateX(0);
  }
  5% {
    transform: translateX(-0.1rem);
  }
  100% {
    transform: translateX(1rem);
    opacity: 0;
  }
}
@keyframes arrow-fixed-anim {
  5% {
    opacity: 0;
  }
  20% {
    opacity: 0.4;
  }
  100% {
    opacity: 1;
  }
}

</style>
<meta name="description" content="{{$meta_descr or ''}}">
<meta name="keywords" content="{{$metakey or ''}}">

    <meta property="fb:app_id" content="2346017678815971" />
    <meta property="og:title" content="@if(\Lang::has('destination.destination_title_'.$destination->id))
                                            {!! trans('destination.destination_title_'.$destination->id) !!}
                                        @else
                                            {!! $destination->destination_name !!}
                                        @endif">
    <meta property="og:site_name" content="http://www.italicahomes.com">
    <meta property="og:url" content="{{url('/destination/'.$destination->id)}}">
    <meta property="og:description" content="@if(\Lang::has('destination.destination_description_'.$destination->id))
                                                <span>{!! trans('destination.destination_description_'.$destination->id) !!}</span>
                                            @else
                                             {!! $destination->description !!}
                                              
                                            @endif">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset("images/destination-covers/". $destination->cover_image)}} ">
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />

    <meta name="twitter:image" content="{{asset("images/destination-covers/". $destination->cover_image)}}"/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="@if(\Lang::has('destination.destination_title_'.$destination->id))
                                            {!! trans('destination.destination_title_'.$destination->id) !!}
                                        @else
                                            {!! $destination->destination_name !!}
                                        @endif"/>
    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">

    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/owl.carousel.min.css")}}>

    <link rel="stylesheet" href={{asset("ui/css/thumbnail-slider.css")}}  media="screen">
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
    <style type="text/css">


        #inner-blog-content ul {
            list-style-type: square !important;
            padding-left: 25px;
        }
         #inner-blog-content ol {
            margin-left: 35px;
        }
        #inner-blog-content  ul li {
            list-style-type:disc;
        }
     
    </style>
    <!-- Custom CSS End -->
@endsection


@section('content')
@php
$lang1 =  App::getLocale();
                                $single_dest='';
                                        {{ $desti = __('app.destination'); }}
                                        if($desti == 'Destination'){
                                            $single_dest = 'destinations'; 
                                        }elseif ($desti == 'Ort') {
                                            $single_dest = 'ort';
                                        }elseif ($desti == 'Luoghi') {
                                            $single_dest = 'luoghi';
                                        } 
                                       
                                        $sprint ='';
                                        {{ $pr = __('app.print'); }}
                                        if($pr == 'Print'){
                                            $sprint = 'print'; 
                                        }elseif ($pr == 'Drucken') {
                                            $sprint = 'drucken';
                                        }elseif ($pr == 'Stampare') {
                                            $sprint = 'stampare';
                                        }

@endphp
    <div class="wrapper">
         <input type="hidden" name="prope_id" id="prope_id" value="{{$destination->id}}">
            <input type="hidden" name="prop_img" id="prop_img" value="{{asset("images/destination-covers/". $destination->cover_image)}}">
        <div class="about-page-banner">
            <img src={{asset("images/destination-covers/". $destination->cover_image)}} alt={{$destination->destination_name}} />
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading"><a href="javascript:history.back()"><svg width="18px" height="17px" viewBox="0 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="prev" transform="translate(8.500000, 8.500000) scale(-1, 1) translate(-8.500000, -8.500000)">
                  <polygon class="arrow" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <polygon class="arrow-fixed" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <path d="M-1.48029737e-15,0.56157424 L-1.48029737e-15,16.1929159 L9.708,8.33860465 L-2.66453526e-15,0.56157424 L-1.48029737e-15,0.56157424 Z M1.33333333,3.30246869 L7.62533333,8.34246869 L1.33333333,13.4327013 L1.33333333,3.30246869 L1.33333333,3.30246869 Z"></path>
              </g>
            </svg></a>
                    @if(\Lang::has('destination.destination_title_'.$destination->id))
                                            {!! trans('destination.destination_title_'.$destination->id) !!}
                                        @else
                                            {!! $destination->destination_name !!}
                                        @endif
                </span>
                <ul class="blog-share-section1 row">
                    <li class="col-md-6 col-6">
                        <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                        <span>{{date('d M Y',strtotime($destination->created_at))}}</span>
                    </li>
                    <li class="col-md-6 col-6">
                        <ul class="blog-icons text-right">
                            <li><a target="_blank" href="{{url(''.$single_dest.'')}}/{{$destination->id}}/{{$sprint}}">&#xf02f;</a></li>
                            <li>
                                <div style="position: relative;">
                                     <a href="#share-detail4" class="idattrlink">&#xf045;</a>
                                    <div class="share-social-media idcontainer" id="share-detail4" style="display:none;">
                                        <div class="share-block-header">
                                            <span>@lang('app.share')</span>
                                            <abbr class="idcontainer-close">&#xf057;</abbr>
                                        </div>
                                        <div class="share-inner-content">
                                            <ul class="share-social-media-icon">
                                               <li style="width: 16%;"><a href="javascript:void(0);" target="_blank" class="btnShare" lang="{{$lang1}}"><i class="fab fa-facebook-f"></i></a></li>
                                               <li><a target="_blank" href="http://twitter.com/share?text={{$destination->destination_name}}&url={{url('destination/'.$destination->id)}}"><i class="fab fa-twitter"></i></a></li>
                                               <li><a target="_blank" href="mailto:?subject={{$destination->destination_name}}&body=Check out this site {{url('/destination/'.$destination->id)}}" target="_blank"><i class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                     </div>
                                </div>
                            </li>
                            <li><a href="{{url(''.$single_dest.'')}}/{{$destination->id}}/pdf">&#xf1c1;</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content" id="inner-blog-content">
                               @if(\Lang::has('destination.destination_description_'.$destination->id))
                                                <span>{!! trans('destination.destination_description_'.$destination->id) !!}</span>
                                            @else
                                             {!! $destination->description !!}
                                              
                                            @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="demo">
                            
                          </div>
                        </div>
                    </div>
                </div>
      
 
               <!-- <a href="javascript:history.back()"><svg width="18px" height="17px" viewBox="0 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="prev" transform="translate(8.500000, 8.500000) scale(-1, 1) translate(-8.500000, -8.500000)">
                  <polygon class="arrow" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <polygon class="arrow-fixed" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <path d="M-1.48029737e-15,0.56157424 L-1.48029737e-15,16.1929159 L9.708,8.33860465 L-2.66453526e-15,0.56157424 L-1.48029737e-15,0.56157424 Z M1.33333333,3.30246869 L7.62533333,8.34246869 L1.33333333,13.4327013 L1.33333333,3.30246869 L1.33333333,3.30246869 Z"></path>
              </g>
            </svg> Back</a>-->
            </div>



        </div>
    </div>

@endsection

@section('custom-js')
    <!-- Bootstrap JS Start -->
    <script src={{asset("ui/js/jquery-library.js")}}></script>
    <script src={{asset("ui/js/popper.min.js")}}></script>
    <script src={{asset("ui/js/bootstrap.min.js")}}></script>
    <script src={{asset("ui/js/owl.carousel.min.js")}}></script>
    <script src={{asset("ui/js/thumbnail-slider.js")}}></script>

    <script type="text/javascript">
         window.fbAsyncInit = function(){
            FB.init({
                appId: '2346017678815971',
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
            var obj = {method: 'feed',link: url, picture: image,name: title,description: desc};
            console.log(obj);
            function callback(response){}
            FB.ui(obj, callback);
        }

        $('.btnShare').click(function(){
            var lang1 = $(this).attr('lang');
            var URL ='';
            if(lang1 == 'en' ){
                var URL = "{{url('')}}/destination/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destination->id))) }}";
            }else {

            var URL = "{{url('')}}/"+lang1+"/{{$single_dest}}/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destination->id))) }}";
            }
            var prop_id = $('#prope_id').val();
            var img = $('#prop_img').val(); 

            var vtitle='share property title';
            var vhref =URL;
            var vimage = img;
            var vdescription ='Property details';
            postToFeed(vtitle, vdescription, vhref ,vimage );
            return false;
        });
    </script>
    <script>
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
                    auto:true,
                    loop:true,
                    autoWidth : false,
                    onSliderLoad: function() {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
                });
               count++;
           });
        });
        // Share blog Start
        $(document).ready(function () {
            var tdiv = $('.idcontainer')
            tdiv.hide();
            $('.idattrlink').click(function (event) {
                event.preventDefault();
                var targetDiv = $($(this).attr('href'));
                $('.idattrlink').removeClass("active");
                if (targetDiv.css("display") == "none") {
                    tdiv.hide();
                    $(this).addClass("active");
                    targetDiv.slideDown();
                }
                else {
                    tdiv.slideUp();
                    $(this).removeClass("active");
                }
            });
            $('.idcontainer-close').click(function (e) {
                $('.idcontainer').slideUp(300);
                $('.idattrlink').removeClass('active');
            });
        })
        // Share blog End
        // Responsive Menu  Start
        $(document).on('ready', function () {
            $(".menu-list li ul").before("<i class='sub-menu-icon'> &#xf0dd; </i>");
            $('#menuBtn').click(function () {
                $('#menuBtn').toggleClass('open');
                $('.menu-list').toggleClass('menuvisible');
            });
            $(".menu-list li i").click(function (e) {
                $(this).next("ul").slideToggle();
            });
        });
        // Responsive Menu  Start
    </script>
@endsection
