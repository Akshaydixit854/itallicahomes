<?php $__env->startSection('custom-css'); ?>
<title><?php echo e($post->title); ?></title>
<?php
    if($post){
    $meta_descr = strip_tags($post->content);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
}
?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

    <meta property="fb:app_id" content="2346017678815971" />
<meta property="og:title" content="<?php if(\Lang::has('blog.blog_title_'.$post->id)): ?><?php echo e(trans('blog.blog_title_'.$post->id)); ?><?php else: ?><?php echo e($post->title); ?><?php endif; ?>">
    <meta property="og:site_name" content="http://www.italicahomes.com">
    <meta property="og:url" content="<?php echo e(url('/blog/'.$post->id)); ?>">
    <meta property="og:description" content="Best Homes Italica">
    <meta name="description" content="Best Homes Italica 1" >
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo e(asset("/images/post-cover-images/".$post->cover_image)); ?>">
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />

     <meta name="twitter:image" content="<?php echo e(asset("/images/post-cover-images/".$post->cover_image)); ?>"/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="<?php if(\Lang::has('blog.blog_title_'.$post->id)): ?><?php echo e(trans('blog.blog_title_'.$post->id)); ?><?php else: ?><?php echo e($post->title); ?><?php endif; ?>"/>
<!--     
    <meta name="twitter:image" content="http://graphics8.nytimes.com/images/2012/02/19/us/19whitney-span/19whitney-span-articleLarge.jpg"> -->

    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">

    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/owl.carousel.min.css")); ?>>

    <link rel="stylesheet" href=<?php echo e(asset("ui/css/thumbnail-slider.css")); ?>  media="screen">
    <script src="https://kit.fontawesome.com/bce09a172b.js"></script>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>

    <style type="text/css">
        #inner-blog-content ul {
            list-style-type: square !important;
            padding-left: 25px;
        }
         #inner-blog-content ol {
            margin-left: 35px;
        }
        #inner-blog-content  ul li {
            list-style-type:disc;
        }
        
    
div svg {
    width: 35px;
    height: 33px;
    margin: 0px 7px 6px;
  cursor: pointer;
  overflow: visible;
}
div svg polygon, div svg path {
  transition: all 0.5s cubic-bezier(0.2, 1, 0.3, 1);
}
div svg:hover polygon, div svg:hover path {
  transition: all 1s cubic-bezier(0.2, 1, 0.3, 1);
  fill: #FF4136;
}
div svg:hover .arrow {
  animation: arrow-anim 2.5s cubic-bezier(0.2, 1, 0.3, 1) infinite;
}
div svg:hover .arrow-fixed {
  animation: arrow-fixed-anim 2.5s cubic-bezier(0.2, 1, 0.3, 1) infinite;
}

@keyframes  arrow-anim {
  0% {
    opacity: 1;
    transform: translateX(0);
  }
  5% {
    transform: translateX(-0.1rem);
  }
  100% {
    transform: translateX(1rem);
    opacity: 0;
  }
}
@keyframes  arrow-fixed-anim {
  5% {
    opacity: 0;
  }
  20% {
    opacity: 0.4;
  }
  100% {
    opacity: 1;
  }
}    
     
    </style>

    <!-- Custom CSS End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php
    $lang1 =  App::getLocale();
