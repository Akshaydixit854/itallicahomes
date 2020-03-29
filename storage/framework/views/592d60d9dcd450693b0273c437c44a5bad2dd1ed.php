<?php $__env->startSection('custom-css'); ?>
    <title><?php echo e(__('app.about_us')); ?></title>
<?php
  {{ $vprop = __('app.about_us_para1'); }}

    $meta_descr = strip_tags($vprop);
    $meta_descr1= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr1);
?>
<meta name="description" content="<?php echo e(isset($meta_descr1) ? $meta_descr1 : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">


    <?php echo e(Html::style('ui/css/bootstrap.min.css')); ?>

    <?php echo e(Html::style('ui/css/styles.css')); ?>

    <?php echo e(Html::style('ui/css/responsive.css')); ?>

    <?php echo e(Html::style('ui/css/owl.carousel.min.css')); ?>

    <?php echo e(Html::style('ui/css/custom.css')); ?>

    <?php echo e(Html::style('ui/css/font-awesome.css')); ?>

    <?php echo e(Html::style('ui/css/scroll-top.css')); ?>

    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <?php echo e(Html::script('ui/js/jquery-library.js')); ?>

    <?php echo e(Html::script('ui/js/popper.min.js')); ?>

    <?php echo e(Html::script('ui/js/bootstrap.min.js')); ?>

    <?php echo e(Html::script('ui/js/auto-search.js')); ?>

    <?php echo e(Html::script('ui/js/owl.carousel.min.js')); ?>

     <?php echo e(Html::script('ui/js/scroll_top.js')); ?>



    <script>
        // Testiminail Start
        $(document).ready(function(){
            $("#testimonial-slider").owlCarousel({
                items:1,
                itemsDesktop:[1000,1],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination:false,
                navigation:true,
                navigationText:["",""],
                autoPlay:true
            });
        });
        // Testimonial End

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("ui/images/About-banner.png")); ?> alt="about" />
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- About Us Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.about_us'); ?><p></p></span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-us-content">
                                <p><?php echo app('translator')->getFromJson('app.about_us_para1'); ?></p>
                                <p><?php echo app('translator')->getFromJson('app.about_us_para2'); ?></p>
                            </div>
                            <em class="content_tag_line"><?php echo app('translator')->getFromJson('app.about_us_para3'); ?></em>
                            <div class="about-us-content">
                                <p><?php echo app('translator')->getFromJson('app.about_us_para4'); ?></p>
                                <p><?php echo app('translator')->getFromJson('app.about_us_para5'); ?></p>
                                <p><?php echo app('translator')->getFromJson('app.about_us_para6'); ?></p>
                                <p><?php echo app('translator')->getFromJson('app.about_us_para7'); ?></p>
                                <p><?php echo app('translator')->getFromJson('app.about_us_para8'); ?></p>
                                <p><?php echo app('translator')->getFromJson('app.about_us_para9'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->
    <!-- Services Start -->
    <div class="wrapper">
        <div class="services-banner">
            <div class="main-container-wrapper">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src=<?php echo e(asset("ui/images/skyline.png")); ?> alt="skyline"/></span>
                                <abbr><?php echo app('translator')->getFromJson('app.real_estate_appraisal'); ?></abbr>
                                <p><?php echo app('translator')->getFromJson('app.real_estate_pleased'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src=<?php echo e(asset("ui/images/lifebuoy.png")); ?> alt="lifebuoy"/></span>
                                <abbr><?php echo app('translator')->getFromJson('app.friendly_customer_support'); ?></abbr>
                                <p><?php echo app('translator')->getFromJson('app.friendly_customer_pleased'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src=<?php echo e(asset("ui/images/premium-badge.png")); ?> alt="premium-badge"/></span>
                                <abbr><?php echo app('translator')->getFromJson('app.premium_quality'); ?></abbr>
                                <p><?php echo app('translator')->getFromJson('app.premium_quality_pleased'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service-list-wrapper">
                                <span><img src=<?php echo e(asset("ui/images/stopwatch.png")); ?> alt="stopwatch"></span>
                                <abbr><?php echo app('translator')->getFromJson('app.save_time'); ?></abbr>
                                <p><?php echo app('translator')->getFromJson('app.save_time_pleased'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
    <!-- About Us Content Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="main-heading main-heading1"><p><?php echo app('translator')->getFromJson('app.about_us_intro'); ?></p></span>
                <div class="about-us-content-btn">
                    <a href="<?php echo e(url('contact')); ?>"><?php echo app('translator')->getFromJson('app.contact_us'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Content End -->
    <!-- Testimonials Start -->
    <div class="wrapper">
        <div class="testimonials-wrapper">
            <div class="main-container-wrapper">
                <span class="testimonials-heading main-heading1"><?php echo app('translator')->getFromJson('app.testimonials'); ?></span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="testimonial-slider" class="owl-carousel">
                                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="testimonial">
                                    <div class="pic">
                                        <img src="<?php echo e(url('')); ?>/images/testimonial-covers/<?php echo e($testimonial->cover_image); ?>" alt="">
                                    </div>
                                    <p class="description">
                                        <i class="fas fa-quote-left pr-2"></i><?php echo e($testimonial->description); ?>”
                                    </p>
                                    <h3 class="title"><?php echo e(ucwords($testimonial->name)); ?>

                                    </h3>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
    </div>
    <!-- Testimonials End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>