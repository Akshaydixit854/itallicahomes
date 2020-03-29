@extends('ui.layouts.app')

@section('custom-css')
    <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">

    <link rel="stylesheet" href={{asset("ui/css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href={{asset("ui/css/styles.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/responsive.css")}}>
    <link rel="stylesheet" href={{asset("ui/css/owl.carousel.min.css")}}>

    <link rel="stylesheet" href={{asset("ui/css/thumbnail-slider.css")}}  media="screen">
    <link rel="stylesheet" href={{asset("ui/css/custom.css")}}>

    <!-- Custom CSS End -->
@endsection


@section('content')

    <div class="wrapper">
        <div class="about-page-banner">
            <img src={{asset("images/post-cover-images/". $post->cover_image)}} alt={{$post->title}}" />
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading">
                    @if(\Lang::has('blog.blog_title_'.$post->id))
                        {!! (new \App\Services\PropertyService)->truncate(trans('blog.blog_title_'.$post->id),250) !!}
                    @else
                        {!!  $post->title !!}
                    @endif
                </span>
                <ul class="blog-share-section1 row">
                    <li class="col-md-6 col-6">
                        <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                        <span>{{date('d-m-Y',strtotime($post->created_at))}}</span>
                    </li>
                    <li class="col-md-6 col-6">
                        <ul class="blog-icons text-right">
                            <li><a target="_blank" href="/blog/{{$post->id}}/print">&#xf02f;</a></li>
                            <li>
                                <div style="position: relative;">
                                     <a href="#share-detail4" class="idattrlink">&#xf045;</a>
                                    <div class="share-social-media idcontainer" id="share-detail4" style="display:none;">
                                        <div class="share-block-header">
                                            <span>Share</span>
                                            <abbr class="idcontainer-close">&#xf057;</abbr>
                                        </div>
                                        <div class="share-inner-content">
                                            <ul class="share-social-media-icon">
                                               <li style="width: 16%;"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/blog/'.$post->id) }}display=popup"><i class="fab fa-facebook-f"></i></a></li>
                                               <li><a target="_blank" href="https://twitter.com/home?status={{url('blog/'.$post->id)}}"><i class="fab fa-twitter"></i></a></li>
                                               <li><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li>
                                               <li><a target="_blank" href="#"><i class="far fa-envelope"></i></a></li>
                                               <li><a target="_blank" href="https://plus.google.com/share?url={{url('/blog/'.$post->id)}}"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                        </div>
                                     </div>
                                </div>
                            </li>
                            <li><a href="/blog/{{$post->id}}/pdf">&#xf1c1;</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content">
                                @if(\Lang::has('blog.blog_description_'.$post->id))
                                    {!! trans('blog.blog_description_'.$post->id) !!}
                                @else
                                    {!! $post->content !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="demo">
                              <ul id="lightSlider">
                                  @if(!$gallery_images->isEmpty())
                                      @foreach($gallery_images as $gallery_image)
                                          <li data-thumb="{{asset("/images/cover-images/".$gallery_image->image)}}">
                                              <img src="{{asset("/images/cover-images/".$gallery_image->image)}}"/ class="gallery-img">
                                          </li>
                                      @endforeach
                                 @endif
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
    <!-- Bootstrap JS Start -->
    <script src={{asset("ui/js/jquery-library.js")}}></script>
    <script src={{asset("ui/js/popper.min.js")}}></script>
    <script src={{asset("ui/js/bootstrap.min.js")}}></script>
    <script src={{asset("ui/js/owl.carousel.min.js")}}></script>
    <script src={{asset("ui/js/thumbnail-slider.js")}}></script>
    <script>
        $(document).ready(function() {
            var count  = 0
            $('#view-properties-details').on('shown.bs.modal', function () {
               if (count === 1) return;
                $('#image-gallery').addClass('cS-hidden');
                    $('#lightSlider').lightSlider({
                    gallery:true,
                    item:1,
                    thumbItem:8,
                    slideMargin: 0,
                    speed:500,
                    auto:true,
                    loop:true,
                    autoWidth : false,
                    onSliderLoad: function() {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
                });
               count++;
           });
        });
        // Share blog Start
        $(document).ready(function () {
            var tdiv = $('.idcontainer')
            tdiv.hide();
            $('.idattrlink').click(function (event) {
                event.preventDefault();
                var targetDiv = $($(this).attr('href'));
                $('.idattrlink').removeClass("active");
                if (targetDiv.css("display") == "none") {
                    tdiv.hide();
                    $(this).addClass("active");
                    targetDiv.slideDown();
                }
                else {
                    tdiv.slideUp();
                    $(this).removeClass("active");
                }
            });
            $('.idcontainer-close').click(function (e) {
                $('.idcontainer').slideUp(300);
                $('.idattrlink').removeClass('active');
            });
        })
        // Share blog End
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
