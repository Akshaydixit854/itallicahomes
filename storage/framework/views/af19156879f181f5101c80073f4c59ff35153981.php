<?php $__env->startSection('custom-css'); ?>
<title>Home</title>
<?php
if($properties && sizeof($properties) > 1){
    $meta_descr = strip_tags($properties[1]->short_description);
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

    <?php echo e(Html::style('ui/css/font-awesome.css')); ?>

    <link rel="icon" href=<?php echo e(asset('/ui/images/favicon.png')); ?> sizes="16x16" type="image/png">
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
    <?php echo e(Html::style('ui/css/scroll-top.css')); ?>


<?php $__env->stopSection(); ?>


<?php if(Session::has('message')): ?>
<div class="fav-alert-box row">
   <div class="col-11">
      <p class="fav-alert alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><span class="fav-alert-icon"><i class="fas fa-heart"></i></span><?php echo e(Session::get('message')); ?></p>
   </div>
   <div class="col-1">
        <a href="javascript:void(0);" class="fav-alert-close"><i class="fas fa-times"></i></a>
   </div>
</div>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<?php

 $lang1 =Session::get('language');

 $prop='';
 {{ $vprop = __('app.properties'); }}
 if($vprop == 'Properties'){
 $prop = 'properties'; 
}elseif ($vprop == 'Immobili') {
$prop = 'immobili';
}elseif ($vprop == 'Immobillien') {
$prop = 'immobillien';
}

$abt='';
{{ $abt_us = __('app.about_us'); }}

if($abt_us == 'About Us'){
$abt = 'about'; 
}elseif ($abt_us == 'Über uns') {
$abt = 'uber_uns';
}elseif ($abt_us == 'Chi siamo') {
$abt = 'chi_siamo';
}


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
    <!-- Banner Section Start -->
    <div class="banner-cotent-wrapper">
        <div class="map-banner-section">
            <div class="map-banner">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%"
                     viewBox="0 0 290 170" enable-background="new 0 0 290 170" xml:space="preserve">
                      <g id="tooltip">
                          <image id="image0" width="100%" height="100%" x="0" y="0"
                                 xlink:href=<?php echo e(asset("ui/images/banner.png")); ?> alt="ssadas" class="imageshover"></image>
                      </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="1" name="Puglia" allocated_id="12" available_properties="<?php if(isset($property_count['Puglia'])): ?> <?php echo e($property_count['Puglia']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image01" class="" xlink:href=<?php echo e(asset("ui/images/frist-point1.png")); ?> width="20" height="18"
                               x="208" y="80"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="2" allocated_id="13" name="Basilicata" available_properties="<?php if(isset($property_count['Basilicata'])): ?> <?php echo e($property_count['Basilicata']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image02" xlink:href=<?php echo e(asset("ui/images/frist-point2.png")); ?> x="190" width="23" height="23"
                               y="90"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="3" allocated_id="10" name="Campania" available_properties="<?php if(isset($property_count['Campania'])): ?> <?php echo e($property_count['Campania']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image03" xlink:href=<?php echo e(asset("ui/images/frist-point3.png")); ?> height="26" width="34" y="93"
                               x="167"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="4" allocated_id="11" name="Sicilia" available_properties="<?php if(isset($property_count['Sicilia'])): ?> <?php echo e($property_count['Sicilia']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image04" xlink:href=<?php echo e(asset("ui/images/frist-point4.png")); ?> height="24" width="24" y="115"
                               x="160"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="5" allocated_id="12" name="Puglia" available_properties="<?php if(isset($property_count['Puglia'])): ?> <?php echo e($property_count['Puglia']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image05" xlink:href=<?php echo e(asset("ui/images/first-point5.png")); ?> height="18" width="20" x="185"
                               y="73"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="6" allocated_id="10" name="Campania ( Napoli)" available_properties="<?php if(isset($property_count['Campania ( Napoli)'])): ?> <?php echo e($property_count['Campania ( Napoli)']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image06" xlink:href=<?php echo e(asset("ui/images/first-point6.png")); ?> height="16" width="15" x="143"
                               y="80"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="50px" target="7" allocated_id="8" name="Toscana" available_properties="<?php if(isset($property_count['Toscana'])): ?> <?php echo e($property_count['Toscana']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image07" xlink:href=<?php echo e(asset("/ui/images/first-point7.png")); ?> height="20" width="20" y="58"
                               x="120"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="8" allocated_id="6" name="Emilia Romagna" available_properties="<?php if(isset($property_count['Emilia Romagna'])): ?> <?php echo e($property_count['Emilia Romagna']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image08" xlink:href=<?php echo e(asset("/ui/images/first-point8.png")); ?> height="14" width="14" x="107"
                               y="54"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="9" allocated_id="5" name="Marche" available_properties="<?php if(isset($property_count['Marche'])): ?> <?php echo e($property_count['Marche']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image09" xlink:href=<?php echo e(asset("/ui/images/first-point9.png")); ?> width="30" height="15" y="37"
                               x="112"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="10" allocated_id="1" name="Trentino Alto Adige" available_properties="<?php if(isset($property_count['Trentino Alto Adige'])): ?> <?php echo e($property_count['Trentino Alto Adige']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image010" xlink:href=<?php echo e(asset("/ui/images/first-point10.png")); ?> y="8" height="30" width="30"
                               x="125"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="11" allocated_id="2" name="Lombardia" available_properties="<?php if(isset($property_count['Lombardia'])): ?> <?php echo e($property_count['Lombardia']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image011" xlink:href=<?php echo e(asset("/ui/images/first-point11.png")); ?> height="28" width="28" x="84"
                               y="17"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="12" allocated_id="3" name="Piemonte" available_properties="<?php if(isset($property_count['Piemonte'])): ?> <?php echo e($property_count['Piemonte']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image012" xlink:href=<?php echo e(asset("/ui/images/first-point12.png")); ?> width="24" height="24" y="18"
                               x="56"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="13" allocated_id="4" name="Liguria" available_properties="<?php if(isset($property_count['Liguria'])): ?> <?php echo e($property_count['Liguria']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image013" xlink:href=<?php echo e(asset("/ui/images/first-point13.png")); ?> height="36" width="36" y="39"
                               x="67"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="14" allocated_id="3" name="Piemonte" available_properties="<?php if(isset($property_count['Piemonte'])): ?> <?php echo e($property_count['Piemonte']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image014" xlink:href=<?php echo e(asset("/ui/images/first-point14.png")); ?> height="16" width="16" y="92"
                               x="78"></image>
                        </a>
                    </g>
                    <g class="italica-view showSingle" width="100px" height="100px" target="15" allocated_id="14" name="Sardegna" available_properties="<?php if(isset($property_count['Sardegna'])): ?> <?php echo e($property_count['Sardegna']); ?> <?php else: ?> <?php echo e(0); ?> <?php endif; ?>">
                        <a href="#">
                        <image id="image015" xlink:href=<?php echo e(asset("/ui/images/first-point15.png")); ?> width="22" height="22" x="79"
                               y="100"></image>
                        </a>
                    </g>
                    </svg>
                <!-- frist-point1 Start-->
                <div class="targetDiv" id="output">
                    <div class="properties-hover-view">
                        <span><img src=<?php echo e(asset("/ui/images/list.png")); ?> /></span>
                        <abbr>
                            <i class="property_count">7568</i>
                            <em class="property_name">Villas & Houses For Sale</em>
                            <a id="go-to-property-search" href="javascript:void(0)">Click Here</a>
                        </abbr>
                        <a href="javascript:void(0)" class="showSingle1">&#xf00d;</a>
                    </div>
                </div>
                <!--frist-point1 End-->
            </div>
        </div>
        <div class="banner-inner-content">
            <div class="main-container-wrapper">
                <div class="scroll-down-section bounce">
                    <a href="#scrolldown"><img src=<?php echo e(asset("/ui/images/scroll-down.png")); ?>><span><?php echo app('translator')->getFromJson('app.scroll_down'); ?></span></a>
                </div>
                <div class="search-bar-section"><span><?php echo app('translator')->getFromJson('app.villas'); ?> <i><?php echo app('translator')->getFromJson('app.and'); ?></i> <?php echo app('translator')->getFromJson('app.houses'); ?> <i><?php echo app('translator')->getFromJson('app.for_sale_in'); ?></i></span>
                    <abbr><?php echo app('translator')->getFromJson('app.italy_tuscany'); ?></abbr>
                </div>
                <div class="search-bar-form">
                     <?php if($lang1 == 'en'): ?>
                        <form action="<?php echo e(url('search')); ?>" method="POST" class="home-search-form">

                     <?php else: ?> 
                         <form action="<?php echo e(url(''.$lang1.'')); ?>/<?php echo e($srch); ?>" method="POST" class="home-search-form">

                     <?php endif; ?>

                        <?php echo e(csrf_field()); ?>

                        <!-- <abbr>
                            <input type="text" name="q" placeholder="Find near by Properties" id="autosearchbar"/>
                            <input type="submit" value="Search"/>
                        </abbr> -->
                        <abbr>
                            <input type="text" name="q" placeholder="<?php echo app('translator')->getFromJson('app.find_near_by_properties'); ?>" id="autosearchbar"/>
                            <a href="javascript:void(0)" class="home-search-icon">&#xf002</a>
                        </abbr>
                        <span>
                            <abbr><i></i></abbr>
                            <input class="home-search-btn" type="submit" value="<?php echo app('translator')->getFromJson('app.search'); ?>"/>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- Added Properties Start -->
    <div class="wrapper" id="scrolldown">
        <div class="properties-banner">
            <div class="main-container-wrapper">
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.recently_added_properties'); ?></span>
                <div class="wrapper">
                    <div class="infinite-scroll">
                        <div class="row">
                            <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">
                                    <div class="properties-list-wrapper home-pro equal-height">
                                        <div class="properties-pic-section">
                                            <span><a href="<?php if($lang1 == 'en'): ?>                        
                                       <?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>

                                    <?php else: ?> <?php echo e(url(''.$lang1.'')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?><?php endif; ?>" class=""><img src=<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>></a></span>
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
                                                if(isset($property_ui->ui_color)){
                                                    $color = $property_ui->ui_color;
                                                }else{
                                                    $color = '';
                                                }
                                            ?>
                                            <abbr class="red-tag" style="background: <?php echo e($color); ?>">
                                                <?php
                                                    $property_type = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                                ?>
                                                <?php echo e($property_type); ?>


                                            </abbr>
                                        </div>
                                        <div class="properties-name">
                                            <?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                                                <span><em><?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_title_'.$property->id))); ?></em><i><a class="heart-fav" href="<?php echo e(url('')); ?>/favourite/<?php echo e($property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></span>
                                            <?php else: ?>
                                                <span><em><?php echo e((new \App\Services\PropertyService)->truncate($property->name)); ?></em><i><a  class="heart-fav"href="<?php echo e(url('')); ?>/favourite/<?php echo e($property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></span>
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
                            <?php echo e($properties->links()); ?>

                        </div>
                    </div>
                   <!--  <div class="properties-view-all">
                        <a href="<?php echo e(url('search')); ?>"><?php echo app('translator')->getFromJson('app.view_all'); ?></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Added Properties End -->
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
    <!-- About Us Start -->
    <div class="wrapper">
        <div class="about-us-banner">
            <div class="main-container-wrapper">
                <span class="main-heading"><?php echo app('translator')->getFromJson('app.about_us'); ?></span>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="about-us-content">
                                <p><?php echo app('translator')->getFromJson('app.about_us_para1'); ?></p>
                                <p><?php echo app('translator')->getFromJson('app.about_us_para2'); ?></p>
                                 <?php if($lang1 == 'en'): ?>
                                   <a href="<?php echo e(url(''.$abt.'')); ?>"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                 <?php else: ?>
                                   <a href="<?php echo e(url(''.$lang1.'')); ?>/<?php echo e($abt); ?>"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                 <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="about-right-side-img">
                                <img src=<?php echo e(asset("ui/images/about-pic.png")); ?> alt="about-pic" class="responsive"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
    <!-- About Us End -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-js'); ?>
    <?php echo e(Html::script('ui/js/jquery-library.js')); ?>

    <?php echo e(Html::script('ui/js/popper.min.js')); ?>

    <?php echo e(Html::script('ui/js/bootstrap.min.js')); ?>

    <?php echo e(Html::script('ui/js/auto-search.js')); ?>

    <?php echo e(Html::script('ui/js/jquery.matchHeight-min.js')); ?>

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

                //to fade Out favorite alert message on page load
                if($('.fav-alert-box').length){
                    $('.fav-alert-box').fadeOut(4000);
                }
            });

            </script>
    <script>

        // Autosearch Start
        $( function() {
            var availableTags = [];
            var URL = "<?php echo e(url('')); ?>/properties/autocomplete";
            $.ajax({
                url: URL,
                dataType: "JSON",
                type: "GET",
                success: function(data){
                    var properties = data.properties;
                    console.log(properties);
                    for(var i = 0;i < properties.length;i++){
                        availableTags.push(properties[i]['name']);
                        availableTags.push(properties[i]['property_id']);
                    }
                    
                }
            });
            $( "#autosearchbar" ).autocomplete({
                source: availableTags,
            });
        } );
        // Autosearch End
        // Match Height
        $(function() {
            $('.equal-height').matchHeight({
                byRow: true,
                property: 'height'
            });
        });
        // Map Start
        $(function () {
            $('.targetDiv').hide();
            $('.showSingle').mouseover(function () {

                var target = $(this).attr('target');
                var name = $(this).attr('name');
                var available_properties = $(this).attr('available_properties');
                var alloted_id = $(this).attr('allocated_id');
                var url = "<?php echo e(url('/search/region')); ?>"+'/'+alloted_id;
                $('#go-to-property-search').attr('href',url);
                $('.property_count').text(available_properties);
                $('.property_name').text(name);
                var left, top, offsets;
                offsets = $(this).offset();
                left = offsets.left;
                top = offsets.top - 60;

                $('#output').css({position: "absolute", left: left, top: top}).show();
//const refEl = $(this);
//const popEl = document.getElementById('output');

//new Popper(refEl, popEl, {
 // placement: 'right'
//});

            });
        });

        $('.showSingle1').click(function () {
            //$('.targetDiv').hide();
            $('.targetDiv').hide();
        });
        // Scroll Down Start
        $(function () {
            $('a[href*=#]').on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top}, 1000, 'linear');
            });
        });
        // Scroll Down End
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

            $('.home-search-icon').click(function(){
                $('.home-search-form').submit();
            });
        });
        // Responsive Menu  Start
    </script>
    <script>
          $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut();
          });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>