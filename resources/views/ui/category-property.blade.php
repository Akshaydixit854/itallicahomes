@extends('ui.layouts.app')

@section('custom-css')
        <title>{{ __('app.type_of_properties')}}</title>
@php
if($propertyTypes && sizeof($propertyTypes)>0){
    $meta_descr = strip_tags($propertyTypes[0]->description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
    
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
    <!-- Properties Slider Start -->
    <link rel="stylesheet" href={{asset("ui/css/flexslider.css")}} type="text/css" media="screen" />
    <!-- Properties Slider End -->
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
    {{ Html::style('ui/css/font-awesome.css') }}
    {{ Html::style('ui/css/scroll-top.css') }}
<!--     <style type="text/css">
        body { background-color: #f2f2f2; }
#flexslider-carousel {
  margin: 0 auto;
  width: 300px;
  height: 453px;
}
.flex-next, .flex-prev { height: 46px !important; }
    </style> -->
    <style type="text/css">
        .flexslider .slides img {
        height: 208px;
}
    </style>
@endsection


@section('content')
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src={{asset("ui/images/destination_banner.jpg")}} alt="banner" />
        </div>
    </div>
@php
 $lang1 =Session::get('language');
    $srch='';
        {{ $search = __('app.search'); }}
       
        if($search == 'Search'){
            $srch = 'search'; 
        }elseif ($search == 'Suchen') {
            $srch = 'suchen';
        }elseif ($search == 'Cerca') {
            $srch = 'cerca';
        }
@endphp
    <!-- Banner Section End -->
    <!-- Destinations Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper remove-box-shadow">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.type_of_properties')<p>@lang('app.category_report') {{$propertyTypeCount}} @lang('app.subcategories')</p></span>
                <div class="destinations-list-wrapper">
                    <div class="infinite-scroll">     
                    <div class="row">
                        @foreach($propertyTypes as $propertyType)
                       <!--  @if($propertyType->ui_color == null)
                            $propertyType->ui_color ='fas fa-house-damage';
                        @endif -->
                        <div class="col-md-12">
                            <div class="properties-type-wrapper">
                                <div class="properties-type-main">
                                    <div class="properties-type-inner-wrapper">
                                        <div class="houses-properties" style="background: {{$propertyType->ui_color}}">
                                            <div class="houses-properties-inner equal-height">
                                                <span class="{{$propertyType->ui_icon}} houses-properties-icon" style="color: {{$propertyType->ui_color}}"></span>
                                                <div class="properties-slider-wrapper">
                                                    <div class="properties-slider">
                                                                @php   
                                                                    $services = (new \App\Services\PropertyService)->property_type_images($propertyType->id);
                                                                @endphp
                                                        <div class="flexslider" id="flexslider">
                                                            <ul class="slides custom-properties-slider">
                                                                @foreach($services as $service)
                                                                <li>
                                                                    <img src={{asset("/images/cover-images/".$service->image)}}>
                                                                </li>
                                                            @endforeach
                                                            </ul>
                                                        </div>
                                                            <div id="flexslider-carousel" class="flexslider">
                                                            <ul class="slides">
                                                                 @foreach($services as $service)                                                
                                                            <li>
                                                                <img src="{{url('')}}/images/cover-images/{{$service->image}}" />
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
                                                        @if($lang1 =='en')
                                                              <a class="btn btn-lg pro-ser-btn"  href="{{url('')}}/search/type/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id))) }}" >@lang('app.search')</a>
                                                        @else
                                                            <a class="btn btn-lg pro-ser-btn"  href="{{url(''.$lang1.'')}}/{{$srch}}/type/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id))) }}" >@lang('app.search')</a>

                                                        @endif
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
                        {{ $propertyTypes->links()}}
                    </div>
                    </div>
                </div>
            </div>
             <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

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
            $(function() {
                $('#flexslider-carousel.flexslider').flexslider({
                animation: 'slide'
                });
            });

    </script>
  <!--   <script type="text/javascript">
        $(window).load(function(){
            alert('window load');
            $('#flexslider').flexslider({
                animation: "slide",
               /* controlNav:false,*/
                start: function(slider){
                    console.log('dsadad');
                   /* $('body').removeClass('loading');*/
                }
            });
        });
    </script> -->
    <!-- Properties Slider End -->
    {{ Html::script('ui/js/scroll_top.js') }}
    {{ Html::script('ui/js/jquery.jscroll.min.js') }}
            <script type="text/javascript">
              $('ul.pagination').hide();
              $(function() {              
                $('.infinite-scroll').jscroll({
                  autoTrigger: true,
                  loadingHtml: '<img class="center-block" src="{{url('')}}/ui/images/giphy.gif" alt="Loading....." />',
                  padding: 0,
                  nextSelector: '.pagination li.active + li a',
                  contentSelector: 'div.infinite-scroll',
                  callback: function() {
                    $('#flexslider-carousel.flexslider').flexslider({
                    animation: 'slide'
                    });
                    $('ul.pagination').remove();
                  }
                });
            });
            </script>
   
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
