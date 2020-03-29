<?php $__env->startSection('custom-css'); ?>
        <title><?php echo e(__('app.buyer_services')); ?></title>
<?php
    if($buyerService ){
    $meta_descr = strip_tags($buyerService->content);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
}

?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">
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
     
    </style>
    <!-- Custom CSS End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php
    $lang1 =  App::getLocale();
?>

    <div class="wrapper">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("images/buyerService-cover-images/". $buyerService->cover_image)); ?> alt="" />
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading">
                    <input type="hidden" name="post_id" id="post_id" value="<?php echo e($buyerService->id); ?>">
            <input type="hidden" name="post_img" id="post_img" value=<?php echo e(asset("images/post-cover-images/". $buyerService->cover_image)); ?>><?php echo app('translator')->getFromJson('app.buyer_services'); ?>

                </span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content" id="inner-blog-content">
                                  <?php if(\Lang::has('buyerServiceDesc.buyerService_description_'.$buyerService->id)): ?>
                                    <?php echo trans('buyerServiceDesc.buyerService_description_'.$buyerService->id); ?>

                                <?php else: ?>
                                    <?php echo $buyerService->content; ?>

                                <?php endif; ?>
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
    <!-- <script src=<?php echo e(asset("ui/js/owl.carousel.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/thumbnail-slider.js")); ?>></script> -->
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>