<?php $__env->startSection('custom-css'); ?>
        <title><?php echo e(__('app.type_of_properties')); ?></title>
<?php
if($propertyTypes && sizeof($propertyTypes)>0){
    $meta_descr = strip_tags($propertyTypes[0]->description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
    
}
?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?>)}} sizes="16x16" type="image/png">
    <!-- Bootstrap CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <!-- Custom CSS End -->
    <!-- Properties Slider Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/flexslider.css")); ?> type="text/css" media="screen" />
    <!-- Properties Slider End -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
    <?php echo e(Html::style('ui/css/font-awesome.css')); ?>

    <?php echo e(Html::style('ui/css/scroll-top.css')); ?>

<!--     <style type="text/css">
        body { background-color: #f2f2f2; }
#flexslider-carousel {
  margin: 0 auto;
  width: 300px;
  height: 453px;
}
.flex-next, .flex-prev { height: 46px !important; }
    </style> -->
    <style type="text/css">
        .flexslider .slides img {
        height: 208px;
}
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("ui/images/destination_banner.jpg")); ?> alt="banner" />
        </div>
    </div>
<?php
 $lang1 =Session::get('language');
    $srch='';
        {{ $search = __('app.search'); }}
       
        if($search == 'Search'){
            $srch = 'search'; 
        }elseif ($search == 'Suchen') {
            $srch = 'suchen';
        }elseif ($search == 'Cerca') {
            $srch = 'cerca';
        }
?>
    <!-- Banner Section End -->
    <!-- Destinations Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper remove-box-shadow">
            <div class="main-container-wrapper">
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.type_of_properties'); ?><p><?php echo app('translator')->getFromJson('app.category_report'); ?> <?php echo e($propertyTypeCount); ?> <?php echo app('translator')->getFromJson('app.subcategories'); ?></p></span>
                <div class="destinations-list-wrapper">
                    <div class="infinite-scroll">     
                    <div class="row">
                        <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <!--  <?php if($propertyType->ui_color == null): ?>
                            $propertyType->ui_color ='fas fa-house-damage';
                        <?php endif; ?> -->
                        <div class="col-md-12">
                            <div class="properties-type-wrapper">
                                <div class="properties-type-main">
                                    <div class="properties-type-inner-wrapper">
                                        <div class="houses-properties" style="background: <?php echo e($propertyType->ui_color); ?>">
                                            <div class="houses-properties-inner equal-height">
                                                <span class="<?php echo e($propertyType->ui_icon); ?> houses-properties-icon" style="color: <?php echo e($propertyType->ui_color); ?>"></span>
                                                <div class="properties-slider-wrapper">
                                                    <div class="properties-slider">
                                                                <?php   
                                                                    $services = (new \App\Services\PropertyService)->property_type_images($propertyType->id);
                                                                ?>
                                                        <div class="flexslider" id="flexslider">
                                                            <ul class="slides custom-properties-slider">
                                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <img src=<?php echo e(asset("/images/cover-images/".$service->image)); ?>>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                            <div id="flexslider-carousel" class="flexslider">
                                                            <ul class="slides">
                                                                 <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                
                                                            <li>
                                                                <img src="<?php echo e(url('')); ?>/images/cover-images/<?php echo e($service->image); ?>" />
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                            </div>
                                                    </div>
                                                    <div class="properties-des">
                                                        <span style="color: <?php echo e($propertyType->ui_color); ?>">
                                                            <?php if(App::isLocale('en')): ?>
                                                                <?php echo e($propertyType->type_name); ?>

                                                            <?php elseif(App::isLocale('it')): ?>
                                                                <?php echo e($propertyType->name_italian); ?>

                                                            <?php elseif(App::isLocale('de')): ?>
                                                                <?php echo e($propertyType->name_german); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                        <p>
                                                            <?php if(App::isLocale('en')): ?>
                                                                <?php echo e($propertyType->description); ?>

                                                            <?php elseif(App::isLocale('it')): ?>
                                                                <?php echo e($propertyType->content_italian); ?>

                                                            <?php elseif(App::isLocale('de')): ?>
                                                                <?php echo e($propertyType->content_german); ?>

                                                            <?php endif; ?>
                                                        </p>
                                                        <?php if($lang1 =='en'): ?>
                                                              <a class="btn btn-lg pro-ser-btn"  href="<?php echo e(url('')); ?>/search/type/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id)))); ?>" ><?php echo app('translator')->getFromJson('app.search'); ?></a>
                                                        <?php else: ?>
                                                            <a class="btn btn-lg pro-ser-btn"  href="<?php echo e(url(''.$lang1.'')); ?>/<?php echo e($srch); ?>/type/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id)))); ?>" ><?php echo app('translator')->getFromJson('app.search'); ?></a>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="houses-properties-img equal-height">
                                            <div class="houses-properties-img-display">
                                                <img src=<?php echo e(asset("ui/images/properties-img.jpg")); ?> >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($propertyTypes->links()); ?>

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
     <!-- Properties Slider Start -->
    <script src=<?php echo e(asset("ui/js/jquery.flexslider.js")); ?>></script>
    <script type="text/javascript">
            $(function() {
                $('#flexslider-carousel.flexslider').flexslider({
                animation: 'slide'
                });
            });

    </script>
  <!--   <script type="text/javascript">
        $(window).load(function(){
            alert('window load');
            $('#flexslider').flexslider({
                animation: "slide",
               /* controlNav:false,*/
                start: function(slider){
                    console.log('dsadad');
                   /* $('body').removeClass('loading');*/
                }
            });
        });
    </script> -->
    <!-- Properties Slider End -->
    <?php echo e(Html::script('ui/js/scroll_top.js')); ?>

    <?php echo e(Html::script('ui/js/jquery.jscroll.min.js')); ?>

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
                    $('#flexslider-carousel.flexslider').flexslider({
                    animation: 'slide'
                    });
                    $('ul.pagination').remove();
                  }
                });
            });
            </script>
   
    <script>
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

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>