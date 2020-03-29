@extends('ui.layouts.app')

@section('custom-css')
    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>
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
                                            <span>{{trans('destination.destination_description_'.$destinations[0]->id)}}</span>
                                        @else
                                            {{$destinations[0]->description}}
                                        @endif
                                    </p>
                                </div>
                                <form action="/search" method="POST" class="desti-form">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="destination_id" value="{{$destinations[0]->id}}">
                                    <input type="submit" class="desti-view" value="@lang('app.view_all')">
                                </form>
                            </div>
                        </div>
                    </div>
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
                                            <span>{{trans('destination.destination_description_'.$destination->id)}}</span>
                                        @else
                                            {{$destination->description}}
                                        @endif
                                    </p>
                                </div>
                                <div class="destinations-view-btn">
                                    <form action="/search" method="POST" class="desti-form">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="destination_id" value="{{$destination->id}}">
                                        <input type="submit" class="desti-view" value="@lang('app.view_all')">
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php
                            $i++;
                        @endphp
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
