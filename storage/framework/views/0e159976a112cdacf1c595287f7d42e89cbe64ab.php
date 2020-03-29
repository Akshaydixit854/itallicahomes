<?php $__env->startSection('custom-css'); ?>
    <title><?php echo e($destination->destination_name); ?></title>
<?php
    if($destination){
    $meta_descr = strip_tags($destination->description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
}
?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

    <meta property="fb:app_id" content="2346017678815971" />
    <meta property="og:title" content="<?php if(\Lang::has('destination.destination_title_'.$destination->id)): ?>
                                            <?php echo trans('destination.destination_title_'.$destination->id); ?>

                                        <?php else: ?>
                                            <?php echo $destination->destination_name; ?>

                                        <?php endif; ?>">
    <meta property="og:site_name" content="http://www.italicahomes.com">
    <meta property="og:url" content="<?php echo e(url('/destination/'.$destination->id)); ?>">
    <meta property="og:description" content="<?php if(\Lang::has('destination.destination_description_'.$destination->id)): ?>
                                                <span><?php echo trans('destination.destination_description_'.$destination->id); ?></span>
                                            <?php else: ?>
                                             <?php echo $destination->description; ?>

                                              
                                            <?php endif; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo e(asset("images/destination-covers/". $destination->cover_image)); ?> ">
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />

    <meta name="twitter:image" content="<?php echo e(asset("images/destination-covers/". $destination->cover_image)); ?>"/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="<?php if(\Lang::has('destination.destination_title_'.$destination->id)): ?>
                                            <?php echo trans('destination.destination_title_'.$destination->id); ?>

                                        <?php else: ?>
                                            <?php echo $destination->destination_name; ?>

                                        <?php endif; ?>"/>
    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">

    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/owl.carousel.min.css")); ?>>

    <link rel="stylesheet" href=<?php echo e(asset("ui/css/thumbnail-slider.css")); ?>  media="screen">
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
     
    </style>
    <!-- Custom CSS End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php
$lang1 =  App::getLocale();
                                $single_dest='';
                                        {{ $desti = __('app.destination'); }}
                                        if($desti == 'Destination'){
                                            $single_dest = 'destinations'; 
                                        }elseif ($desti == 'Ort') {
                                            $single_dest = 'ort';
                                        }elseif ($desti == 'Luoghi') {
                                            $single_dest = 'luoghi';
                                        } 
                                       
                                        $sprint ='';
                                        {{ $pr = __('app.print'); }}
                                        if($pr == 'Print'){
                                            $sprint = 'print'; 
                                        }elseif ($pr == 'Drucken') {
                                            $sprint = 'drucken';
                                        }elseif ($pr == 'Stampare') {
                                            $sprint = 'stampare';
                                        }

?>
    <div class="wrapper">
         <input type="hidden" name="prope_id" id="prope_id" value="<?php echo e($destination->id); ?>">
            <input type="hidden" name="prop_img" id="prop_img" value="<?php echo e(asset("images/destination-covers/". $destination->cover_image)); ?>">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("images/destination-covers/". $destination->cover_image)); ?> alt=<?php echo e($destination->destination_name); ?> />
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading">
                    <?php if(\Lang::has('destination.destination_title_'.$destination->id)): ?>
                                            <?php echo trans('destination.destination_title_'.$destination->id); ?>

                                        <?php else: ?>
                                            <?php echo $destination->destination_name; ?>

                                        <?php endif; ?>
                </span>
                <ul class="blog-share-section1 row">
                    <li class="col-md-6 col-6">
                        <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                        <span><?php echo e(date('d-m-Y',strtotime($destination->created_at))); ?></span>
                    </li>
                    <li class="col-md-6 col-6">
                        <ul class="blog-icons text-right">
                            <li><a target="_blank" href="<?php echo e(url(''.$single_dest.'')); ?>/<?php echo e($destination->id); ?>/<?php echo e($sprint); ?>">&#xf02f;</a></li>
                            <li>
                                <div style="position: relative;">
                                     <a href="#share-detail4" class="idattrlink">&#xf045;</a>
                                    <div class="share-social-media idcontainer" id="share-detail4" style="display:none;">
                                        <div class="share-block-header">
                                            <span><?php echo app('translator')->getFromJson('app.share'); ?></span>
                                            <abbr class="idcontainer-close">&#xf057;</abbr>
                                        </div>
                                        <div class="share-inner-content">
                                            <ul class="share-social-media-icon">
                                               <li style="width: 16%;"><a href="javascript:void(0);" target="_blank" class="btnShare" lang="<?php echo e($lang1); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                               <li><a target="_blank" href="http://twitter.com/share?text=<?php echo e($destination->destination_name); ?>&url=<?php echo e(url('destination/'.$destination->id)); ?>"><i class="fab fa-twitter"></i></a></li>
                                               <li><a target="_blank" href="mailto:?subject=<?php echo e($destination->destination_name); ?>&body=Check out this site <?php echo e(url('/destination/'.$destination->id)); ?>" target="_blank"><i class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                     </div>
                                </div>
                            </li>
                            <li><a href="<?php echo e(url(''.$single_dest.'')); ?>/<?php echo e($destination->id); ?>/pdf">&#xf1c1;</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content" id="inner-blog-content">
                               <?php if(\Lang::has('destination.destination_description_'.$destination->id)): ?>
                                                <span><?php echo trans('destination.destination_description_'.$destination->id); ?></span>
                                            <?php else: ?>
                                             <?php echo $destination->description; ?>

                                              
                                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="demo">
                            
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

    <script type="text/javascript">
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
            console.log(obj);
            function callback(response){}
            FB.ui(obj, callback);
        }

        $('.btnShare').click(function(){
            var lang1 = $(this).attr('lang');
            var URL ='';
            if(lang1 == 'en' ){
                var URL = "<?php echo e(url('')); ?>/destination/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destination->id)))); ?>";
            }else {

            var URL = "<?php echo e(url('')); ?>/"+lang1+"/<?php echo e($single_dest); ?>/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destination->id)))); ?>";
            }
            var prop_id = $('#prope_id').val();
            var img = $('#prop_img').val(); 

            var vtitle='share property title';
            var vhref =URL;
            var vimage = img;
            var vdescription ='Property details';
            postToFeed(vtitle, vdescription, vhref ,vimage );
            return false;
        });
    </script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>