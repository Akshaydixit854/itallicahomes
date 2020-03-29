<?php $__env->startSection('custom-css'); ?>
    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <!-- Custom CSS End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("ui/images/destination_banner.jpg")); ?> alt="banner"/>
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- FAQ Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper remove-box-shadow">
            <div class="main-container-wrapper">
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.privacy_policy'); ?><p></p></span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-us-content">
                                <?php if($PrivacyPolicy): ?>
                                    <?php if(Config::get('app.locale') == 'en'): ?>
                                        <?php echo $PrivacyPolicy->privacy_policy; ?>

                                    <?php elseif(Config::get('app.locale') == 'it'): ?>
                                        <?php echo $PrivacyPolicy->italian; ?>

                                    <?php elseif(Config::get('app.locale') == 'de'): ?>
                                        <?php echo $PrivacyPolicy->german; ?>

                                    <?php else: ?>
                                        <?php echo $PrivacyPolicy->privacy_policy; ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Start End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-js'); ?>
    <!-- Bootstrap JS Start -->
    <script src=<?php echo e(asset("ui/js/jquery-library.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/popper.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/bootstrap.min.js")); ?>></script>
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