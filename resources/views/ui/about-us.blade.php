@extends('ui.layouts.app')

@section('custom-css')
    <title>{{ __('app.about_us') }}</title>
@php
  {{ $vprop = __('app.about_us_para1'); }}

    $meta_descr = strip_tags($vprop);
    $meta_descr1= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr1);
@endphp
<meta name="description" content="{{$meta_descr1 or ''}}">
<meta name="keywords" content="{{$metakey or ''}}">


    {{ Html::style('ui/css/bootstrap.min.css') }}
    {{ Html::style('ui/css/styles.css') }}
    {{ Html::style('ui/css/responsive.css') }}
    {{ Html::style('ui/css/owl.carousel.min.css') }}
    {{ Html::style('ui/css/custom.css') }}
    {{ Html::style('ui/css/font-awesome.css') }}
    {{ Html::style('ui/css/scroll-top.css') }}
    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">

@endsection

@section('custom-js')
    {{ Html::script('ui/js/jquery-library.js') }}
    {{ Html::script('ui/js/popper.min.js') }}
    {{ Html::script('ui/js/bootstrap.min.js') }}
    {{ Html::script('ui/js/auto-search.js') }}
    {{ Html::script('ui/js/owl.carousel.min.js') }}
     {{ Html::script('ui/js/scroll_top.js') }}


    <script>
        // Testiminail Start
        $(document).ready(function(){
            $("#testimonial-slider").owlCarousel({
                items:1,
                itemsDesktop:[1000,1],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination:false,
                navigation:true,
                navigationText:["",""],
                autoPlay:true
            });
        });
        // Testimonial End

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

@section('content')
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src={{asset("ui/images/About-banner.png")}} alt="about" />
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- About Us Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.about_us')<p></p></span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-us-content">
                                <p>@lang('app.about_us_para1')</p>
                                <p>@lang('app.about_us_para2')</p>
                            </div>
                            <em class="content_tag_line">@lang('app.about_us_para3')</em>
                            <div class="about-us-content">
                                <p>@lang('app.about_us_para4')</p>
                                <p>@lang('app.about_us_para5')</p>
                                <p>@lang('app.about_us_para6')</p>
                                <p>@lang('app.about_us_para7')</p>
                                <p>@lang('app.about_us_para8')</p>
                                <p>@lang('app.about_us_para9')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->
    <!-- Services Start -->
    <div class="wrapper">
        <div class="services-banner">
            <div class="main-container-wrapper">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src={{asset("ui/images/skyline.png")}} alt="skyline"/></span>
                                <abbr>@lang('app.real_estate_appraisal')</abbr>
                                <p>@lang('app.real_estate_pleased')</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src={{asset("ui/images/lifebuoy.png")}} alt="lifebuoy"/></span>
                                <abbr>@lang('app.friendly_customer_support')</abbr>
                                <p>@lang('app.friendly_customer_pleased')</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src={{asset("ui/images/premium-badge.png")}} alt="premium-badge"/></span>
                                <abbr>@lang('app.premium_quality')</abbr>
                                <p>@lang('app.premium_quality_pleased')</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src={{asset("ui/images/stopwatch.png")}} alt="stopwatch"></span>
                                <abbr>@lang('app.save_time')</abbr>
                                <p>@lang('app.save_time_pleased')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
    <!-- About Us Content Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="main-heading main-heading1"><p>@lang('app.about_us_intro')</p></span>
                <div class="about-us-content-btn">
                    <a href="{{url('contact')}}">@lang('app.contact_us')</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Content End -->
    <!-- Testimonials Start -->
    <div class="wrapper">
        <div class="testimonials-wrapper">
            <div class="main-container-wrapper">
                <span class="testimonials-heading main-heading1">@lang('app.testimonials')</span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="testimonial-slider" class="owl-carousel">
                                @foreach($testimonials as $testimonial)
                                <div class="testimonial">
                                    <div class="pic">
                                        <img src="{{url('')}}/images/testimonial-covers/{{$testimonial->cover_image}}" alt="">
                                    </div>
                                    <p class="description">
                                        <i class="fas fa-quote-left pr-2"></i>{{$testimonial->description}}”
                                    </p>
                                    <h3 class="title">{{ucwords($testimonial->name)}}
                                    </h3>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
    </div>
    <!-- Testimonials End -->
@endsection
