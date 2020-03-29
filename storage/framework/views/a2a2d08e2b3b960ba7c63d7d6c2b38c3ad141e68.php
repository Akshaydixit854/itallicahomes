<?php $__env->startSection('custom-css'); ?>
    <title><?php echo e(__('app.destination')); ?></title>
<?php
if($destinations && sizeof($destinations)>0){
    $meta_descr = strip_tags($destinations[1]->description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
}
?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <?php echo e(Html::style('ui/css/font-awesome.css')); ?>

    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
    <?php echo e(Html::style('ui/css/scroll-top.css')); ?>

    <!-- Custom CSS End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $lang1 =Session::get('language');

    $single_dest='';
            {{ $desti = __('app.destination'); }}
         
            if($desti == 'Destinations'){
                $single_dest = 'destination'; 
            }elseif ($desti == 'Ort') {
                $single_dest = 'ort';
            }elseif ($desti == 'Luoghi') {
                $single_dest = 'luoghi';
            }

?>
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("ui/images/destination_banner.jpg")); ?> alt="banner"/>
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- Destinations Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper remove-box-shadow">
            <div class="main-container-wrapper">
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.destinations'); ?><p><?php echo app('translator')->getFromJson('app.destination_intro'); ?></p></span>
                <div class="destinations-list-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="destinations-list">
                                <div class="destinations-list-pic">
                                    <span>
                                       <img src=<?php echo e(asset("images/destination-covers/" . $destinations[0]->cover_image)); ?>>
                                    </span>
                                </div>
                                <div class="destinations-list-text">
                                    <span>
                                        <?php if(\Lang::has('destination.destination_title_'.$destinations[0]->id)): ?>
                                            <?php echo e(trans('destination.destination_title_'.$destinations[0]->id)); ?>

                                        <?php else: ?>
                                            <?php echo e($destinations[0]->destination_name); ?>

                                        <?php endif; ?>
                                    </span>
                                    <p>
                                        <?php if(\Lang::has('destination.destination_description_'.$destinations[0]->id)): ?>
                                            <span><?php echo substr(trans('destination.destination_description_'.$destinations[0]->id),0,100); ?></span>
                                        <?php else: ?>
                                            <?php echo substr($destinations[0]->description,0,100); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                                <?php if($lang1 == 'en'): ?>
                                        <a href="<?php echo e(url(''.$single_dest.'')); ?>/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destinations[0]->id)))); ?>" class="desti-view"><?php echo app('translator')->getFromJson('app.read_more'); ?> </a>
                                    <?php else: ?>
                                         <a href="<?php echo e(url(''.$lang1.'')); ?>/<?php echo e($single_dest); ?>/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destinations[0]->id)))); ?>" class="desti-view"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="infinite-scroll">             
                        <div class="row">
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($i != 0): ?>
                            <div class="col-md-6">
                                <div class="destinations-list">
                                    <div class="destinations-list-pic">
                                        <span>
                                           <img src=<?php echo e(asset("images/destination-covers/". $destination->cover_image)); ?>>
                                        </span>
                                    </div>
                                    <div class="destinations-list-text">
                                        <span>
                                        <?php if(\Lang::has('destination.destination_title_'.$destination->id)): ?>
                                            <?php echo e(trans('destination.destination_title_'.$destination->id)); ?>

                                        <?php else: ?>
                                            <?php echo e($destination->destination_name); ?>

                                        <?php endif; ?>
                                        </span>
                                        <p>
                                            <?php if(\Lang::has('destination.destination_description_'.$destination->id)): ?>
                                                <span><?php echo substr(trans('destination.destination_description_'.$destination->id),0,100); ?></span>
                                            <?php else: ?>
                                                <?php echo substr($destination->description,0,100); ?>

                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="destinations-view-btn">
                                    <?php if($lang1 == 'en'): ?>
                                        <a href="<?php echo e(url(''.$single_dest.'')); ?>/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destination->id)))); ?>" class="desti-view"><?php echo app('translator')->getFromJson('app.read_more'); ?> </a>
                                    <?php else: ?>
                                         <a href="<?php echo e(url(''.$lang1.'')); ?>/<?php echo e($single_dest); ?>/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getdestinationTitle(trans('destination.destination_title_'.$destination->id)))); ?>" class="desti-view"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                    <?php endif; ?>
                                      
                                    </div>
                                </div>
                            </div>
                                <?php endif; ?>
                            <?php
                                $i++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($destinations->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
             <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
        </div>
    </div>
    <!-- Destinations End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <!-- Bootstrap JS Start -->
    <script src=<?php echo e(asset("ui/js/jquery-library.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/popper.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/bootstrap.min.js")); ?>></script>
    <?php echo e(Html::script('ui/js/jquery.jscroll.min.js')); ?>

    <?php echo e(Html::script('ui/js/scroll_top.js')); ?>

            <script type="text/javascript">
              $('ul.pagination').hide();
              $(function() {              
                $('.infinite-scroll').jscroll({
                  autoTrigger: true,
                  loadingHtml: '<img class="center-block" src="<?php echo e(url('')); ?>/ui/images/giphy.gif" alt="Loading....." />',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>