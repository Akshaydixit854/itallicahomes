<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google-site-verification" content="U7tz4WZDuVfasOYOftvEVUGJBQs7-m3NfJbX7iSeAkE" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('custom-css')
</head>
<body>
<div class="wrapper">
    <!-- Header Start -->
    <header>
        <div class="top-header-nav">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="top-header-menu">
                        <ul class="top-notice">
                                <li><a href="{{url(''.__('route.your_fav_properties').'')}}"><i @if((new \App\Services\PropertyService)->getFavCount() > 0) style="color: red;" @endif;>&#xf004;</i>@lang('app.your_fav_properties') ({{(new \App\Services\PropertyService)->getFavCount()}})</a></li>
                                <li><a href="http://italicarentals.com" target="_blank">@lang('app.holiday_villas')</a></li>
                                <li><a href="http://livingart-online.com" target="_blank">@lang('app.luxury_properties')</a></li>
                                <li><a href="{{url(''.__('route.legal_notice').'')}}">@lang('app.legal_notice')</a></li>
                                <li><a href="{{url(''.__('route.terms_conditions').'')}}">@lang('app.terms_conditions')</a></li>
                        </ul>
                        <ul class="top-social-icon">
                            <li><a target="_blank" href="https://www.facebook.com/italicahomes/"
                                   class="facebook-icon-color">&#xf082;</a></li>
                            <li><a  target="_blank" href="https://twitter.com/livingartIT" class="twitter-icon-color">&#xf081;</a></li>
                            <li><a  target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="linkedin-icon-color">&#xf08c;</a></li>
                        </ul>
                        <ul class="language-list">
                            <li>
                              <!--  @foreach(\Config::get('app.locales') as $code => $lang)
                                @if($code == 'en')
                                    <a href="/locale/en" style="@if($code == 'en') ? 'color:green': 'color:black' @endif"><img src={{asset("/ui/images/english.png")}}>{{ $lang }} </a>
                                
                                @elseif($code == 'it')
                                    <a href="/locale/it" style="@if($code == 'it') {{'color:green'}} @endif"><img src={{asset("/ui/images/italian.png")}}>{{ $lang }}</a>
                                   
                                @elseif($code == 'de')
                                    <a href="/locale/de" style="@if($code == 'de') {{'color:green'}} @endif"><img src={{asset("/ui/images/german.png")}}>{{ $lang }}</a>
                                @endif
                                @endforeach-->
                                
                                  @foreach(\Config::get('app.locales') as $code => $lang)
                                @if($code == 'en')
                                    <a href="https://www.italicahomes.com/{{request()->path()}}" style="@if($code == 'en') ? 'color:green': 'color:black' @endif"><img src={{asset("/ui/images/english.png")}}>{{ $lang }} </a>
                                
                                @elseif($code == 'it')
                                    <a href="http://www.{{$code}}.italicahomes.com/{{request()->path()}}" style="@if($code == 'it') {{'color:green'}} @endif"><img src={{asset("/ui/images/italian.png")}}>{{ $lang }}</a>
                                   
                                @elseif($code == 'de')
                                    <a href="http://www.{{$code}}.italicahomes.com/{{request()->path()}}" style="@if($code == 'de') {{'color:green'}} @endif"><img src={{asset("/ui/images/german.png")}}>{{ $lang }}</a>
                                @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-wrapper">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-1 responsive-logo" style="margin-right:17px;">
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
                                 <a href="{{url(''.__('route.about_us').'')}}"><i>&#xf0b1;</i>@lang('app.about_us')</a>
                            </li>
                              
                            <li class="{{ $active == 'property' ? 'active' : '' }}">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i>@lang('app.properties')</a>
                                <ul>
                                    <li><a href="{{url('')}}/search">@lang('app.view_all_properties')</a>
                                    </li>
                                    <li><a href="{{url('')}}//search/2">@lang('app.properties_for_rent')</a></li>
                                    <li><a href="{{url('')}}/search/1">@lang('app.properties_for_sale')</a></li>
                                    <li><a href="{{url('')}}/search/3">@lang('app.properties_for_rent_sale')</a></li>
                                    <li><a href="{{url(''.__('route.your_fav_properties').'')}}">@lang('app.your_fav_properties')</a></li>
                                    <li><a href="{{url(''.__('route.new_arrival_properties').'')}}">@lang('app.new_arrival')</a></li>
                                    <li>
                                        <a href="{{url(''.__('route.type_of_properties').'')}}">@lang('app.type_of_properties')</a>
                                        <ul>
                                            @php
                                            $propertyTypes = (new \App\Services\PropertyService)->propertyType();
                                            @endphp
                                            @foreach ($propertyTypes as $propertyType)

                                            @php
                                            $property_type_name= '';
                                            $language =  App::getLocale();
                                            if($language == 'en'){
                                            $property_type_name = $propertyType->type_name;
                                            }elseif($language == 'it'){
                                            $property_type_name = $propertyType->name_italian;
                                            }elseif($language == 'de'){
                                            $property_type_name = $propertyType->name_german;
                                            }
                                            @endphp
                                            <li><a href="{{url('')}}/search/type/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id))) }}">{{$property_type_name or ''}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{url(''.__('route.destinations').'')}}">@lang('app.destinations')</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ $active == 'blog' ? 'active' : '' }}">
                                <a href={{url('blogs')}}><i>&#xf02d;</i>@lang('app.blog')</a>
                            </li>
                            <li class="{{ $active == 'faq' ? 'active' : '' }}">
                                <a href={{url('faq/0')}}><i>&#xf27a;</i>@lang('app.faq')</a>
                            </li>
                            <li class="{{ $active == 'ownerServices' || $active == 'buyerServices'  ? 'active' : '' }}">
                                <a href="javascript:void(0);"><i>&#xf054;<!--&#xf013; &#xf3da; --></i>@lang('app.services')</a>
                                <ul>
                                    <li><a href="{{url(''.__('route.owner_services').'')}}">Owner</a>
                                    </li>
                                    <li><a href="{{url(''.__('route.buyer_services').'')}}">Buyer</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ $active == 'contact' ? 'active' : '' }}">
                                <a href="{{url(''.trans('route.contact').'')}}"><i>&#xf2b9;</i>@lang('app.contact')</a>
                            </li>
                            <li>
                                <a href="{{url(''.__('route.destinations').'')}}">@lang('app.destinations')</a>
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
                                <span><a href={{url(''.__('route.about_us').'')}}>@lang('app.about_us')</a></span>
                            </li>
                            <li>
                                <span><a href={{route(''.__('route.search').'')}}>@lang('app.properties')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url(''.__('route.destinations').'')}}">@lang('app.destinations')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url(''.__('route.new_arrival_properties').'')}}">@lang('app.new_arrival')</a></span>
                            </li>
                             <li>
                                <span><a href="{{url(''.__('route.your_fav_properties').'')}}">@lang('app.your_fav_properties') </a>({{(new \App\Services\PropertyService)->getFavCount() }})</span>
                            </li>
                            <li>
                                <span><a href="{{url('')}}/blogs">@lang('app.blog')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url('faq/0')}}">@lang('app.faq')</a></span>
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
                                <span class="pt12"><a href="mailto:info@italicahomes.com">info@italicahomes.com</a></span>
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
                            <li><a href="https://twitter.com/livingartIT">&#xf081;</a></li>
                            <li><a href="https://www.linkedin.com/in/lenka-fridrich-447b9318/">&#xf08c;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper">
                    <ul class="footer-menu-home-list">
                        <li>
                            <a href="{{url(''.__('route.privacy_policy').'')}}">@lang('app.privacy_policy')</a>
                        </li>
                        <li>
                            <a href={{url(''.__('route.terms_conditions').'')}}>@lang('app.terms_use')</a>
                        </li>
                        <li>
                            <a href={{url(''.__('route.legal_notice').'')}}>@lang('app.legal_notice')</a>
                        </li>
                        <li>
                            <a href="{{url(''.trans('route.contact').'')}}">@lang('app.contact_us')</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">@lang('app.site_map')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-copy-right-block">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <span class="copy-right-text">@lang('app.Copyright') {{date('Y')}} @lang('app.app-name') &#44; @lang('app.all_rights_reserved') &#x002E;</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
</div>
@yield('custom-js')
 <script src="https://kit.fontawesome.com/bce09a172b.js"></script>
 
{{ Html::script('ui/js/jquery.matchHeight-min.js') }}

<!-- Global site tag (gtag.js) - Google Analytistrcs -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114506662-1"></script> -->
<script>
/*$(function(){
        var url = window.location.href;
        var segments = url.split( '/' );
        var pathArray = window.location.pathname.split('/');
        alert(pathArray);
        alert('{{__('app.about_us')}}');
    var subdomain =  window.location.host.split('.')[1] ? window.location.host.split('.')[1] : false;
    alert(subdomain);
});*/
   
    
    
</script>

</body>
</html>
