@extends('ui.layouts.app')

@section('custom-css')

   <title>{{ __('app.legal_notice') }}</title>
@php
  {{ $vprop = __('app.legal_notice'); }}

    $meta_descr = strip_tags($vprop);
    $meta_descr1= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr1);
@endphp
<meta name="description" content="{{$meta_descr1 or ''}}">
<meta name="keywords" content="{{$metakey or ''}}">
    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <!-- Custom CSS End -->
@endsection


@section('content')
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src={{asset("ui/images/destination_banner.jpg")}} alt="banner"/>
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- FAQ Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper remove-box-shadow">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.legal_notice')<p></p></span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-us-content">
                                @if($legal_notice)
                                    @if(Config::get('app.locale') == 'en')
                                        {!! $legal_notice->legal_notice !!}
                                    @elseif(Config::get('app.locale') == 'it')
                                        {!! $legal_notice->italian !!}
                                    @elseif(Config::get('app.locale') == 'de')
                                        {!! $legal_notice->german !!}
                                    @else
                                        {!! $legal_notice->legal_notice !!}
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Start End -->
@endsection


@section('custom-js')
    <!-- Bootstrap JS Start -->
    <script src={{asset("ui/js/jquery-library.js")}}></script>
    <script src={{asset("ui/js/popper.min.js")}}></script>
    <script src={{asset("ui/js/bootstrap.min.js")}}></script>
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
