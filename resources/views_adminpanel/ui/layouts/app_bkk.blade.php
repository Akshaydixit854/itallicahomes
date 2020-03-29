<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- ('custom-meta') -->
    <!-- Required meta tags Start -->
    <title>Italica</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    @yield('custom-css')
</head>
<body>
<div class="wrapper">
    <!-- Header Start -->
    <header>
        <div class="top-header-nav">
            <div class="main-container-wrapper">
                <div class="col-md-12">
                    <div class="top-header-menu">
                        <ul class="top-notice">
                            <li><a href="/myfavourite"><i>&#xf004;</i>@lang('app.your_fav_properties') ({{(new \App\Services\PropertyService)->getFavCount()}})</a></li>
                            @php
                                $language =  App::getLocale();
                            @endphp
                            @if($language == 'en')
                                <li><a href="http://italicarentals.com" target="_blank">@lang('app.holiday_villas')</a></li>
                                <li><a href="http://livingart-online.com" target="_blank">@lang('app.luxury_properties')</a></li>
                            @elseif($language == 'it')
                                <li><a href="http://it.italicarentals.com" target="_blank">@lang('app.holiday_villas')</a></li>
                                <li><a href="http://livingart-online.com" target="_blank">@lang('app.luxury_properties')</a></li>
                            @elseif($language == 'de')
                                <li><a href="http://de.italicarentals.com" target="_blank">@lang('app.holiday_villas')</a></li>
                                <li><a href="http://livingart-online.com" target="_blank">@lang('app.luxury_properties')</a></li>
                            @else
                                <li><a href="http://italicarentals.com" target="_blank">@lang('app.holiday_villas')</a></li>
                                <li><a href="http://livingart-online.com" target="_blank">@lang('app.luxury_properties')</a></li>
                            @endif

                            <li><a href={{url('/legal_notice')}}>@lang('app.legal_notice')</a></li>
                            <li><a href={{url('/terms_and_conditions')}}>@lang('app.terms_conditions')</a></li>
                        </ul>
                        <ul class="top-social-icon">
                            <li><a target="_blank" href="https://www.facebook.com/italicahomes/"
                                   class="facebook-icon-color">&#xf082;</a></li>
                            <li><a target="_blank" href="https://plus.google.com/109250640606041825381" class="google-icon-color">&#xf0d4;</a></li>
                            <li><a  target="_blank" href="https://twitter.com/livingartIT" class="twitter-icon-color">&#xf081;</a></li>
                        </ul>
                        <ul class="language-list">


                            <li ><a href="/locale/en" style="@if(Config::get('app.locale') == 'en') {{'color:green'}} @endif"><img src={{asset("/ui/images/english.png")}}>@lang('app.english')</a></li>
                            <li><a href="/locale/it" style="@if(Config::get('app.locale') == 'it') {{'color:green'}} @endif"><img src={{asset("/ui/images/italian.png")}}>@lang('app.italian')</a></li>
                            <li><a href="/locale/de" style="@if(Config::get('app.locale') == 'de') {{'color:green'}} @endif"><img src={{asset("/ui/images/german.png")}}>@lang('app.german')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-wrapper">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-2 responsive-logo">
                        <a href={{route('home')}} class="logo"><img src={{asset("/ui/images/logo.png")}} /></a>
                    </div>
                    <div class="col-md-10 responsive-menu">
                        <div id="menuBtn" class="">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul class="menu-list">
                            <li class="{{ $active == 'home' ? 'active' : '' }}">
                                <a href={{route("home")}}><i>&#xf015;</i>{{trans('app.home')}}</a>
                            </li>
                            <li class="{{ $active == 'about' ? 'active' : '' }}">
                                <a href={{route('about')}}><i>&#xf0b1;</i>@lang('app.about_us')</a>
                            </li>
                            <li class="{{ $active == 'property' ? 'active' : '' }}">
                                <a href="#"><i>&#xf1ad;</i>@lang('app.properties')</a>
                                <ul>
                                    <li>
                                        <a href={{route('search')}}>@lang('app.view_all_properties')</a>
                                    </li>
                                    <li><a href={{url('search/2')}}>@lang('app.properties_for_rent')</a></li>
                                    <li><a href={{url('search/1')}}>@lang('app.properties_for_sale')</a></li>
                                    <li><a href={{url('search/3')}}>@lang('app.properties_for_rent_sale')</a></li>
                                    <li><a href={{route('category-property')}}>@lang('app.type_of_properties')</a></li>
                                    <li>
                                        <a href={{route('category-property')}}>@lang('app.all_categories')</a>
                                        <ul>
                                            @php
                                                $propertyTypes = (new \App\Services\PropertyService)->propertyType();
                                            @endphp
                                                @foreach ($propertyTypes as $propertyType)
                                                    
                                                    @php
                                                        $language =  App::getLocale();
                                                        if($language == 'en'){
                                                            $property_type_name = $propertyType->type_name;
                                                        }elseif($language == 'it'){
                                                            $property_type_name = $propertyType->name_italian;
                                                        }elseif($language == 'de'){
                                                            $property_type_name = $propertyType->name_german;
                                                        }
                                                    @endphp
                                                    <li><a href={{url('search/type/'.$propertyType->id)}}>{{$property_type_name}}</a></li>
                                                @endforeach


                                        </ul>
                                    </li>
                                    <li><a href={{route('destinations')}}>@lang('app.destination')</a></li>
                                </ul>
                            </li>
                            <li class="{{ $active == 'blog' ? 'active' : '' }}">
                                <a href={{route('blog')}}><i>&#xf02d;</i>@lang('app.blog')</a>
                            </li>
                            <li class="{{ $active == 'faq' ? 'active' : '' }}">
                                <a href={{url('faq/0')}}><i>&#xf27a;</i>@lang('app.faq')</a>
                            </li>
                            <li class="{{ $active == 'contact' ? 'active' : '' }}">
                                <a href={{route('contact')}}><i>&#xf2b9;</i>@lang('app.contact')</a>
                            </li>
                            <li>
                                <a href={{route('destinations')}}>@lang('app.destinations')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
