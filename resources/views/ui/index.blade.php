@extends('ui.layouts.app')

@php

  $lang1 =Session::get('language');

  if($meta_tags){

      $meta_title = $meta_descr = $metakey = '';

    if($lang1 == 'en'){

      $meta_title = $meta_tags->meta_title;

      $meta_descr = substr($meta_tags->meta_description,0,160);

      $metakey = preg_replace('/[[:space:]]+/', ',',$meta_tags->meta_keyword);

    }

    if($lang1 == 'de'){

      $meta_title = $meta_tags->meta_title_german;

      $meta_descr = substr($meta_tags->meta_desc_german,0,160);

      $metakey = preg_replace('/[[:space:]]+/', ',',$meta_tags->meta_keyword_german);

    }

    if($lang1 == 'it'){

      $meta_title = $meta_tags->meta_title_italian;

      $meta_descr = substr($meta_tags->meta_desc_italian,0,160);

      $metakey = preg_replace('/[[:space:]]+/', ',',$meta_tags->meta_keyword_italian);

    }

  }

@endphp

<title>{{$meta_title}}</title>

<meta name="description" content="{{$meta_descr}}">

<meta name="keywords" content="{{$metakey}}">

@section('custom-css')

    {{ Html::style('ui/css/bootstrap.min.css') }}

    {{ Html::style('ui/css/styles.css') }}

    {{ Html::style('ui/css/responsive.css') }}

    {{ Html::style('ui/css/autosearch.css') }}

    <link rel="icon" href={{asset('/ui/images/favicon.png')}} sizes="16x16" type="image/png">

    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>

     {{ Html::style('ui/css/scroll-top.css') }}

@endsection



