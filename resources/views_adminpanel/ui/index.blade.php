@extends('ui.layouts.app')

@section('custom-css')
    {{ Html::style('ui/css/bootstrap.min.css') }}
    {{ Html::style('ui/css/styles.css') }}
    {{ Html::style('ui/css/responsive.css') }}
    {{ Html::style('ui/css/autosearch.css') }}
    <link rel="icon" href={{asset('/ui/images/favicon.png')}} sizes="16x16" type="image/png">
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
@endsection

@section('custom-js')
    {{ Html::script('ui/js/jquery-library.js') }}
    {{ Html::script('ui/js/popper.min.js') }}
    {{ Html::script('ui/js/bootstrap.min.js') }}
    {{ Html::script('ui/js/auto-search.js') }}
    {{ Html::script('ui/js/jquery.matchHeight-min.js') }}
    <script>
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
                        availableTags.push(properties[i]['property_id']);
                    }
                }
            });
            $( "#autosearchbar" ).autocomplete({
                source: availableTags,
            });
        } );
        // Autosearch End
        // Match Height
        $(function() {
            $('.equal-height').matchHeight({
                byRow: true,
                property: 'height'
            });
        });
        // Map Start
        $(function () {
            $('.targetDiv').hide();
            $('.showSingle').mouseover(function () {

                var target = $(this).attr('target');
                var name = $(this).attr('name');
                var available_properties = $(this).attr('available_properties');
                var alloted_id = $(this).attr('allocated_id');
                var url = "{{url('/search/region')}}"+'/'+alloted_id;
                $('#go-to-property-search').attr('href',url);
                $('.property_count').text(available_properties);
                $('.property_name').text(name);
                var left, top, offsets;
                offsets = $(this).offset();
                left = offsets.left;
                top = offsets.top - 60;

                $('#output').css({position: "absolute", left: left, top: top}).show();
//const refEl = $(this);
//const popEl = document.getElementById('output');

//new Popper(refEl, popEl, {
 // placement: 'right'
//});

            });
        });

        $('.showSingle1').click(function () {
            //$('.targetDiv').hide();
            $('.targetDiv').hide();
        });
        // Scroll Down Start
        $(function () {
            $('a[href*=#]').on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top}, 1000, 'linear');
            });
        });
        // Scroll Down End
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

            $('.home-search-icon').click(function(){
                $('.home-search-form').submit();
            });
        });
        // Responsive Menu  Start
    </script>
    <script>
          $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut();
          });

$(function(){
  //  alert();
/*    var x = document.getElementById("myVideo");
        var url = "{{url('')}}/video/Homepage_V2_FULL.mp4";
  document.getElementById("mp4_src").src = url;
  x.autoplay = true;
  x.load();*/


});

/*          function myFunction() { 
} 
*/
    </script>
    <style type="text/css">
        
