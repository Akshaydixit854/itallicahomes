<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google-site-verification" content="U7tz4WZDuVfasOYOftvEVUGJBQs7-m3NfJbX7iSeAkE" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $__env->yieldContent('custom-css'); ?>
</head>
<body>
<div class="wrapper">
    <!-- Header Start -->
    <header>
        <div class="top-header-nav">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="top-header-menu">
                        <ul class="top-notice">
                                <li><a href="<?php echo e(url(''.__('route.your_fav_properties').'')); ?>"><i <?php if((new \App\Services\PropertyService)->getFavCount() > 0): ?> style="color: red;" <?php endif; ?>;>&#xf004;</i><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?> (<?php echo e((new \App\Services\PropertyService)->getFavCount()); ?>)</a></li>
                                <li><a href="http://italicarentals.com" target="_blank"><?php echo app('translator')->getFromJson('app.holiday_villas'); ?></a></li>
                                <li><a href="http://livingart-online.com" target="_blank"><?php echo app('translator')->getFromJson('app.luxury_properties'); ?></a></li>
                                <li><a href="<?php echo e(url(''.__('route.legal_notice').'')); ?>"><?php echo app('translator')->getFromJson('app.legal_notice'); ?></a></li>
                                <li><a href="<?php echo e(url(''.__('route.terms_conditions').'')); ?>"><?php echo app('translator')->getFromJson('app.terms_conditions'); ?></a></li>
                        </ul>
                        <ul class="top-social-icon">
                            <li><a target="_blank" href="https://www.facebook.com/italicahomes/"
                                   class="facebook-icon-color">&#xf082;</a></li>
                            <li><a  target="_blank" href="https://twitter.com/livingartIT" class="twitter-icon-color">&#xf081;</a></li>
                            <li><a  target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="linkedin-icon-color">&#xf08c;</a></li>
                        </ul>
                        <ul class="language-list">
                            <li>
                              <!--  <?php $__currentLoopData = \Config::get('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($code == 'en'): ?>
                                    <a href="/locale/en" style="<?php if($code == 'en'): ?> ? 'color:green': 'color:black' <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/english.png")); ?>><?php echo e($lang); ?> </a>
                                
                                <?php elseif($code == 'it'): ?>
                                    <a href="/locale/it" style="<?php if($code == 'it'): ?> <?php echo e('color:green'); ?> <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/italian.png")); ?>><?php echo e($lang); ?></a>
                                   
                                <?php elseif($code == 'de'): ?>
                                    <a href="/locale/de" style="<?php if($code == 'de'): ?> <?php echo e('color:green'); ?> <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/german.png")); ?>><?php echo e($lang); ?></a>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                
                                  <?php $__currentLoopData = \Config::get('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($code == 'en'): ?>
                                    <a href="https://www.italicahomes.com/<?php echo e(request()->path()); ?>" style="<?php if($code == 'en'): ?> ? 'color:green': 'color:black' <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/english.png")); ?>><?php echo e($lang); ?> </a>
                                
                                <?php elseif($code == 'it'): ?>
                                    <a href="http://www.<?php echo e($code); ?>.italicahomes.com/<?php echo e(request()->path()); ?>" style="<?php if($code == 'it'): ?> <?php echo e('color:green'); ?> <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/italian.png")); ?>><?php echo e($lang); ?></a>
                                   
                                <?php elseif($code == 'de'): ?>
                                    <a href="http://www.<?php echo e($code); ?>.italicahomes.com/<?php echo e(request()->path()); ?>" style="<?php if($code == 'de'): ?> <?php echo e('color:green'); ?> <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/german.png")); ?>><?php echo e($lang); ?></a>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-wrapper">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-1 responsive-logo" style="margin-right:17px;">
                        <a href=<?php echo e(route('home')); ?> class="logo"><img src=<?php echo e(asset("/ui/images/logo.png")); ?> /></a>
                    </div>
                    <div class="col-md-10 responsive-menu">
                        <div id="menuBtn" class="">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul class="menu-list">
                            <li class="<?php echo e($active == 'home' ? 'active' : ''); ?>">
                                <a href=<?php echo e(route("home")); ?>><i>&#xf015;</i><?php echo e(trans('app.home')); ?></a>
                            </li>
                            <li class="<?php echo e($active == 'about' ? 'active' : ''); ?>">
                                 <a href="<?php echo e(url(''.__('route.about_us').'')); ?>"><i>&#xf0b1;</i><?php echo app('translator')->getFromJson('app.about_us'); ?></a>
                            </li>
                              
                            <li class="<?php echo e($active == 'property' ? 'active' : ''); ?>">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i><?php echo app('translator')->getFromJson('app.properties'); ?></a>
                                <ul>
                                    <li><a href="<?php echo e(url('')); ?>/search"><?php echo app('translator')->getFromJson('app.view_all_properties'); ?></a>
                                    </li>
                                    <li><a href="<?php echo e(url('')); ?>//search/2"><?php echo app('translator')->getFromJson('app.properties_for_rent'); ?></a></li>
                                    <li><a href="<?php echo e(url('')); ?>/search/1"><?php echo app('translator')->getFromJson('app.properties_for_sale'); ?></a></li>
                                    <li><a href="<?php echo e(url('')); ?>/search/3"><?php echo app('translator')->getFromJson('app.properties_for_rent_sale'); ?></a></li>
                                    <li><a href="<?php echo e(url(''.__('route.your_fav_properties').'')); ?>"><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?></a></li>
                                    <li><a href="<?php echo e(url(''.__('route.new_arrival_properties').'')); ?>"><?php echo app('translator')->getFromJson('app.new_arrival'); ?></a></li>
                                    <li>
                                        <a href="<?php echo e(url(''.__('route.type_of_properties').'')); ?>"><?php echo app('translator')->getFromJson('app.type_of_properties'); ?></a>
                                        <ul>
                                            <?php
                                            $propertyTypes = (new \App\Services\PropertyService)->propertyType();
                                            ?>
                                            <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php
                                            $property_type_name= '';
                                            $language =  App::getLocale();
                                            if($language == 'en'){
                                            $property_type_name = $propertyType->type_name;
                                            }elseif($language == 'it'){
                                            $property_type_name = $propertyType->name_italian;
                                            }elseif($language == 'de'){
                                            $property_type_name = $propertyType->name_german;
                                            }
                                            ?>
                                            <li><a href="<?php echo e(url('')); ?>/search/type/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id)))); ?>"><?php echo e(isset($property_type_name) ? $property_type_name : ''); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url(''.__('route.destinations').'')); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo e($active == 'blog' ? 'active' : ''); ?>">
                                <a href=<?php echo e(url('blogs')); ?>><i>&#xf02d;</i><?php echo app('translator')->getFromJson('app.blog'); ?></a>
                            </li>
                            <li class="<?php echo e($active == 'faq' ? 'active' : ''); ?>">
                                <a href=<?php echo e(url('faq/0')); ?>><i>&#xf27a;</i><?php echo app('translator')->getFromJson('app.faq'); ?></a>
                            </li>
                            <li class="<?php echo e($active == 'ownerServices' || $active == 'buyerServices'  ? 'active' : ''); ?>">
                                <a href="javascript:void(0);"><i>&#xf054;<!--&#xf013; &#xf3da; --></i><?php echo app('translator')->getFromJson('app.services'); ?></a>
                                <ul>
                                    <li><a href="<?php echo e(url(''.__('route.owner_services').'')); ?>">Owner</a>
                                    </li>
                                    <li><a href="<?php echo e(url(''.__('route.buyer_services').'')); ?>">Buyer</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo e($active == 'contact' ? 'active' : ''); ?>">
                                <a href="<?php echo e(url(''.trans('route.contact').'')); ?>"><i>&#xf2b9;</i><?php echo app('translator')->getFromJson('app.contact'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url(''.__('route.destinations').'')); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
