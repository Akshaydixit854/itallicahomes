<?php $__env->startSection('custom-css'); ?>
        <title><?php echo e(__('app.new_arrival')); ?></title>
<?php
    if($properties && sizeof($properties)>0){
    $meta_descr = strip_tags($properties[0]->detail_description);
    $meta_descr= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);

}
?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

    <?php echo e(Html::style('ui/css/bootstrap.min.css')); ?>

    <?php echo e(Html::style('ui/css/styles.css')); ?>

    <?php echo e(Html::style('ui/css/responsive.css')); ?>

    <?php echo e(Html::style('ui/css/autosearch.css')); ?>

    <link rel="icon" href=<?php echo e(asset('/ui/images/favicon.png')); ?> sizes="16x16" type="image/png">
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
<?php $__env->stopSection(); ?>
<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
<?php
    $lang1 =Session::get('language');
?>
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
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.new_arrival'); ?></span>
                <div class="wrapper">
                    <div class="row">
                        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="properties-list-wrapper home-pro equal-height">
                                    <div class="properties-pic-section">
                                        <span><a href="<?php if($lang1 == 'en'): ?>                        
                                       <?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>

                                    <?php else: ?> <?php echo e(url(''.$lang1.'')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?><?php endif; ?>" class="properties-link"><img src=<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>></a></span>
                                        <ul class="properties-list">
                                            <?php if($property->beds > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->beds); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.bedrooms'); ?></abbr>
                                                    <em>&#xf236;</em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->baths > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->baths); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.baths'); ?></abbr>
                                                    <em>&#xf2cd;</em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->kitchens > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->kitchens); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.kitchen'); ?></abbr>
                                                    <em>&#xf0f5;</em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->parking > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->parking); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.parking'); ?></abbr>
                                                    <em><i class="fas fa-car"></i></em>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($property->fire_place > 0): ?>
                                                <li>
                                                    <span><?php echo e($property->fire_place); ?></span>
                                                    <abbr><?php echo app('translator')->getFromJson('app.fireplace'); ?></abbr>
                                                    <em><img src="<?php echo e(asset("ui/images/campfire.svg")); ?>" class="pro-icon-img small-icon"></em>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                        <?php
                                            $property_ui = (new \App\Services\PropertyService)->propertySingleResourceType($property->type_id);
                                        ?>
                                        <abbr class="red-tag" style="background: <?php echo e($property_ui->ui_color); ?>">
                                            <?php
                                                $property_type = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                            ?>
                                            <?php echo e($property_type); ?>


                                        </abbr>
                                    </div>
                                    <div class="properties-name">
                                        <?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                                            <span><em><?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_title_'.$property->id))); ?></em><i><a class="heart-fav" href="/favourite/<?php echo e($property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></span>
                                        <?php else: ?>
                                            <span><em><?php echo e((new \App\Services\PropertyService)->truncate($property->name)); ?></em><i><a  class="heart-fav"href="/favourite/<?php echo e($property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></span>
                                        <?php endif; ?>
                                        <abbr class="properties-loction"><em>&#xf041;</em>
                                            <?php if(\Lang::has('region.region_title_'.$property->region_id)): ?>
                                                <?php echo e(trans('region.region_title_'.$property->region_id)); ?>

                                            <?php else: ?>
                                                <?php echo e((new \App\Services\PropertyService)->getRegion($property->region_id)); ?>

                                            <?php endif; ?>

                                        </abbr>
                                        <i class="properties-price-doller"><span class="price-range"><?php echo e(number_format($property->price , 0, ',', '.')); ?></spa></i>
                                    </div>
                                    <div class="properties-decription">
                                        <?php if(\Lang::has('property.property_short_desc_'.$property->id)): ?>
                                            <?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$property->id),150)); ?>

                                        <?php else: ?>
                                            <?php echo e((new \App\Services\PropertyService)->truncate($property->short_description,150)); ?>

                                        <?php endif; ?>
                                    </div>
                                     <?php if($lang1 == 'en'): ?>
                                        <a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" class="properties-link"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(url(''.$lang1.'')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" class="properties-link"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                    <?php endif; ?>
                                                 
                                  
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="properties-view-all">
                        <a href="/search">View All</a>
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

            $('#js-contact-us').click(function(){
                if($('.error').length > 0){
                    $('.error').remove();
                }
                var name = $('.name').val();
                var email = $('.email').val();
                var question = $('.question').val();
                if(name.trim() == '' || email.trim() == '' || question.trim() == ''){
                    if(name.trim() == ''){
                        $('.name').after('<p class="error">Required</p>');
                    }
                    if(email.trim() == ''){
                        $('.email').after('<p class="error">Required</p>');
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>