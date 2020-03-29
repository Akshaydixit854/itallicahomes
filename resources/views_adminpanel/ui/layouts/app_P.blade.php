<!doctype html>
<html>
<head>
    <meta name="google-site-verification" content="U7tz4WZDuVfasOYOftvEVUGJBQs7-m3NfJbX7iSeAkE" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('custom-css')

</head>
<body>
       @php
       $lang1 =Session::get('language');
             $vcontact='';
                                {{ $contct = __('app.contact'); }}
                               
                                if($contct == 'Contact'){
                                    $vcontact = 'contact'; 
                                }elseif ($contct == 'Contatti') {
                                    $vcontact = 'contatti';
                                }elseif ($contct == 'Kontakt') {
                                    $vcontact = 'kontakt';
                                }

                                        $dest='destinations';
                                        {{ $destination = __('app.destinations'); }}

                                        if($destination == 'Destinations'){
                                            $dest = 'destinations'; 
                                        }elseif ($destination == 'Ort') {
                                            $dest = 'ort';
                                        }elseif ($destination == 'Luoghi') {
                                            $dest = 'luoghi';
                                        }


                                    $abt='';
                                        {{ $abt_us = __('app.about_us'); }}
                                     
                                        if($abt_us == 'About Us'){
                                            $abt = 'about'; 
                                        }elseif ($abt_us == 'Über uns') {
                                            $abt = 'uber_uns';
                                        }elseif ($abt_us == 'Chi siamo') {
                                            $abt = 'chi_siamo';
                                        }

                                    $srch='';
                                        {{ $search = __('app.search'); }}
                                       
                                        if($search == 'Search'){
                                            $srch = 'search'; 
                                        }elseif ($search == 'Suchen') {
                                            $srch = 'suchen';
                                        }elseif ($search == 'Cerca') {
                                            $srch = 'cerca';
                                        }

                                         $fav ='';
                                        {{ $your_fav = __('app.your_fav_properties'); }}
                                    
                                        if($your_fav == 'Your Favorite Properties'){
                                            $fav = 'myfavourite'; 
                                        }elseif($your_fav == 'Ihre Favoriten') {
                                            $fav = 'ihre_favoriten';
                                        }elseif ($your_fav == 'Preferiti') {
                                            $fav = 'preferiti';
                                        }

                                        $legal ='';
                                        {{ $legal_notice = __('app.legal_notice'); }}
                                       
                                        if($legal_notice == 'Legal Notice'){
                                            $legal = 'legal_notice'; 
                                        }elseif($legal_notice == 'Impressum') {
                                            $legal = 'impressum';
                                        }elseif ($legal_notice == 'Informazioni Legali') {
                                            $legal = 'informazioni_legali';
                                        }


                                        $terms ='';
                                        {{ $terms_cond = __('app.terms_conditions'); }}
                                   
                                        if($terms_cond == 'Terms & Conditions'){
                                            $terms = 'terms_and_conditions'; 
                                        }elseif($terms_cond == 'AGB´s') {
                                            $terms = 'AGB';
                                        }elseif ($terms_cond == 'Termini & Condizioni') {
                                            $terms = 'Termini_condizioni';
                                        }

                                         $new_arrival ='';
                                        {{ $new_arr = __('app.new_arrival_properties'); }}
                                        if($new_arr == 'New Arrival Properties'){
                                            $new_arrival = 'new_arrivals'; 
                                        }elseif($new_arr == 'Neue Objekte') {
                                            $new_arrival ='neue_objekte';
                                        }elseif ($new_arr == 'Nuove proprietà di arrivo') {
                                            $new_arrival = 'nuove_di_arrivo';
                                        }

                                        $privacy ='';
                                        {{ $privacy_polcy = __('app.privacy_policy'); }}
                                      
                                        if($privacy_polcy == 'Privacy Policy'){
                                            $privacy = 'privacy_policy'; 
                                        }elseif($privacy_polcy == 'Datenschutz') {
                                            $privacy = 'datenschutz';
                                        }elseif ($privacy_polcy == 'politica sulla riservatezza') {
                                            $privacy = 'politica_sulla_riservatezza';
                                        }

                                        $prop_type ='';
                                        {{ $type_properties = __('app.type_of_properties'); }}
                                      
                                        if($type_properties == 'Type of Properties'){
                                            $prop_type = 'category-property'; 
                                        }elseif($type_properties == 'Immobilien-Arten') {
                                            $prop_type = 'immobilien_arten';
                                        }elseif ($type_properties == 'Tipologia') {
                                            $prop_type = 'tipologia';
                                        }


                                        $ownerservices='';
                                        {{ $oserv = __('app.owner_services'); }}
                                        if($oserv == 'Owner Services'){
                                        $ownerservices = 'owner_services'; 
                                    }elseif ($oserv == 'Besitzer Services') {
                                    $ownerservices = 'besitzer_services';
                                }elseif ($oserv == 'Servizi al proprietario') {
                                $ownerservices = 'servizi_al_proprietario';
                            }

                            $bservices='';
                            {{ $bserv = __('app.buyer_services'); }}
                            // dump($bserv);
                            if($bserv == 'Buyer Services'){
                            $bservices = 'buyer_services'; 
                        }elseif ($bserv == 'Käufer Services') {
                        $bservices = 'kaufer_services';
                    }elseif ($bserv == 'Servizi per Compratore') {
                    $bservices = 'servizi_per_compratore';
                }            


                                      
        @endphp