@yield('content')
<!-- Footer Start -->
    <footer>
        <div class="footer-main-banner">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href={{route('home')}} class="footer-logo"><img
                                    src={{asset("/ui/images/footter-logo.png")}} alt="logo"></a>
                        <ul class="footer-menu-list">
                            <li>
                                <p>@lang('app.foot_para')</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span>@lang('app.quick_links')</span>
                            </li>
                            <li>
                                <span><a href={{route('about')}}>@lang('app.about_us')</a></span>
                            </li>
                            <li>
                                <span><a href={{route('search')}}>@lang('app.properties')</a></span>
                            </li>
                            <li>
                                <span><a href={{route('destinations')}}>@lang('app.destinations')</a></span>
                            </li>
                            <li>
                                <span><a href="/new_arrivals">@lang('app.new_arrival')</a></span>
                            </li>
                            <li>
                                <span><a href="/special_offer">@lang('app.special_offer')</a></span>
                            </li>
                            <li>
                                <span><a href="/myfavourite">@lang('app.your_fav_properties')</a>({{(new \App\Services\PropertyService)->getFavCount() }})</span>
                            </li>
                            <li>
                                <span><a href={{route('blog')}}>@lang('app.blog')</a></span>
                            </li>
                            <li>
                                <span><a href={{route('faq')}}>@lang('app.faq')</a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span>@lang('app.registered_office')</span>
                            </li>
                            <li>
                                <span>Schömerweg 14 94060 Pocking/Germany</span>
                            </li>
                            <li>
                                <span class="pt12">@lang('app.tel') +49 08538 2659988</span>
                            </li>
                            <li>
                                <span class="pt12">@lang('app.fax') +49 0821 9998501223</span>
                            </li>
                            <li>
                                <span class="pt12"><a href="#">info@italica.de</a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span>@lang('app.service_office_italy')</span>
                            </li>
                            <li>
                                <span>via degli Olmi 31 54100 Massa/Italy</span>
                            </li>
                            <li>
                                <span class="pt12">@lang('app.tel') +39 0585 807818</span>
                            </li>
                            <li>
                                <span class="pt12">@lang('app.fax') +39 0585 807 818</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <ul class="social-media-link">
                            <li>
                                <span>@lang('app.get_in_touch')</span>
                            </li>
                            <li><a href="https://www.facebook.com/italicahomes/">&#xf082;</a></li>
                            <li><a href="#">&#xf16d;</a></li>
                            <li><a href="https://twitter.com/livingartIT">&#xf081;</a></li>
                            <li><a href="https://www.facebook.com/italicahomes/">&#xf0d4;</a></li>
                            <li><a href="#">&#xf08c;</a></li>
                            <li><a href="#">&#xf167;</a></li>
                            <li><a href="#">&#xf17e;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper">
                    <ul class="footer-menu-home-list">
                        <li>
                            <a href="{{url('/privacy_policy')}}">@lang('app.privacy_policy')</a>
                        </li>
                        <li>
                            <a href={{url('/terms_and_conditions')}}>@lang('app.terms_use')</a>
                        </li>
                        <li>
                            <a href={{url('/legal_notice')}}>@lang('app.legal_notice')</a>
                        </li>
                        <li>
                            <a href={{route('contact')}}>@lang('app.contact_us')</a>
                        </li>
                        <li>
                            <a href="#">@lang('app.site_map')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-copy-right-block">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <span class="copy-right-text">Copyright &copy; 2018 Italica Homes. All Rights Reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
</div>
@yield('custom-js')
{{ Html::script('ui/js/jquery.matchHeight-min.js') }}
<script>
$(function() {
      $('.equal-height').matchHeight({
           byRow: true,
           property: 'height'
      });
});
</script>
</body>
</html>