@section('custom-js')

    {{ Html::script('ui/js/jquery-library.js') }}

    {{ Html::script('ui/js/popper.min.js') }}

    {{ Html::script('ui/js/bootstrap.min.js') }}

    {{ Html::script('ui/js/auto-search.js') }}

    {{ Html::script('ui/js/jquery.matchHeight-min.js') }}

    {{ Html::script('ui/js/jquery.jscroll.min.js') }}

    <script>

         $('ul.pagination').hide();
              $(function() {              
                $('.infinite-scroll').jscroll({
                  autoTrigger: true,
                  loadingHtml: '<img class="center-block" src="{{url('')}}/ui/images/giphy.gif" alt="Loading....." />',
                  padding: 0,
                  nextSelector: '.pagination li.active + li a',
                  contentSelector: 'div.infinite-scroll',
                  callback: function() {
                    $('ul.pagination').remove();
                  }
                });
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
            
            //for make property fav and unfav
            $('body').on('click','.heart-fav',function(e) {
                e.preventDefault();                
                var href_arrtribute            = $(this).attr('href');
                var url = "{{url('/')}}"+href_arrtribute;
                console.log(url);
                var heart_element =$(this).children().first();                
                $.ajax({
                    type : "GET",
                    url  : url,
                    data : {"_token": "{{ csrf_token() }}"},
                    success: function(response) {
                        var inputData = response.split('-');
                        console.log(response,inputData[0]);
                        if (inputData[0] == '1'){
                            heart_element.removeClass('far');
                            heart_element.addClass('fas');
                            $("#alert_message").html('This property has been added to your favourite list!');
                            $(".Session-message").show();
                            if(inputData[1]>0)
                                $('.fav_property_count').html("<i style='color: red;'>&#xf004;</i>@lang('app.your_fav_properties') ("+inputData[1]+")");
                            else
                                $('.fav_property_count').html("<i style='color: #81817b;'>&#xf004;</i>@lang('app.your_fav_properties') ("+inputData[1]+")");
                                // $('.fav_property_count').html("@lang('app.your_fav_properties') ("+inputData[1]+")");
                        } else {
                            heart_element.removeClass('fas');
                            heart_element.addClass('far');
                            $("#alert_message").html('This property has been removed from your favourite list!');
                            $(".Session-message").show();
                            if(inputData[1]>0)
                                $('.fav_property_count').html("<i style='color: red;'>&#xf004;</i>@lang('app.your_fav_properties') ("+inputData[1]+")");
                            else
                                
                                $('.fav_property_count').html("<i style='color: #81817b;'>&#xf004;</i>@lang('app.your_fav_properties') ("+inputData[1]+")");
                                // $('.fav_property_count').html("@lang('app.your_fav_properties') ("+inputData[1]+")");
                        }
                    }
                });
            });
            //

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



    </script>

<style type="text/css">
@media screen and (min-width:800px) {

.section {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    
    .section {
        z-index: 0;   
        padding: 0px 0px ;
    }
    
    .section .showSingle {
      z-index: 1;
    }
    
    .video-container {
        position:absolute;
    }
    
    .italica-view.showSingle {
        position: relative;
    }
    
    .showSingle.first-img {
        top:12%;
        left: 56%;
    }
    
    .showSingle.second_img {
        top:8%;
        left: 52%;
    }
    
    .third_img {
        top: -1.5%;
        left: 42.5%;
    }
    
    .showSingle.fourth_img {
        top: 21.5%;
        left: 30.6%;
    }
    
    .showSingle.fifth_img {
        top: -28%;
        left: 5%;
    }
    
    .showSingle.sixth_img {
        top: 1%;
        left: 12%;
    }
    
    .showSingle.seventh_img {
        top: -6.8%;
        left: 2%;
    }
    
    .showSingle.eight_img {
        top:-13%;
        right: 8%;
    }
    
    
    .showSingle.nineth_img {
        top:-18%;
        right: 11%;
    }
    
    .showSingle.tenth_img {
        top:-32%;
        right: 16%;
    }
    
    .showSingle.twelveth_img {
        top:-28%;
        left: -42%;
    }
    
    
    .showSingle.thirteenth_img {
        top:-15%;
        left: -47%;
    }
    
    .showSingle.fourteenth_img {
        top:4%;
        left: -54.1%;
    }
    
    .showSingle.fiftheen_img {
        top:12%;
        left:-59%;
    }
    
}




@media only screen and (max-device-width: 600px) {

.section {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    
    .section {
        z-index: 0;   
        padding: 0px 0px ;
    }
    
    .section .showSingle {
      z-index: 1;
    }
    
    .video-container {
        position:absolute;
    }
    
    .italica-view.showSingle {
        position: relative;
    }
    
    .showSingle.first-img {
        top:8%;
        left: 56%;
    }
    
    .showSingle.second_img {
        top:7%;
        left: 53%;
    }
    
    .third_img {
        top: -1.5%;
        left: 42.5%;
    }
    
    .showSingle.fourth_img {
        top: 15%;
        left: 30.6%;
    }
    
    .showSingle.fifth_img {
        top: -20%;
        left: 5%;
    }
    
    .showSingle.sixth_img {
        top: 1%;
        left: 12%;
    }
    
    .showSingle.seventh_img {
        top: -6.8%;
        left: 2%;
    }
    
    .showSingle.eight_img {
        top:-13%;
        right: 8%;
    }
    
    
    .showSingle.nineth_img {
        top:-14%;
        right: 11%;
    }
    
    .showSingle.tenth_img {
        top:-22%;
        right: 16%;
    }
    
    .showSingle.twelveth_img {
        top: -10%;
        left:50%;
    }
    
    
    .showSingle.thirteenth_img {
        top:-15%;
        left: -47%;
    }
    
    .showSingle.fourteenth_img {
        top:4%;
        left: -54.1%;
    }
    
    .showSingle.fiftheen_img {
        top:10%;
        left:-59%;
    }
    
}


.img_resp{
    width:100%;
    height:auto;
}


</style>

<script>
    document.getElementById('vid_play').play();
</script>

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

<div class="fav-alert-box row Session-message" style="display: none;">
   <div class="col-11">
      <p class="fav-alert alert alert-class" id='alert_message'><span class="fav-alert-icon"><i class="fas fa-heart"></i></span></p>
   </div>

   <div class="col-1">
        <a href="javascript:void(0);" class="fav-alert-close"><i class="fas fa-times"></i></a>
   </div>
</div>

@section('content')

            <!-- frist-point1 Start-->
                <div class="targetDiv" id="output" style="z-index:10; position: absolute;">
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
              
              
              
            <!-- desktop -->
              <div class="section" id="section">
                 <div class="italica-view showSingle first-img" width="200" height="200" target="3" allocated_id="10" name="Campania" available_properties="@if(isset($property_count['Campania'])) {{$property_count['Campania']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image03" src={{asset("ui/images/frist-point3.png")}} height="auto" width="80%" "></image>
                    </a>
                </div>

                <div class="italica-view showSingle second_img" width="100px" height="100px" target="2" allocated_id="13" name="Basilicata" available_properties="@if(isset($property_count['Basilicata'])) {{$property_count['Basilicata']}} @else {{0}} @endif">
                    <a href="#">
                        <image id="image02" src={{asset("ui/images/frist-point2.png")}} height="auto" width="100%" ></image>
                    </a>
                </div>

                <div class="italica-view showSingle third_img" width="100px" height="100px" target="5" allocated_id="12" name="Puglia" available_properties="@if(isset($property_count['Puglia'])) {{$property_count['Puglia']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image05" src={{asset("ui/images/first-point5.png")}} height="auto" width="100%"  x="185" y="73"></image>
                    </a>
                </div>

                <div class="italica-view showSingle fourth_img" width="100px" height="100px" target="4" allocated_id="11" name="Sicilia" available_properties="@if(isset($property_count['Sicilia'])) {{$property_count['Sicilia']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image04" src={{asset("ui/images/frist-point4.png")}} height="auto" width="100%"  y="115" x="160"></image>
                    </a>
                </div>

                <div class="italica-view showSingle fifth_img" width="100px" height="100px" target="11" allocated_id="2" name="Lombardia" available_properties="@if(isset($property_count['Lombardia'])) {{$property_count['Lombardia']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image011" src={{asset("/ui/images/first-point11.png")}} height="auto" width="100%" x="84" y="17"></image>
                    </a>
                </div>

                <div class="italica-view showSingle sixth_img" width="100px" height="100px" target="6" allocated_id="10" name="Campania ( Napoli)" available_properties="@if(isset($property_count['Campania ( Napoli)'])) {{$property_count['Campania ( Napoli)']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image06" src={{asset("ui/images/first-point6.png")}} height="auto" width="100%" x="143" y="80"></image>
                    </a>
                </div>

                <div class="italica-view showSingle seventh_img" width="100px" height="50px" target="7" allocated_id="8" name="Toscana" available_properties="@if(isset($property_count['Toscana'])) {{$property_count['Toscana']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image07" src={{asset("/ui/images/first-point7.png")}} height="auto" width="100%" y="58" x="120"></image>
                    </a>
                </div>

                <div class="italica-view showSingle eight_img" width="100px" height="100px" target="8" allocated_id="6" name="Emilia Romagna" available_properties="@if(isset($property_count['Emilia Romagna'])) {{$property_count['Emilia Romagna']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image08" src={{asset("/ui/images/first-point8.png")}} height="auto" width="100%" x="107" y="54"></image>
                    </a>
                </div>

                <div class="italica-view showSingle nineth_img" width="100px" height="100px" target="9" allocated_id="5" name="Marche" available_properties="@if(isset($property_count['Marche'])) {{$property_count['Marche']}} @else {{0}} @endif">
                    <a href="#">
                    <image id="image09" src={{asset("/ui/images/first-point9.png")}}  height="auto" width="100%" y="37" x="112"></image>
                    </a>
                </div>

                <div class="italica-view showSingle tenth_img" width="100px" height="100px" target="10" allocated_id="1" name="Trentino Alto Adige" available_properties="@if(isset($property_count['Trentino Alto Adige'])) {{$property_count['Trentino Alto Adige']}} @else {{0}} @endif">
                    <a href="#">
                        <image id="image010" src={{asset("/ui/images/first-point10.png")}} height="auto" width="100%" y="8" x="125"></image>
                    </a>
                </div>

                <div class="italica-view showSingle twelveth_img" width="100px" height="100px" target="12" allocated_id="3" name="Piemonte" available_properties="@if(isset($property_count['Piemonte'])) {{$property_count['Piemonte']}} @else {{0}} @endif">
                    <a href="#">
                        <image id="image012" src={{asset("/ui/images/first-point12.png")}} height="auto" width="100%" y="18" x="56"></image>
                    </a>
                </div>

                <div class="italica-view showSingle thirteenth_img" width="100px" height="100px" target="13" allocated_id="4" name="Liguria" available_properties="@if(isset($property_count['Liguria'])) {{$property_count['Liguria']}} @else {{0}} @endif">
                    <a href="#">
                        <image id="image013" src={{asset("/ui/images/first-point13.png")}} height="auto" width="100%" x="67"></image>
                    </a>
                </div>

                <div class="italica-view showSingle fourteenth_img" width="100px" height="100px" target="14" allocated_id="3" name="Piemonte" available_properties="@if(isset($property_count['Piemonte'])) {{$property_count['Piemonte']}} @else {{0}} @endif">
                    <a href="#">
                        <image id="image014" src={{asset("/ui/images/first-point14.png")}} height="auto" width="90%" y="92" x="78"></image>
                    </a>
                </div>

                <div class="italica-view showSingle fiftheen_img" width="100px" height="100px" target="15" allocated_id="14" name="Sardegna" available_properties="@if(isset($property_count['Sardegna'])) {{$property_count['Sardegna']}} @else {{0}} @endif">
                    <a href="#">
                        <image id="image015" src={{asset("/ui/images/first-point15.png")}} height="auto" width="90%" x="79" y="100"></image>
                    </a>
                </div>


                <!-- video -->
                <div class="video-container" style="width:100%;">
                    <video id="vid_play" width="100%" height="auto" controls muted autoplay loop playsinline  >
                        <source id="mp4_src" src="{{url('')}}/video/Homepage_V2_FULL.mp4" type="video/mp4" >
                        <source id="mp4_src" src="{{url('')}}/video/Homepage_V2_FULL.ogg" type="video/ogg" >
                        Your browser does not support the video tag.
                    </video>
                </div>
            <!-- desktop -->
        </div>

        <div class="banner-inner-content" style="margin-top:-50px;">

            <div class="main-container-wrapper" >

                <div class="scroll-down-section bounce">

                    <a href="#scrolldown"><img src="https://www.italicahomes.com/ui/images/scroll-down.png"><span>Scroll Down</span></a>

                </div>

                <div class="search-bar-section"><span>VILLAS <i>AND</i> HOUSES <i>FOR SALE IN</i></span>

                    <abbr>ITALY AND TUSCANY</abbr>

                </div>

                <div class="search-bar-form">

                    <form action="{{url('')}}/{{ __('route.search') }}" method="POST" class="home-search-form">

                         {{ csrf_field() }}

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

                            <input class="home-search-btn" type="submit" value="@lang('app.search')">

                        </span>

                    </form>

                </div>

            </div>

        </div>



    <!-- Added Properties Start -->

    <div class="wrapper" id="scrolldown">

        <div class="properties-banner">

            <div class="main-container-wrapper">

                <span class="main-heading">@lang('app.recently_added_properties')</span>

                <div class="wrapper infinite-scroll">

                    <div class="row">

                        @foreach($properties as $property)

                            <div class="col-md-4">

                                <div class="properties-list-wrapper home-pro equal-height">

                                    <div class="properties-pic-section">

                                        <span><a href=" {{url('')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}" class=""><img src={{asset("/images/cover-images/".$property->cover_image_name)}}></a></span>

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

                                     <a href="{{url('')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}" class="properties-link">@lang('app.read_more')</a>

                                </div>

                            </div>

                        @endforeach

                         {{$properties->links()}}

                    </div>

                   <!--  <div class="properties-view-all">

                        <a href="/{{ __('route.search') }}">@lang('app.view_all')</a>

                    </div> -->

                </div>

            </div>

        </div>

    </div>

    </div>

    <!-- Added Properties End -->

    <!-- Services Start -->

<!--    <div class="wrapper">

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

    </div>-->

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

                                <a href="/{{ __('route.about_us') }}">@lang('app.read_more')</a>

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

<script>
    document.getElementById('vid_play').play();
</script>