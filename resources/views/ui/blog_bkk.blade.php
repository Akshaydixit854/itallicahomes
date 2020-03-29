@extends('ui.layouts.app')

        @section('custom-css')
            {{ Html::style('ui/css/bootstrap.min.css') }}
            {{ Html::style('ui/css/styles.css') }}
            {{ Html::style('ui/css/responsive.css') }}
            {{ Html::style('ui/css/responsive.css') }}
            {{ Html::style('ui/css/custom.css') }}
            <link rel="icon" href={{asset("ui/images/favicon.png")}} sizes="16x16" type="image/png">
        @endsection

        @section('custom-js')
            {{ Html::script('ui/js/jquery-library.js') }}
            {{ Html::script('ui/js/popper.min.js') }}
            {{ Html::script('ui/js/bootstrap.min.js') }}
            {{ Html::script('js/share.js') }}
            {{ Html::script('ui/js/jquery.matchHeight-min.js') }}

           <!-- Bootstrap JS Start -->
           <script src=""></script>
           <script>
                // Match Height
                $(function() {
                    $('.equal-height').matchHeight({
                        byRow: true,
                        property: 'height'
                    });
                });
               // Share blog Start
               $(document).ready(function()
               {
                   var tdiv = $('.idcontainer')
                   tdiv.hide();
                   $('.idattrlink').click(function(event){
                       event.preventDefault();
                       var targetDiv = $($(this).attr('href'));
                       $('.idattrlink').removeClass("active");
                       if(targetDiv.css("display") == "none")
                       {
                           tdiv.hide();
                           $(this).addClass("active");
                           targetDiv.slideDown();
                       }
                       else
                       {
                           tdiv.slideUp();
                           $(this).removeClass("active");
                       }
                   });
                   $('.idcontainer-close').click(function(e) {
                       $('.idcontainer').slideUp(300);
                       $('.idattrlink').removeClass('active');
                   });
               })
               // Share blog End
               // Responsive Menu  Start
               $(document).on('ready', function() {
                   $( ".menu-list li ul" ).before( "<i class='sub-menu-icon'> &#xf0dd; </i>" );
                   $('#menuBtn').click(function(){
                       $('#menuBtn').toggleClass('open');
                       $('.menu-list').toggleClass('menuvisible');
                   });
                   $(".menu-list li i").click(function(e) {
                       $(this).next("ul").slideToggle();
                   });
               });
               // Responsive Menu  Start
           </script>
        @endsection

@section('content')
   <!-- Banner Section Start -->
   <div class="wrapper">
      <div class="about-page-banner">
         <img src={{asset("ui/images/destination_banner.jpg")}} alt="banner" />
      </div>
   </div>
   <!-- Banner Section End -->
   <!-- blog Start -->
   <div class="wrapper">
      <div class="about-us-text-wrapper remove-box-shadow">
         <div class="main-container-wrapper">
            <span class="main-heading">@lang('app.blog')</span>
            <div class="destinations-list-wrapper">
               <div class="row">
                 @foreach($posts as $post)
                  <div class="col-md-6">
                     <div class="blog-main-wrapper">
                        <div class="blog-images">
                           <a href="/blog/{{$post->id}}"><img src={{asset("images/post-cover-images/". $post->cover_image)}} alt="{{$post->title}}"></a>
                        </div>
                        <div class="blog-main-inner">
                           <div class="blog-inner-content equal-height">
                              <ul class="blog-share-section">
                                 <li>
                                    <a href="#">&#xf02f;</a>
                                 </li>
                                 <li>
                                    <a href="#share-detail" class="idattrlink">&#xf045;</a>
                                    <div class="share-social-media idcontainer" id="share-detail" style="display:none;">
                                       <div class="share-block-header">
                                          <span>Share</span>
                                          <abbr class="idcontainer-close">&#xf057;</abbr>
                                       </div>
                                       <div class="share-inner-content">
                                          <ul class="share-social-media-icon">
                                             <li  style="width: 16%;"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/blog/'.$post->id) }}display=popup"><i class="fab fa-facebook-f"></i></a></li>
                                             <li><a target="_blank" href="https://twitter.com/home?status={{url('blog/'.$post->id)}}"><i class="fab fa-twitter"></i></a></li>
                                             <li><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li>
                                             <li><a target="_blank" href="#"><i class="far fa-envelope"></i></a></li>
                                             <li><a target="_blank" href="https://plus.google.com/share?url={{url('/blog/'.$post->id)}}"><i class="fab fa-google-plus-g"></i></a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <a href="/blog/{{$post->id}}/pdf">&#xf1c1;</a>
                                 </li>
                                 <li>
                                    <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                                    <span>{{date('d-m-Y',strtotime($post->created_at))}}</span>
                                 </li>
                              </ul>
                              <div class="blog-content">
                                 <span>
                                     @if(\Lang::has('blog.blog_title_'.$post->id))
                                         {!! (new \App\Services\PropertyService)->truncate(trans('blog.blog_title_'.$post->id),250) !!}
                                     @else
                                         {!!  $post->title !!}
                                     @endif
                                 </span>
                                 <p>
                                     @if(\Lang::has('blog.blog_short_description_'.$post->id))
                                         {!! (new \App\Services\PropertyService)->truncate(trans('blog.blog_short_description_'.$post->id),250) !!}
                                     @else
                                         {!! (new \App\Services\PropertyService)->truncate($post->short_description,250) !!}
                                     @endif
                                 </p>
                                 <a href="/blog/{{$post->id}}">@lang('app.read_more')</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                 @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>


   <!-- blog End -->
   <!-- pagination Start -->
   <div class="wrapper">
      <div class="main-container-wrapper">
         <ul class="pagination-list-section">
            <li><a href="{{$posts->previousPageUrl()}}">&#xf100;</a></li>
             @for ($i = 1; $i <= $posts->lastPage(); $i++)
                 <li class="{{$i == $posts->currentPage() ? 'active' : ''}}"><a href={{ route('blog', ['page' => $i]) }}>{{$i}}</a></li>
             @endfor
            <li><a href="{{$posts->nextPageUrl()}}">&#xf101;</a></li>
         </ul>
      </div>
   </div>
   <!-- pagination End -->
   @endsection