<?php echo $__env->yieldContent('content'); ?>
<!-- Footer Start -->
    <footer>
        <div class="footer-main-banner">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href=<?php echo e(route('home')); ?> class="footer-logo"><img
                                    src=<?php echo e(asset("/ui/images/footter-logo.png")); ?> alt="logo"></a>
                        <ul class="footer-menu-list">
                            <li>
                                <p><?php echo app('translator')->getFromJson('app.foot_para'); ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span><?php echo app('translator')->getFromJson('app.quick_links'); ?></span>
                            </li>
                            <li>
                                <span><a href=<?php echo e(url(''.__('route.about_us').'')); ?>><?php echo app('translator')->getFromJson('app.about_us'); ?></a></span>
                            </li>
                            <li>
                                <span><a href=<?php echo e(route(''.__('route.search').'')); ?>><?php echo app('translator')->getFromJson('app.properties'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.__('route.destinations').'')); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.__('route.new_arrival_properties').'')); ?>"><?php echo app('translator')->getFromJson('app.new_arrival'); ?></a></span>
                            </li>
                             <li>
                                <span><a href="<?php echo e(url(''.__('route.your_fav_properties').'')); ?>"><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?> </a>(<?php echo e((new \App\Services\PropertyService)->getFavCount()); ?>)</span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url('')); ?>/blogs"><?php echo app('translator')->getFromJson('app.blog'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url('faq/0')); ?>"><?php echo app('translator')->getFromJson('app.faq'); ?></a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span><?php echo app('translator')->getFromJson('app.registered_office'); ?></span>
                            </li>
                            <li>
                                <span><?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('registred_address') ?? 'Schömerweg 14 94060 Pocking/Germany'); ?></span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.tel'); ?> <?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('registred_telephone') ?? '+49 08538 2659988'); ?></span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.fax'); ?> <?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('registred_fax') ?? '+49 0821 9998501223'); ?></span>
                            </li>
                            <li>
                                <span class="pt12"><a href="mailto:<?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('registred_mail') ?? 'info@italicahomes.com'); ?>"><?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('registred_mail') ?? 'info@italicahomes.com'); ?></a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span><?php echo app('translator')->getFromJson('app.service_office_italy'); ?></span>
                            </li>
                            <li>
                                <span><?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('service_address') ?? 'via degli Olmi 31 54100 Massa/Italy'); ?></span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.tel'); ?> <?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('service_telephone') ?? '+39 0585 807818'); ?></span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.fax'); ?> <?php echo e((new App\Http\Controllers\Admin\AdminSettingController)->getSettingsValue('service_fax') ?? '+39 0585 807 818'); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <ul class="social-media-link">
                            <li>
                                <span><?php echo app('translator')->getFromJson('app.get_in_touch'); ?></span>
                            </li>
                            <li><a href="https://www.facebook.com/italicahomes/">&#xf082;</a></li>
                            <li><a href="https://twitter.com/livingartIT">&#xf081;</a></li>
                            <li><a href="https://www.linkedin.com/in/lenka-fridrich-447b9318/">&#xf08c;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper">
                    <ul class="footer-menu-home-list">
                        <li>
                            <a href=<?php echo e(url(''.__('route.privacy_policy').'')); ?>><?php echo app('translator')->getFromJson('app.privacy_policy'); ?></a>
                        </li>
                        <li>
                            <a href=<?php echo e(url(''.__('route.terms_conditions').'')); ?>><?php echo app('translator')->getFromJson('app.terms_use'); ?></a>
                        </li>
                        <li>
                            <a href=<?php echo e(url(''.__('route.legal_notice').'')); ?>><?php echo app('translator')->getFromJson('app.legal_notice'); ?></a>
                        </li>
                        <li>
                            <a href=<?php echo e(url(''.trans('route.contact').'')); ?>><?php echo app('translator')->getFromJson('app.contact_us'); ?></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><?php echo app('translator')->getFromJson('app.site_map'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-copy-right-block">
            <div class="main-container-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <span class="copy-right-text"><?php echo app('translator')->getFromJson('app.Copyright'); ?> <?php echo e(date('Y')); ?> <?php echo app('translator')->getFromJson('app.app-name'); ?> &#44; <?php echo app('translator')->getFromJson('app.all_rights_reserved'); ?> &#x002E;</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
</div>
<?php echo $__env->yieldContent('custom-js'); ?>
 <!-- <script src="https://kit.fontawesome.com/bce09a172b.js"></script> -->
 
 <?php echo e(Html::script('ui/js/bce09a172b.js')); ?>

<?php echo e(Html::script('ui/js/jquery.matchHeight-min.js')); ?>


<!-- Global site tag (gtag.js) - Google Analytistrcs -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114506662-1"></script> -->
<script>
/*$(function(){
        var url = window.location.href;
        var segments = url.split( '/' );
        var pathArray = window.location.pathname.split('/');
        alert(pathArray);
        alert('<?php echo e(__('app.about_us')); ?>');
    var subdomain =  window.location.host.split('.')[1] ? window.location.host.split('.')[1] : false;
    alert(subdomain);
});*/
   
    
    
</script>

</body>
</html>