<div class="wrapper">
    <!-- Header Start -->
    <header>
        <div class="top-header-nav">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="top-header-menu">
                        <ul class="top-notice">
                            @php
                                $language =  App::getLocale();
                            @endphp
                            @if($language == 'en')
                                <li><a href="{{url(''.$fav.'')}}"><i @if((new \App\Services\PropertyService)->getFavCount() > 0) style="color: red;" @endif;>&#xf004;</i>@lang('app.your_fav_properties') ({{(new \App\Services\PropertyService)->getFavCount()}})</a></li>
                            @else
                                <li><a href="{{url(''.$language.'')}}/{{$fav}}"><i @if((new \App\Services\PropertyService)->getFavCount() > 0) style="color: red;" @endif;>&#xf004;</i>@lang('app.your_fav_properties') ({{(new \App\Services\PropertyService)->getFavCount()}})</a></li>
                            @endif
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
                             @if($language == 'en')
                                <li><a href="{{url(''.$legal.'')}}">@lang('app.legal_notice')</a></li>
                                <li><a href="{{url(''.$terms.'')}}">@lang('app.terms_conditions')</a></li>

                             @else
                                 <li><a href="{{url(''.$language.'')}}/{{$legal}}">@lang('app.legal_notice')</a></li>
                                <li><a href="{{url(''.$language.'')}}/{{$terms}}">@lang('app.terms_conditions')</a></li>

                             @endif
                        </ul>
                        <ul class="top-social-icon">
                            <li><a target="_blank" href="https://www.facebook.com/italicahomes/"
                                   class="facebook-icon-color">&#xf082;</a></li>
                            <li><a  target="_blank" href="https://twitter.com/livingartIT" class="twitter-icon-color">&#xf081;</a></li>
                            <li><a  target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="linkedin-icon-color">&#xf08c;</a></li>
                            
                        </ul>
                        <ul class="language-list">
                            <li ><a href="{{url('/')}}/locale/en" style="@if(Config::get('app.locale') == 'en') {{'color:green'}} @endif"><img src={{asset("/ui/images/english.png")}}>@lang('app.english')</a></li>
                            <li><a href="{{url('/')}}/locale/it" style="@if(Config::get('app.locale') == 'it') {{'color:green'}} @endif"><img src={{asset("/ui/images/italian.png")}}>@lang('app.italian')</a></li>
                            <li><a href="{{url('/')}}/locale/de" style="@if(Config::get('app.locale') == 'de') {{'color:green'}} @endif"><img src={{asset("/ui/images/german.png")}}>@lang('app.german')</a></li>
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
                             @if($language == 'en')
                                <li class="{{ $active == 'about' ? 'active' : '' }}">
                                     <a href="{{url(''.$abt.'')}}"><i>&#xf0b1;</i>@lang('app.about_us')</a>
                                </li>

                               @else
                                 <li class="{{ $active == 'about' ? 'active' : '' }}">
                                     <a href="{{url(''.$language.'')}}/{{$abt}}"><i>&#xf0b1;</i>@lang('app.about_us')</a>
                                </li>

                             @endif
                            <li class="{{ $active == 'property' ? 'active' : '' }}">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i>@lang('app.properties')</a>
                                <ul>
                                    
                                     @if($language == 'en')
                                     <li><a href="{{url('')}}/search">@lang('app.view_all_properties')</a>
                                    </li>
                                    <li><a href="{{url('')}}//search/2">@lang('app.properties_for_rent')</a></li>
                                    <li><a href="{{url('')}}/search/1">@lang('app.properties_for_sale')</a></li>
                                    <li><a href="{{url('')}}/search/3">@lang('app.properties_for_rent_sale')</a></li>
                                     <li><a href="{{url(''.$fav.'')}}">@lang('app.your_fav_properties')</a></li>
                                      <li><a href="{{url(''.$new_arrival.'')}}">@lang('app.new_arrival')</a></li>
                                          <li>
                                        <a href="{{url(''.$prop_type.'')}}">@lang('app.type_of_properties')</a>
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
                                                   <!--  <li><a href="{{url(''.$srch.'')}}/type/{{$propertyType->id}}">{{$property_type_name or ''}}</a></li> -->
                                                  <!--     <li><a href="{{url(''.$srch.'')}}/type/{{preg_replace('/[[:space:]]+/', '+',$property_type_name)}}">{{$property_type_name or ''}}</a></li> -->
                                                  <li><a href="{{url('')}}/search/type/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id))) }}">{{$property_type_name or ''}}</a></li>
                                                @endforeach
                                        </ul>
                                    </li>
                                    @else
                                       <li><a href="{{url(''.$language.'')}}/{{$srch}}">@lang('app.view_all_properties')</a>
                                    </li>
                                    <li><a href="{{url(''.$language.'')}}/{{$srch}}/2">@lang('app.properties_for_rent')</a></li>
                                    <li><a href="{{url(''.$language.'')}}/{{$srch}}/1">@lang('app.properties_for_sale')</a></li>
                                    <li><a href="{{url(''.$language.'')}}/{{$srch}}/3">@lang('app.properties_for_rent_sale')</a></li>
                                     <li><a href="{{url(''.$language.'')}}/{{$srch}}/3">@lang('app.properties_for_rent_sale')</a></li>
                                      <li><a href="{{url(''.$language.'')}}/{{$fav}}">@lang('app.your_fav_properties')</a></li>
                                     <li><a href="{{url(''.$language.'')}}/{{$new_arrival}}">@lang('app.new_arrival')</a></li>
                                    <li>
                                        <a href="{{url(''.$language.'')}}/{{$prop_type}}">@lang('app.type_of_properties')</a>
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
                                                  <!--   <li><a href="{{url(''.$srch.'')}}/type/{{$propertyType->id}}">{{$property_type_name or ''}}</a></li> -->
                                                    <li><a href="{{url(''.$language.'')}}/{{$srch}}/type/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id))) }}">{{$property_type_name or ''}}</a></li>
                                                @endforeach


                                        </ul>
                                    </li>
                                    @endif
                                    <li>
                                         @if($language == 'en')
                                            <a href="{{url(''.$dest.'')}}">@lang('app.destinations')</a></li>
                                         @else
                                            <a href="{{url(''.$language.'')}}/{{$dest}}">@lang('app.destinations')</a></li>
                                         @endif

                                </ul>
                            </li>
                            @if($language == 'en')
                                <li class="{{ $active == 'blog' ? 'active' : '' }}">
                                    <a href={{url('blogs')}}><i>&#xf02d;</i>@lang('app.blog')</a>
                                </li>
                                <li class="{{ $active == 'faq' ? 'active' : '' }}">
                                    <a href={{url('faq/0')}}><i>&#xf27a;</i>@lang('app.faq')</a>
                                </li>
                                 <li class="{{ $active == 'ownerServices' || $active == 'buyerServices'  ? 'active' : '' }}">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i>@lang('app.services')</a>
                                <ul>
                                    <li><a href="{{url(''.$ownerservices.'')}}">Owner</a>
                                    </li>
                                     <li><a href="{{url(''.$bservices.'')}}">Buyer</a>
                                    </li>
                                </ul>
                            </li>
                                <li class="{{ $active == 'contact' ? 'active' : '' }}">
                                    <a href="{{url(''.$vcontact.'')}}"><i>&#xf2b9;</i>@lang('app.contact')</a>
                                </li>
                                <li>
                                    <a href="{{url(''.$dest.'')}}">@lang('app.destinations')</a>
                                </li>
                            @else
                                <li class="{{ $active == 'blog' ? 'active' : '' }}">
                                    <a href="{{url(''.$language.'')}}/blogs"><i>&#xf02d;</i>@lang('app.blog')</a>
                                </li>
                                <li class="{{ $active == 'faq' ? 'active' : '' }}">
                                    <a href="{{url(''.$language.'')}}/faq/0"><i>&#xf27a;</i>@lang('app.faq')</a>
                                </li>
                                 <li class="{{ $active == '' ? 'active' : '' }}">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i>@lang('app.services')</a>
                                <ul>
                                    <li><a href="{{url(''.$language.'')}}/{{$ownerservices}}">Owner</a>
                                    </li>
                                    <li><a href="{{url(''.$language.'')}}/{{$bservices}}">Buyer</a>
                                    </li>
                                </ul>
                            </li>
                                <li class="{{ $active == 'contact' ? 'active' : '' }}">
                                    <a href="{{url(''.$language.'')}}/{{$vcontact}}"><i>&#xf2b9;</i>@lang('app.contact')</a>
                                </li>
                                <li>
                                    <a href="{{url(''.$language.'')}}/{{$dest}}">@lang('app.destinations')</a>
                                </li>
                            @endif
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
                            @if($language == 'en')
                            <li>
                                <span><a href={{url(''.$abt.'')}}>@lang('app.about_us')</a></span>
                            </li>
                            <li>
                                <span><a href={{route(''.$srch.'')}}>@lang('app.properties')</a></span>
                            </li>
                            <li>
                                <span><a href={{route('destinations')}}>@lang('app.destinations')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url(''.$new_arrival.'')}}">@lang('app.new_arrival')</a></span>
                            </li>
                             <li>
                                <span><a href="{{url(''.$fav.'')}}">@lang('app.your_fav_properties') </a>({{(new \App\Services\PropertyService)->getFavCount() }})</span>
                            </li>
                            <li>
                                <span><a href="{{url('')}}/blogs">@lang('app.blog')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url('faq/0')}}">@lang('app.faq')</a></span>
                            </li>
                            @else
                            <li>
                                <span><a href="{{url(''.$language.'')}}/{{$abt}}">@lang('app.about_us')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url(''.$language.'')}}/{{$srch}}">@lang('app.properties')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url(''.$language.'')}}/{{$dest}}">@lang('app.destinations')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url(''.$language.'')}}/{{$new_arrival}}">@lang('app.new_arrival')</a></span>
                            </li>
                             <li>
                                <span><a href="{{url(''.$language.'')}}/{{$fav}}">@lang('app.your_fav_properties') </a>({{(new \App\Services\PropertyService)->getFavCount() }})</span>
                            </li>
                            <li>
                                <span><a href="{{url(''.$language.'')}}/blogs">@lang('app.blog')</a></span>
                            </li>
                            <li>
                                <span><a href="{{url(''.$language.'')}}/faq/0">@lang('app.faq')</a></span>
                            </li>
                            @endif
                         
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
                            <li><a href="https://twitter.com/livingartIT">&#xf081;</a></li>
                            <li><a href="https://www.linkedin.com/in/lenka-fridrich-447b9318/">&#xf08c;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper">
                    <ul class="footer-menu-home-list">
                         @if($language == 'en')
                        <li>
                            <a href="{{url(''.$privacy.'')}}">@lang('app.privacy_policy')</a>
                        </li>
                        <li>
                            <a href={{url(''.$terms.'')}}>@lang('app.terms_use')</a>
                        </li>
                        <li>
                            <a href={{url(''.$legal.'')}}>@lang('app.legal_notice')</a>
                        </li>
                        <li>
                            <a href="{{route(''.$vcontact.'')}}">@lang('app.contact_us')</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">@lang('app.site_map')</a>
                        </li>
                        @else
                        <li>
                            <a href="{{url(''.$language.'')}}/{{$privacy}}">@lang('app.privacy_policy')</a>
                        </li>
                        <li>
                            <a href="{{url(''.$language.'')}}/{{$terms}}">@lang('app.terms_use')</a>
                        </li>
                        <li>
                            <a href="{{url(''.$language.'')}}/{{$legal}}">@lang('app.legal_notice')</a>
                        </li>
                        <li>
                            <a href="{{url(''.$language.'')}}/{{$vcontact}}">@lang('app.contact_us')</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">@lang('app.site_map')</a>
                        </li>

                        @endif
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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114506662-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-114506662-1');

</script>
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
