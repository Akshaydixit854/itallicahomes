@extends('ui.layouts.app')

@section('custom-css')
        <title>{{ __('app.new_arrival')}}</title>
@php
    $metakey = $metakey = '';

    if($properties){
        $meta_descr = strip_tags($properties[0]->detail_description);
        $meta_descr= substr($meta_descr,0,160);
        $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
}
@endphp

<meta name="description" content="{{$meta_descr}}">
<meta name="keywords" content="{{$metakey}}">
    {{ Html::style('ui/css/bootstrap.min.css') }}
    {{ Html::style('ui/css/styles.css') }}
    {{ Html::style('ui/css/responsive.css') }}
    {{ Html::style('ui/css/autosearch.css') }}
    <link rel="icon" href={{asset('/ui/images/favicon.png')}} sizes="16x16" type="image/png">
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
@endsection
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
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
                <span class="main-heading">@lang('app.new_arrival')</span>
                <div class="wrapper">
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-md-4">
                                <div class="properties-list-wrapper home-pro equal-height">
                                    <div class="properties-pic-section">
                                        <span><a href="{{url('')}}/properties/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))) }}" class="properties-link">
                                            <img class="prop_images" id="prop_images_{{$property->id}}" data-main-id="{{$property->id}}" src={{asset("/images/cover-images/".$property->cover_image_name)}}></a></span>
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
                                        @endphp
                                        <abbr class="red-tag" style="background: {{$property_ui->ui_color}}">
                                            @php
                                                $property_type = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                            @endphp
                                            {{$property_type}}
                                        </abbr>
                                    </div>
                                    <div class="properties-name">
                                        @if(\Lang::has('property.property_title_'.$property->id))
                                            <span><em>{{(new \App\Services\PropertyService)->truncate(trans('property.property_title_'.$property->id)) }}</em><i><a class="heart-fav" id="heart-fav_{{$property->id}}" data-main-id="{{$property->id}}" href="/favourite/{{$property->id}}">{!! (new \App\Services\PropertyService)->checkFav($property->id) !!}</a></i></span>
                                        @else
                                            <span><em>{{(new \App\Services\PropertyService)->truncate($property->name)}}</em><i><a  class="heart-fav" id="heart-fav_{{$property->id}}" data-main-id="{{$property->id}}"  href="/favourite/{{$property->id}}">{!! (new \App\Services\PropertyService)->checkFav($property->id) !!}</a></i></span>
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
                    </div>
                    <div class="properties-view-all">
                        <a href="{{url('')}}/search">View All</a>
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

            $('#js-contact-us').click(function(){
                if($('.error').length > 0){
                    $('.error').remove();
                }
                var name = $('.name').val();
                var email = $('.email').val();
                var question = $('.question').val();
                if(name.trim() == '' || email.trim() == '' || question.trim() == ''){
                    if(name.trim() == ''){
                        $('.name').after('<p class="error">Required</p>');
                    }
                    if(email.trim() == ''){
                        $('.email').after('<p class="error">Required</p>');
                    }
                    if(question.trim() == ''){
                        $('.question').after('<p class="error">Required</p>');
                    }
                    return false;
                }
                if(!validateEmail(email)){
                    $('.email').after('<p class="error">Invalid email</p>');
                    return false;
                }
            });
        });
        // Responsive Menu  Start
    </script>
@endsection
