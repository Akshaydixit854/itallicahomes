@extends('ui.layouts.app')

@section('custom-css')
    <title>{{ __('app.destination') }}</title>
@php
if($destinations){
    $meta_descr = strip_tags($destinations[1]->description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
}
@endphp
<meta name="description" content="{{$meta_descr or ''}}">
<meta name="keywords" content="{{$metakey or ''}}">

    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    {{ Html::style('ui/css/font-awesome.css') }}
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
    {{ Html::style('ui/css/scroll-top.css') }}
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
    <!-- Destinations Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper remove-box-shadow">
            <div class="main-container-wrapper">
                <span class="main-heading">@lang('app.destinations')<p>@lang('app.destination_intro')</p></span>
                <div class="destinations-list-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="destinations-list">
                                <div class="destinations-list-pic">
                                    <span>
                                       <img src={{asset("images/destination-covers/" . $destinations[0]->cover_image)}}>
                                    </span>
                                </div>
                                <div class="destinations-list-text">
                                    <span>
                                        @if(\Lang::has('destination.destination_title_'.$destinations[0]->id))
                                            {{trans('destination.destination_title_'.$destinations[0]->id)}}
                                        @else
                                            {{$destinations[0]->destination_name}}
                                        @endif
                                    </span>
                                    <p>
                                        @if(\Lang::has('destination.destination_description_'.$destinations[0]->id))
                                            <span>{!! substr(trans('destination.destination_description_'.$destinations[0]->id),0,100) !!}</span>
                                        @else
                                            {!! substr($destinations[0]->description,0,100) !!}
                                        @endif
                                    </p>
                                </div>
                                    <a href="{{url(''.__('route.destination').'')}}/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destinations[0]->id))) }}" class="desti-view">@lang('app.read_more') </a>
                            </div>
                        </div>
                    </div>
                    <div class="infinite-scroll">             
                        <div class="row">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($destinations as $destination)
                                @if($i != 0)
                            <div class="col-md-6">
                                <div class="destinations-list">
                                    <div class="destinations-list-pic">
                                        <span>
                                           <img src={{asset("images/destination-covers/". $destination->cover_image)}}>
                                        </span>
                                    </div>
                                    <div class="destinations-list-text">
                                        <span>
                                        @if(\Lang::has('destination.destination_title_'.$destination->id))
                                            {{trans('destination.destination_title_'.$destination->id)}}
                                        @else
                                            {{$destination->destination_name}}
                                        @endif
                                        </span>
                                        <p>
                                            @if(\Lang::has('destination.destination_description_'.$destination->id))
                                                <span>{!! substr(trans('destination.destination_description_'.$destination->id),0,100) !!}</span>
                                            @else
                                                {!! substr($destination->description,0,100) !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="destinations-view-btn">
                                        <a href="{{url(''.__('route.destination').'')}}/{{preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destination->id))) }}" class="desti-view">@lang('app.read_more') </a>
                                    </div>
                                </div>
                            </div>
                                @endif
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        {{$destinations->links()}}
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
    {{ Html::script('ui/js/jquery.jscroll.min.js') }}
    {{ Html::script('ui/js/scroll_top.js') }}
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
                    $('ul.pagination').remove();
                  }
                });
            });
            </script>
<!--     <script>
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
    </script> -->
@endsection
