@extends('ui.layouts.app')

@section('custom-css')
        <title>FAQ</title>
@php
  {{ $vprop = __('app.frequently_asked_questions'); }}

    $meta_descr = strip_tags($vprop);
    $meta_descr1= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr1);
@endphp
<meta name="description" content="{{$meta_descr1 or ''}}">
<meta name="keywords" content="{{$metakey or ''}}">
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
                <span class="main-heading">@lang('app.frequently_asked_questions')</span>
                <div class="all-question-section">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="faq-list-block">
                                <li>
                                    <a class="{{ $check == 'questions' ? 'active' : '' }}" href="/faq/0"><i>&#xf27a;</i>@lang('app.all_question')</a>
                                </li>
                                <li >
                                    <a  class="{{ $check == 'agents' ? 'active' : '' }}" href="/faq/1"><i>&#xf015;</i>@lang('app.agents')</a>
                                </li>
                                <li>
                                    <a class="show-all" href="javascript:void(0)">
                                         <span class="expand-btn">@lang('app.expand_all')</span>
                                         <span class="hide-btn">@lang('app.hide_all')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="faq-querstion-form-wrapper">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="wrapper">
                                <div id="accordion" class="accordion">
                                    @foreach($faqs as $id => $faq)
                                    <div class="wrapper">
                                        <div class="card-header collapsed custom-card-header " data-toggle="collapse"
                                             href="#collapse{{$id}}">
                                            <a class="card-title custom-card-title">
                                                @if(\Lang::has('faq.faq_question_'.$faq->id))
                                                    {{trans('faq.faq_question_'.$faq->id)}}
                                                @else
                                                    {{$faq->question}}
                                                @endif
                                            </a>
                                        </div>
                                        <div id="collapse{{$id}}" class=" collapse custom-collapse-content wrapper"
                                             data-parent="#accordion">
                                            <p>
                                                @if(\Lang::has('faq.faq_answer_'.$faq->id))
                                                    {{trans('faq.faq_answer_'.$faq->id)}}
                                                @else
                                                    {{$faq->question}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <form id="form_validation" method="POST" action={{route("contact-faq")}} enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="faq-form-block">
                                <div class="faq-pic-section">
                                    <img src="{{url('')}}/ui/images/destination_banner.jpg" id='faq_image' alt="banner">
                                </div>
                                <div class="faq-form-field">
                                    <span>@lang('app.do_you_have_questions')</span>
                                    <ul class="faq-query-form">
                                        <li>
                                            <span>@lang('app.your_name_required')</span>
                                            <abbr>
                                                <input name="name" class="name" type="text">
                                            </abbr>
                                        </li>
                                        <li>
                                            <span>@lang('app.your_email_required')</span>
                                            <abbr>
                                                <input name="email" class="email" type="text">
                                            </abbr>
                                        </li>
                                        <li>
                                            <span>@lang('app.your_question')</span>
                                            <abbr>
                                                <textarea class="question" name="question"></textarea>
                                            </abbr>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="faq-form-btn">
                                <button id="js-contact-us" type="submit">@lang('app.send')</button>
                            </div>
                            </form>
                        </div>
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
         $(".show-all").click(function(){
            $(this).toggleClass("active");
         });

         $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut();
          });

           function validateEmail(sEmail) {
               var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
               if (filter.test(sEmail)) {
                   return true;
               }else{
                   return false;
               }
           }

    </script>
    <script>
        // Responsive Menu  Start
        $(document).on('ready', function () {
            $('.custom-collapse-content').removeClass('show');
            $('.show-all').click(function(){
                if($('.custom-collapse-content').hasClass('show')){
                    $('.custom-collapse-content').removeClass('show');
                }else{
                    $('.custom-collapse-content').addClass('show');
                }
            });

            $(".menu-list li ul").before("<i class='sub-menu-icon'> &#xf0dd; </i>");
            $('#menuBtn').click(function () {
                $('#menuBtn').toggleClass('open');
                $('.menu-list').toggleClass('menuvisible');
            });
            $(".menu-list li i").click(function (e) {
                $(this).next("ul").slideToggle();
            });

            if($(".fav-alert-box").length){
                $(".fav-alert-box").fadeOut(300);
            }


            $('#js-contact-us').click(function(){
                if($('.error').length > 0){
                    $('.error').remove();
                }
                var name = $('.name').val();
                var email = $('.email').val();
                var question = $('.question').val();
                if(name.trim() == '' || email.trim() == '' || question.trim() == ''){
                    if(name.trim() == ''){
                        $('.name').after('<p class="error">Name Required</p>');
                    }
                    if(email.trim() == ''){
                        $('.email').after('<p class="error">Email Required</p>');
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
