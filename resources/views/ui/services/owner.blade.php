@extends('ui.layouts.app')

@section('custom-css')
    <title>{{ __('app.owner_services') }}</title>
@php
    if($OwnerService ){
    $meta_descr = strip_tags($OwnerService->content);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
}
    
@endphp
<meta name="description" content="{{$meta_descr or ''}}">
<meta name="keywords" content="{{$metakey or ''}}">

    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">

    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/owl.carousel.min.css")}}>

    <link rel="stylesheet" href={{asset("ui/css/thumbnail-slider.css")}}  media="screen">
    <script src="https://kit.fontawesome.com/bce09a172b.js"></script>
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
    <!-- Custom CSS End -->
@endsection


@section('content')

@php
    $lang1 =  App::getLocale();
@endphp

    <div class="wrapper">
        <div class="about-page-banner">
            <img src={{asset("images/ownerService-cover-images/". $OwnerService->cover_image)}} alt="" />
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading">
                    <input type="hidden" name="post_id" id="post_id" value="{{$OwnerService->id}}">
            <input type="hidden" name="post_img" id="post_img" value={{asset("images/post-cover-images/". $OwnerService->cover_image)}}><a href="javascript:history.back()"><svg width="18px" height="17px" viewBox="0 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="prev" transform="translate(8.500000, 8.500000) scale(-1, 1) translate(-8.500000, -8.500000)">
                  <polygon class="arrow" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <polygon class="arrow-fixed" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <path d="M-1.48029737e-15,0.56157424 L-1.48029737e-15,16.1929159 L9.708,8.33860465 L-2.66453526e-15,0.56157424 L-1.48029737e-15,0.56157424 Z M1.33333333,3.30246869 L7.62533333,8.34246869 L1.33333333,13.4327013 L1.33333333,3.30246869 L1.33333333,3.30246869 Z"></path>
              </g>
            </svg></a>@lang('app.owner_services')

                </span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content" id="inner-blog-content">
                                  @if(\Lang::has('ownerServiceDesc.ownerService_description_'.$OwnerService->id))
                                    {!! trans('ownerServiceDesc.ownerService_description_'.$OwnerService->id) !!}
                                @else
                                    {!! $OwnerService->content !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
    <!-- Bootstrap JS Start -->
    
    <script src={{asset("ui/js/jquery-library.js")}}></script>
    <script src={{asset("ui/js/popper.min.js")}}></script>
    <script src={{asset("ui/js/bootstrap.min.js")}}></script>
    <!-- <script src={{asset("ui/js/owl.carousel.min.js")}}></script> -->
    <!-- <script src={{asset("ui/js/thumbnail-slider.js")}}></script> -->
        <script>
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