?>

    <div class="wrapper">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("images/post-cover-images/". $post->cover_image)); ?> alt=<?php echo e($post->title); ?>" />
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading">
                    <input type="hidden" name="post_id" id="post_id" value="<?php echo e($post->id); ?>">
            <input type="hidden" name="post_img" id="post_img" value=<?php echo e(asset("images/post-cover-images/". $post->cover_image)); ?>>
                    <a href="javascript:history.back()"><svg width="18px" height="17px" viewBox="0 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="prev" transform="translate(8.500000, 8.500000) scale(-1, 1) translate(-8.500000, -8.500000)">
                  <polygon class="arrow" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <polygon class="arrow-fixed" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                  <path d="M-1.48029737e-15,0.56157424 L-1.48029737e-15,16.1929159 L9.708,8.33860465 L-2.66453526e-15,0.56157424 L-1.48029737e-15,0.56157424 Z M1.33333333,3.30246869 L7.62533333,8.34246869 L1.33333333,13.4327013 L1.33333333,3.30246869 L1.33333333,3.30246869 Z"></path>
              </g>
            </svg></a>
                    <?php if(\Lang::has('blog.blog_title_'.$post->id)): ?>
                        <?php echo (new \App\Services\PropertyService)->truncate(trans('blog.blog_title_'.$post->id),250); ?>

                    <?php else: ?>
                        <?php echo $post->title; ?>

                    <?php endif; ?>
                </span>
                <ul class="blog-share-section1 row">
                    <li class="col-md-6 col-6">
                        <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                        <span><?php echo e(date('d-m-Y',strtotime($post->created_at))); ?></span>
                    </li>
                    <li class="col-md-6 col-6">
                        <ul class="blog-icons text-right">
                            <li><a target="_blank" href="<?php echo e(url('')); ?>/blog/<?php echo e($post->id); ?>/print">&#xf02f;</a></li>
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
                                               <li style="width: 16%;"><a  href="javascript:void(0);" class="btnShare" lang="<?php echo e($lang1); ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                               <li><a target="_blank" href="http://twitter.com/share?text=<?php echo e($post->title); ?>&url=<?php echo e(url('blog/'.$post->id)); ?>"><i class="fab fa-twitter"></i></a></li>
                                               <li><a target="_blank" href="mailto:?subject=<?php echo e($post->title); ?>&body=Check out this Blog <?php echo e(url('')); ?>/blog/<?php echo e($post->id); ?>"><i class="far fa-envelope"></i></a></li>
                                               
                                            </ul>
                                        </div>
                                     </div>
                                </div>
                            </li>
                            <li><a href="<?php echo e(url('')); ?>/blog/<?php echo e($post->id); ?>/pdf">&#xf1c1;</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content" id="inner-blog-content">
                                <?php if(\Lang::has('blog.blog_description_'.$post->id)): ?>
                                    <?php echo trans('blog.blog_description_'.$post->id); ?>

                                <?php else: ?>
                                    <?php echo $post->content; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="demo">
                              <ul id="lightSlider">
                                  <?php if(!$gallery_images->isEmpty()): ?>
                                      <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li data-thumb="<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>">
                                            <img src="<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>"/ class="gallery-img">
                                          </li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <!-- Bootstrap JS Start -->
    <script src=<?php echo e(asset("ui/js/jquery-library.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/popper.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/bootstrap.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/owl.carousel.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/thumbnail-slider.js")); ?>></script>
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

        window.fbAsyncInit = function(){
            FB.init({
                appId: '2346017678815971',
                status: true,
                cookie: true,
                xfbml: true
            });
        };
        (function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if(d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id;
        js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
        ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
        function postToFeed(title, desc, url, image){
            var obj = {method: 'feed',link: url, picture: image,name: title,description: desc};
            function callback(response){}
            FB.ui(obj, callback);
        }

        $('.btnShare').click(function(){

            var lang1 = $(this).attr('lang');
            var URL ='';
            if(lang1 == 'en' ){
                var URL = "<?php echo e(url('')); ?>/blog/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getBlogTitle(trans('blog.blog_title_'.$post['id'])))); ?>";
            }else {

            var URL = "<?php echo e(url('')); ?>/"+lang1+"/blog/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getBlogTitle(trans('blog.blog_title_'.$post['id'])))); ?>";
            }
            var post_id = $('#post_id').val();
            var img = $('#post_img').val(); 
            var vtitle='share Blog title';
            var vhref =URL;
            var vimage = img;
            var vdescription ='Blog details';
            postToFeed(vtitle, vdescription, vhref ,vimage );
            return false;
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>