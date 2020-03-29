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
    <!-- Properties Slider Start -->
    <link rel="stylesheet" href={{asset("ui/css/flexslider.css")}} type="text/css" media="screen" />
    <!-- Properties Slider End -->
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
@endsection


@section('content')
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src={{asset("ui/images/destination_banner.jpg")}} alt="banner" />
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- Destinations Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper remove-box-shadow">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.type_of_properties')<p>@lang('app.category_report')</p></span>
                <div class="destinations-list-wrapper">
                    <div class="row">
                        @foreach($propertyTypes as $propertyType)
                        <div class="col-md-12">
                            <div class="properties-type-wrapper">
                                <div class="properties-type-main">
                                    <div class="properties-type-inner-wrapper">
                                        <div class="houses-properties" style="background: {{$propertyType->ui_color}}">
                                            <div class="houses-properties-inner equal-height">
                                                <span class="{{$propertyType->ui_icon}} houses-properties-icon" style="color: {{$propertyType->ui_color}}"></span>
                                                <div class="properties-slider-wrapper">
                                                    <div class="properties-slider">
                                                        <div class="flexslider">
                                                            <ul class="slides custom-properties-slider">
                                                                @php
                                                                    $services = (new \App\Services\PropertyService)->property_type_images($propertyType->id);
                                                                @endphp
                                                                @foreach($services as $service)
                                                                <li>
                                                                    <img src={{asset("/images/cover-images/".$service->image)}}>
                                                                </li>
                                                            @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="properties-des">
                                                        <span style="color: {{$propertyType->ui_color}}">
                                                            @if(App::isLocale('en'))
                                                                {{$propertyType->type_name}}
                                                            @elseif(App::isLocale('it'))
                                                                {{$propertyType->name_italian}}
                                                            @elseif(App::isLocale('de'))
                                                                {{$propertyType->name_german}}
                                                            @endif
                                                        </span>
                                                        <p>
                                                            @if(App::isLocale('en'))
                                                                {{$propertyType->description}}
                                                            @elseif(App::isLocale('it'))
                                                                {{$propertyType->content_italian}}
                                                            @elseif(App::isLocale('de'))
                                                                {{$propertyType->content_german}}
                                                            @endif
                                                        </p>
                                                        <form action="/search" method="POST">
                                                            {{csrf_field()}}
                                                            <input type="submit" class="pro-ser-btn" value="@lang('app.search')">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="houses-properties-img equal-height">
                                            <div class="houses-properties-img-display">
                                                <img src={{asset("ui/images/properties-img.jpg")}} >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destinations End -->
@endsection

@section('custom-js')
    <!-- Bootstrap JS Start -->
    <script src={{asset("ui/js/jquery-library.js")}}></script>
    <script src={{asset("ui/js/popper.min.js")}}></script>
    <script src={{asset("ui/js/bootstrap.min.js")}}></script>

    <!-- Properties Slider Start -->
    <script src={{asset("ui/js/jquery.flexslider.js")}}></script>

    <script type="text/javascript">
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav:false,
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
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