.section {
    position: relative;
    width: 100%;
    height: 200vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.section .showSingle {
  z-index: 1;
}


.video-container {
    position: absolute;
}


.italica-view.showSingle {
    position: relative;
  
}

.showSingle.first-img {
top: 10%;
    left: 71%;
}

.showSingle.second_img {
     top: 9%;
    left: 72%;
}

.third_img {
    bottom: 49px;
    left: 1041px;
}

.showSingle.fourth_img {
    top: 388px;
    left: 662px;
}


.showSingle.fifth_img {
   // right: 634px;
    bottom: 490px;
}

.showSingle.sixth_img {
            left: 204px;
}

.showSingle.seventh_img {
    bottom: 9%;
    /* left: 3px; */
    right: 6%;
}

.showSingle.twelveth_img {
    bottom: 29%;
    right: 60%;
}


.showSingle.eight_img {
   bottom: 162px;
    right: 414px
}

.showSingle.nineth_img {
bottom: 22%;
    right: 24%;
}

.showSingle.tenth_img {
      bottom: 33%;
    right: 24%;
}

.showSingle.thirteenth_img {
      bottom: 14%;
    right: 65%;
}




.showSingle.fourteenth_img {
   right: 77%;
    top: 7%;
}

.showSingle.fiftheen_img {
    right: 85%;
    top: 15%;
}
    </style>
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
<!-- frist-point1 Start-->
                <div class="targetDiv" id="output">
                    <div class="properties-hover-view">
                        <span><img src={{asset("/ui/images/list.png")}} /></span>
                        <abbr>
                            <i class="property_count">7568</i>
                            <em class="property_name">Villas & Houses For Sale</em>
                            <a id="go-to-property-search" href="javascript:void(0)">Click Here</a>
                        </abbr>
                        <a href="javascript:void(0)" class="showSingle1">&#xf00d;</a>
                    </div>
                </div>
                <!--frist-point1 End-->
    <div class="section">
    <div class="italica-view showSingle first-img" width="200" height="200" target="3" allocated_id="10" name="Campania" available_properties="@if(isset($property_count['Campania'])) {{$property_count['Campania']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image03" src={{asset("ui/images/frist-point3.png")}} height="150" width="235"></image>
                    </a>
                </div>
   <div class="italica-view showSingle second_img" width="100px" height="100px" target="2" allocated_id="13" name="Basilicata" available_properties="@if(isset($property_count['Basilicata'])) {{$property_count['Basilicata']}} @else {{0}} @endif">
        <a href="#">
            <image id="image02" src={{asset("ui/images/frist-point2.png")}} width="235" height="150"></image>
        </a>
    </div>
<!--     <div class="italica-view showSingle third_img" width="100px" height="100px" target="3" allocated_id="10" name="Campania" available_properties="@if(isset($property_count['Campania'])) {{$property_count['Campania']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image03" src={{asset("ui/images/frist-point3.png")}} height="26" width="34" y="93"
                           x="167"></image>
                    </a>
                </div> -->
                    <div class="italica-view showSingle third_img" width="100px" height="100px" target="5" allocated_id="12" name="Puglia" available_properties="@if(isset($property_count['Puglia'])) {{$property_count['Puglia']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image05" src={{asset("ui/images/first-point5.png")}} height="120" width="150" x="185"
                               y="73"></image>
                        </a>
                    </div>
                   <div class="italica-view showSingle fourth_img" width="100px" height="100px" target="4" allocated_id="11" name="Sicilia" available_properties="@if(isset($property_count['Sicilia'])) {{$property_count['Sicilia']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image04" src={{asset("ui/images/frist-point4.png")}} height="120" width="150" y="115"
                               x="160"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle fifth_img" width="100px" height="100px" target="11" allocated_id="2" name="Lombardia" available_properties="@if(isset($property_count['Lombardia'])) {{$property_count['Lombardia']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image011" src={{asset("/ui/images/first-point11.png")}} height="120" width="150" x="84"
                               y="17"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle sixth_img" width="100px" height="100px" target="6" allocated_id="10" name="Campania ( Napoli)" available_properties="@if(isset($property_count['Campania ( Napoli)'])) {{$property_count['Campania ( Napoli)']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image06" src={{asset("ui/images/first-point6.png")}}  height="80" width="82" x="143"
                               y="80"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle seventh_img" width="100px" height="50px" target="7" allocated_id="8" name="Toscana" available_properties="@if(isset($property_count['Toscana'])) {{$property_count['Toscana']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image07" src={{asset("/ui/images/first-point7.png")}}  height="120" width="150" y="58"
                               x="120"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle eight_img" width="100px" height="100px" target="8" allocated_id="6" name="Emilia Romagna" available_properties="@if(isset($property_count['Emilia Romagna'])) {{$property_count['Emilia Romagna']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image08" src={{asset("/ui/images/first-point8.png")}}  height="120" width="150" x="107"
                               y="54"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle nineth_img" width="100px" height="100px" target="9" allocated_id="5" name="Marche" available_properties="@if(isset($property_count['Marche'])) {{$property_count['Marche']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image09" src={{asset("/ui/images/first-point9.png")}}  height="120" width="150" y="37"
                               x="112"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle tenth_img" width="100px" height="100px" target="10" allocated_id="1" name="Trentino Alto Adige" available_properties="@if(isset($property_count['Trentino Alto Adige'])) {{$property_count['Trentino Alto Adige']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image010" src={{asset("/ui/images/first-point10.png")}} y="8"  height="120" width="150"
                               x="125"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle twelveth_img" width="100px" height="100px" target="12" allocated_id="3" name="Piemonte" available_properties="@if(isset($property_count['Piemonte'])) {{$property_count['Piemonte']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image012" src={{asset("/ui/images/first-point12.png")}}  height="120" width="150" y="18"
                               x="56"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle thirteenth_img" width="100px" height="100px" target="13" allocated_id="4" name="Liguria" available_properties="@if(isset($property_count['Liguria'])) {{$property_count['Liguria']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image013" src={{asset("/ui/images/first-point13.png")}}  height="150" width="200" 
                               x="67"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle fourteenth_img" width="100px" height="100px" target="14" allocated_id="3" name="Piemonte" available_properties="@if(isset($property_count['Piemonte'])) {{$property_count['Piemonte']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image014" src={{asset("/ui/images/first-point14.png")}}  height="120" width="150" y="92"
                               x="78"></image>
                        </a>
                    </div>
                    <div class="italica-view showSingle fiftheen_img" width="100px" height="100px" target="15" allocated_id="14" name="Sardegna" available_properties="@if(isset($property_count['Sardegna'])) {{$property_count['Sardegna']}} @else {{0}} @endif">
                        <a href="#">
                        <image id="image015" src={{asset("/ui/images/first-point15.png")}}  height="120" width="150" x="79"
                               y="100"></image>
                        </a>
                    </div>

        <div class="video-container">
        <!--     <div class="color-overlay"></div> -->
            <video autoplay loop muted controls>
                <source id="mp4_src" src="{{url('')}}/video/Homepage_V2_FULL.mp4" type="video/mp4">
    </div>
            </video>
        </div>
        <div class="banner-inner-content">
            <div class="main-container-wrapper">
                <div class="scroll-down-section bounce">
                    <a href="#scrolldown"><img src="https://www.italicahomes.com/ui/images/scroll-down.png"><span>Scroll Down</span></a>
                </div>
                <div class="search-bar-section"><span>VILLAS <i>AND</i> HOUSES <i>FOR SALE IN</i></span>
                    <abbr>ITALY AND TUSCANY</abbr>
                </div>
                <div class="search-bar-form">
                  <!--    
                         <form action="https://www.italicahomes.com/search" method="POST" class="home-search-form">

                     -->

                         <form action="https://www.italicahomes.com/search" method="POST" class="home-search-form">


                        <input type="hidden" name="_token" value="ESrLfpK1Ipmrly7xK2OPWZ9GDkzETRFzQ2SCnf1g">
                        <!-- <abbr>
                            <input type="text" name="q" placeholder="Find near by Properties" id="autosearchbar"/>
                            <input type="submit" value="Search"/>
                        </abbr> -->
                        <abbr>
                            <input type="text" name="q" placeholder="Find near by Properties" id="autosearchbar" class="ui-autocomplete-input" autocomplete="off">
                            <a href="javascript:void(0)" class="home-search-icon"></a>
                        </abbr>
                        <span>
                            <abbr><i></i></abbr>
                            <input class="home-search-btn" type="submit" value="Search">
                        </span>
                    </form>
                </div>
            </div>
        </div>


<!-- Banner Section St.mp4art -->
<!--     <div class="banner-cotent-wrapper">
 <video width="1400" height="1000" id="myVideo" controls loop>
<source id="mp4_src" type="video/mp4">
</video>

    </div> -->
    <!-- Banner Section End -->
    <!-- Added Properties Start -->
    <div class="wrapper" id="scrolldown">
        <div class="properties-banner">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.recently_added_properties')</span>
                <div class="wrapper">
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-md-4">
                                <div class="properties-list-wrapper home-pro equal-height">
                                    <div class="properties-pic-section">
                                        <span><a href="/properties/{{$property->id}}" class=""><img src={{asset("/images/cover-images/".$property->cover_image_name)}}></a></span>
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
                                            $property_ui = (new \App\Services\PropertyService)->propertySingleResourceType($property->type_id);
                                            if(isset($property_ui->ui_color)){
                                                $color = $property_ui->ui_color;
                                            }else{
                                                $color = '';
                                            }
                                        @endphp
                                        <abbr class="red-tag" style="background: {{$color}}">
                                            @php
                                                $property_type = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
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
                                        @if(\Lang::has('property.property_short_desc_'.$property->id))
                                            {{(new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$property->id),150) }}
                                        @else
                                            {{(new \App\Services\PropertyService)->truncate($property->short_description,150) }}
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
    </div>
    <!-- Added Properties End -->
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
    <!-- About Us Start -->
    <div class="wrapper">
        <div class="about-us-banner">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.about_us')</span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="about-us-content">
                                <p>@lang('app.about_us_para1')</p>
                                <p>@lang('app.about_us_para2')</p>
                                <a href="/about">@lang('app.read_more')</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="about-right-side-img">
                                <img src={{asset("ui/images/about-pic.png")}} alt="about-pic" class="responsive"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->
@endsection
