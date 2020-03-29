<!doctype html>
<html>
<head>
    <meta name="google-site-verification" content="U7tz4WZDuVfasOYOftvEVUGJBQs7-m3NfJbX7iSeAkE" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $__env->yieldContent('custom-css'); ?>

</head>
<body>
       <?php
       $lang1 =Session::get('language');
             $vcontact='';
                                {{ $contct = __('app.contact'); }}
                               
                                if($contct == 'Contact'){
                                    $vcontact = 'contact'; 
                                }elseif ($contct == 'Contatti') {
                                    $vcontact = 'contatti';
                                }elseif ($contct == 'Kontakt') {
                                    $vcontact = 'kontakt';
                                }

                                        $dest='destinations';
                                        {{ $destination = __('app.destinations'); }}

                                        if($destination == 'Destinations'){
                                            $dest = 'destinations'; 
                                        }elseif ($destination == 'Ort') {
                                            $dest = 'ort';
                                        }elseif ($destination == 'Luoghi') {
                                            $dest = 'luoghi';
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

                                         $fav ='';
                                        {{ $your_fav = __('app.your_fav_properties'); }}
                                    
                                        if($your_fav == 'Your Favorite Properties'){
                                            $fav = 'myfavourite'; 
                                        }elseif($your_fav == 'Ihre Favoriten') {
                                            $fav = 'ihre_favoriten';
                                        }elseif ($your_fav == 'Preferiti') {
                                            $fav = 'preferiti';
                                        }

                                        $legal ='';
                                        {{ $legal_notice = __('app.legal_notice'); }}
                                       
                                        if($legal_notice == 'Legal Notice'){
                                            $legal = 'legal_notice'; 
                                        }elseif($legal_notice == 'Impressum') {
                                            $legal = 'impressum';
                                        }elseif ($legal_notice == 'Informazioni Legali') {
                                            $legal = 'informazioni_legali';
                                        }


                                        $terms ='';
                                        {{ $terms_cond = __('app.terms_conditions'); }}
                                   
                                        if($terms_cond == 'Terms & Conditions'){
                                            $terms = 'terms_and_conditions'; 
                                        }elseif($terms_cond == 'AGB´s') {
                                            $terms = 'AGB';
                                        }elseif ($terms_cond == 'Termini & Condizioni') {
                                            $terms = 'Termini_condizioni';
                                        }

                                         $new_arrival ='';
                                        {{ $new_arr = __('app.new_arrival_properties'); }}
                                        if($new_arr == 'New Arrival Properties'){
                                            $new_arrival = 'new_arrivals'; 
                                        }elseif($new_arr == 'Neue Objekte') {
                                            $new_arrival ='neue_objekte';
                                        }elseif ($new_arr == 'Nuove proprietà di arrivo') {
                                            $new_arrival = 'nuove_di_arrivo';
                                        }

                                        $privacy ='';
                                        {{ $privacy_polcy = __('app.privacy_policy'); }}
                                      
                                        if($privacy_polcy == 'Privacy Policy'){
                                            $privacy = 'privacy_policy'; 
                                        }elseif($privacy_polcy == 'Datenschutz') {
                                            $privacy = 'datenschutz';
                                        }elseif ($privacy_polcy == 'politica sulla riservatezza') {
                                            $privacy = 'politica_sulla_riservatezza';
                                        }

                                        $prop_type ='';
                                        {{ $type_properties = __('app.type_of_properties'); }}
                                      
                                        if($type_properties == 'Type of Properties'){
                                            $prop_type = 'category-property'; 
                                        }elseif($type_properties == 'Immobilien-Arten') {
                                            $prop_type = 'immobilien_arten';
                                        }elseif ($type_properties == 'Tipologia') {
                                            $prop_type = 'tipologia';
                                        }


                                        $ownerservices='';
                                        {{ $oserv = __('app.owner_services'); }}
                                        if($oserv == 'Owner Services'){
                                        $ownerservices = 'owner_services'; 
                                    }elseif ($oserv == 'Besitzer Services') {
                                    $ownerservices = 'besitzer_services';
                                }elseif ($oserv == 'Servizi al proprietario') {
                                $ownerservices = 'servizi_al_proprietario';
                            }

                            $bservices='';
                            {{ $bserv = __('app.buyer_services'); }}
                            // dump($bserv);
                            if($bserv == 'Buyer Services'){
                            $bservices = 'buyer_services'; 
                        }elseif ($bserv == 'Käufer Services') {
                        $bservices = 'kaufer_services';
                    }elseif ($bserv == 'Servizi per Compratore') {
                    $bservices = 'servizi_per_compratore';
                }            


                                      
        ?>
<div class="wrapper">
    <!-- Header Start -->
    <header>
        <div class="top-header-nav">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="top-header-menu">
                        <ul class="top-notice">
                            <?php
                                $language =  App::getLocale();
                            ?>
                            <?php if($language == 'en'): ?>
                                <li><a href="<?php echo e(url(''.$fav.'')); ?>"><i <?php if((new \App\Services\PropertyService)->getFavCount() > 0): ?> style="color: red;" <?php endif; ?>;>&#xf004;</i><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?> (<?php echo e((new \App\Services\PropertyService)->getFavCount()); ?>)</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($fav); ?>"><i <?php if((new \App\Services\PropertyService)->getFavCount() > 0): ?> style="color: red;" <?php endif; ?>;>&#xf004;</i><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?> (<?php echo e((new \App\Services\PropertyService)->getFavCount()); ?>)</a></li>
                            <?php endif; ?>
                            <?php if($language == 'en'): ?>
                                <li><a href="http://italicarentals.com" target="_blank"><?php echo app('translator')->getFromJson('app.holiday_villas'); ?></a></li>
                                <li><a href="http://livingart-online.com" target="_blank"><?php echo app('translator')->getFromJson('app.luxury_properties'); ?></a></li>
                            <?php elseif($language == 'it'): ?>
                                <li><a href="http://it.italicarentals.com" target="_blank"><?php echo app('translator')->getFromJson('app.holiday_villas'); ?></a></li>
                                <li><a href="http://livingart-online.com" target="_blank"><?php echo app('translator')->getFromJson('app.luxury_properties'); ?></a></li>
                            <?php elseif($language == 'de'): ?>
                                <li><a href="http://de.italicarentals.com" target="_blank"><?php echo app('translator')->getFromJson('app.holiday_villas'); ?></a></li>
                                <li><a href="http://livingart-online.com" target="_blank"><?php echo app('translator')->getFromJson('app.luxury_properties'); ?></a></li>
                            <?php else: ?>
                                <li><a href="http://italicarentals.com" target="_blank"><?php echo app('translator')->getFromJson('app.holiday_villas'); ?></a></li>
                                <li><a href="http://livingart-online.com" target="_blank"><?php echo app('translator')->getFromJson('app.luxury_properties'); ?></a></li>
                            <?php endif; ?>
                             <?php if($language == 'en'): ?>
                                <li><a href="<?php echo e(url(''.$legal.'')); ?>"><?php echo app('translator')->getFromJson('app.legal_notice'); ?></a></li>
                                <li><a href="<?php echo e(url(''.$terms.'')); ?>"><?php echo app('translator')->getFromJson('app.terms_conditions'); ?></a></li>

                             <?php else: ?>
                                 <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($legal); ?>"><?php echo app('translator')->getFromJson('app.legal_notice'); ?></a></li>
                                <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($terms); ?>"><?php echo app('translator')->getFromJson('app.terms_conditions'); ?></a></li>

                             <?php endif; ?>
                        </ul>
                        <ul class="top-social-icon">
                            <li><a target="_blank" href="https://www.facebook.com/italicahomes/"
                                   class="facebook-icon-color">&#xf082;</a></li>
                            <li><a  target="_blank" href="https://twitter.com/livingartIT" class="twitter-icon-color">&#xf081;</a></li>
                            <li><a  target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="linkedin-icon-color">&#xf08c;</a></li>
                            
                        </ul>
                        <ul class="language-list">
                            <li ><a href="<?php echo e(url('/')); ?>/locale/en" style="<?php if(Config::get('app.locale') == 'en'): ?> <?php echo e('color:green'); ?> <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/english.png")); ?>><?php echo app('translator')->getFromJson('app.english'); ?></a></li>
                            <li><a href="<?php echo e(url('/')); ?>/locale/it" style="<?php if(Config::get('app.locale') == 'it'): ?> <?php echo e('color:green'); ?> <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/italian.png")); ?>><?php echo app('translator')->getFromJson('app.italian'); ?></a></li>
                            <li><a href="<?php echo e(url('/')); ?>/locale/de" style="<?php if(Config::get('app.locale') == 'de'): ?> <?php echo e('color:green'); ?> <?php endif; ?>"><img src=<?php echo e(asset("/ui/images/german.png")); ?>><?php echo app('translator')->getFromJson('app.german'); ?></a></li>
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
                             <?php if($language == 'en'): ?>
                                <li class="<?php echo e($active == 'about' ? 'active' : ''); ?>">
                                     <a href="<?php echo e(url(''.$abt.'')); ?>"><i>&#xf0b1;</i><?php echo app('translator')->getFromJson('app.about_us'); ?></a>
                                </li>

                               <?php else: ?>
                                 <li class="<?php echo e($active == 'about' ? 'active' : ''); ?>">
                                     <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($abt); ?>"><i>&#xf0b1;</i><?php echo app('translator')->getFromJson('app.about_us'); ?></a>
                                </li>

                             <?php endif; ?>
                            <li class="<?php echo e($active == 'property' ? 'active' : ''); ?>">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i><?php echo app('translator')->getFromJson('app.properties'); ?></a>
                                <ul>
                                    
                                     <?php if($language == 'en'): ?>
                                     <li><a href="<?php echo e(url('')); ?>/search"><?php echo app('translator')->getFromJson('app.view_all_properties'); ?></a>
                                    </li>
                                    <li><a href="<?php echo e(url('')); ?>//search/2"><?php echo app('translator')->getFromJson('app.properties_for_rent'); ?></a></li>
                                    <li><a href="<?php echo e(url('')); ?>/search/1"><?php echo app('translator')->getFromJson('app.properties_for_sale'); ?></a></li>
                                    <li><a href="<?php echo e(url('')); ?>/search/3"><?php echo app('translator')->getFromJson('app.properties_for_rent_sale'); ?></a></li>
                                     <li><a href="<?php echo e(url(''.$fav.'')); ?>"><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?></a></li>
                                      <li><a href="<?php echo e(url(''.$new_arrival.'')); ?>"><?php echo app('translator')->getFromJson('app.new_arrival'); ?></a></li>
                                          <li>
                                        <a href="<?php echo e(url(''.$prop_type.'')); ?>"><?php echo app('translator')->getFromJson('app.type_of_properties'); ?></a>
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
                                                   <!--  <li><a href="<?php echo e(url(''.$srch.'')); ?>/type/<?php echo e($propertyType->id); ?>"><?php echo e(isset($property_type_name) ? $property_type_name : ''); ?></a></li> -->
                                                  <!--     <li><a href="<?php echo e(url(''.$srch.'')); ?>/type/<?php echo e(preg_replace('/[[:space:]]+/', '+',$property_type_name)); ?>"><?php echo e(isset($property_type_name) ? $property_type_name : ''); ?></a></li> -->
                                                  <li><a href="<?php echo e(url('')); ?>/search/type/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id)))); ?>"><?php echo e(isset($property_type_name) ? $property_type_name : ''); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <?php else: ?>
                                       <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($srch); ?>"><?php echo app('translator')->getFromJson('app.view_all_properties'); ?></a>
                                    </li>
                                    <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($srch); ?>/2"><?php echo app('translator')->getFromJson('app.properties_for_rent'); ?></a></li>
                                    <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($srch); ?>/1"><?php echo app('translator')->getFromJson('app.properties_for_sale'); ?></a></li>
                                    <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($srch); ?>/3"><?php echo app('translator')->getFromJson('app.properties_for_rent_sale'); ?></a></li>
                                     <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($srch); ?>/3"><?php echo app('translator')->getFromJson('app.properties_for_rent_sale'); ?></a></li>
                                      <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($fav); ?>"><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?></a></li>
                                     <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($new_arrival); ?>"><?php echo app('translator')->getFromJson('app.new_arrival'); ?></a></li>
                                    <li>
                                        <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($prop_type); ?>"><?php echo app('translator')->getFromJson('app.type_of_properties'); ?></a>
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
                                                  <!--   <li><a href="<?php echo e(url(''.$srch.'')); ?>/type/<?php echo e($propertyType->id); ?>"><?php echo e(isset($property_type_name) ? $property_type_name : ''); ?></a></li> -->
                                                    <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($srch); ?>/type/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropTypeTitle(trans('propertyType.propertyTypeName_'.$propertyType->id)))); ?>"><?php echo e(isset($property_type_name) ? $property_type_name : ''); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </ul>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                         <?php if($language == 'en'): ?>
                                            <a href="<?php echo e(url(''.$dest.'')); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a></li>
                                         <?php else: ?>
                                            <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($dest); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a></li>
                                         <?php endif; ?>

                                </ul>
                            </li>
                            <?php if($language == 'en'): ?>
                                <li class="<?php echo e($active == 'blog' ? 'active' : ''); ?>">
                                    <a href=<?php echo e(url('blogs')); ?>><i>&#xf02d;</i><?php echo app('translator')->getFromJson('app.blog'); ?></a>
                                </li>
                                <li class="<?php echo e($active == 'faq' ? 'active' : ''); ?>">
                                    <a href=<?php echo e(url('faq/0')); ?>><i>&#xf27a;</i><?php echo app('translator')->getFromJson('app.faq'); ?></a>
                                </li>
                                 <li class="<?php echo e($active == 'ownerServices' || $active == 'buyerServices'  ? 'active' : ''); ?>">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i><?php echo app('translator')->getFromJson('app.services'); ?></a>
                                <ul>
                                    <li><a href="<?php echo e(url(''.$ownerservices.'')); ?>">Owner</a>
                                    </li>
                                     <li><a href="<?php echo e(url(''.$bservices.'')); ?>">Buyer</a>
                                    </li>
                                </ul>
                            </li>
                                <li class="<?php echo e($active == 'contact' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url(''.$vcontact.'')); ?>"><i>&#xf2b9;</i><?php echo app('translator')->getFromJson('app.contact'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url(''.$dest.'')); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a>
                                </li>
                            <?php else: ?>
                                <li class="<?php echo e($active == 'blog' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url(''.$language.'')); ?>/blogs"><i>&#xf02d;</i><?php echo app('translator')->getFromJson('app.blog'); ?></a>
                                </li>
                                <li class="<?php echo e($active == 'faq' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url(''.$language.'')); ?>/faq/0"><i>&#xf27a;</i><?php echo app('translator')->getFromJson('app.faq'); ?></a>
                                </li>
                                 <li class="<?php echo e($active == '' ? 'active' : ''); ?>">
                                <a href="javascript:void(0);"><i>&#xf1ad;</i><?php echo app('translator')->getFromJson('app.services'); ?></a>
                                <ul>
                                    <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($ownerservices); ?>">Owner</a>
                                    </li>
                                    <li><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($bservices); ?>">Buyer</a>
                                    </li>
                                </ul>
                            </li>
                                <li class="<?php echo e($active == 'contact' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($vcontact); ?>"><i>&#xf2b9;</i><?php echo app('translator')->getFromJson('app.contact'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($dest); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a>
                                </li>
                            <?php endif; ?>
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
                            <?php if($language == 'en'): ?>
                            <li>
                                <span><a href=<?php echo e(url(''.$abt.'')); ?>><?php echo app('translator')->getFromJson('app.about_us'); ?></a></span>
                            </li>
                            <li>
                                <span><a href=<?php echo e(route(''.$srch.'')); ?>><?php echo app('translator')->getFromJson('app.properties'); ?></a></span>
                            </li>
                            <li>
                                <span><a href=<?php echo e(route('destinations')); ?>><?php echo app('translator')->getFromJson('app.destinations'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.$new_arrival.'')); ?>"><?php echo app('translator')->getFromJson('app.new_arrival'); ?></a></span>
                            </li>
                             <li>
                                <span><a href="<?php echo e(url(''.$fav.'')); ?>"><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?> </a>(<?php echo e((new \App\Services\PropertyService)->getFavCount()); ?>)</span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url('')); ?>/blogs"><?php echo app('translator')->getFromJson('app.blog'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url('faq/0')); ?>"><?php echo app('translator')->getFromJson('app.faq'); ?></a></span>
                            </li>
                            <?php else: ?>
                            <li>
                                <span><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($abt); ?>"><?php echo app('translator')->getFromJson('app.about_us'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($srch); ?>"><?php echo app('translator')->getFromJson('app.properties'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($dest); ?>"><?php echo app('translator')->getFromJson('app.destinations'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($new_arrival); ?>"><?php echo app('translator')->getFromJson('app.new_arrival'); ?></a></span>
                            </li>
                             <li>
                                <span><a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($fav); ?>"><?php echo app('translator')->getFromJson('app.your_fav_properties'); ?> </a>(<?php echo e((new \App\Services\PropertyService)->getFavCount()); ?>)</span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.$language.'')); ?>/blogs"><?php echo app('translator')->getFromJson('app.blog'); ?></a></span>
                            </li>
                            <li>
                                <span><a href="<?php echo e(url(''.$language.'')); ?>/faq/0"><?php echo app('translator')->getFromJson('app.faq'); ?></a></span>
                            </li>
                            <?php endif; ?>
                         
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span><?php echo app('translator')->getFromJson('app.registered_office'); ?></span>
                            </li>
                            <li>
                                <span>Schömerweg 14 94060 Pocking/Germany</span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.tel'); ?> +49 08538 2659988</span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.fax'); ?> +49 0821 9998501223</span>
                            </li>
                            <li>
                                <span class="pt12"><a href="#">info@italica.de</a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <ul class="footer-menu-list">
                            <li>
                                <span><?php echo app('translator')->getFromJson('app.service_office_italy'); ?></span>
                            </li>
                            <li>
                                <span>via degli Olmi 31 54100 Massa/Italy</span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.tel'); ?> +39 0585 807818</span>
                            </li>
                            <li>
                                <span class="pt12"><?php echo app('translator')->getFromJson('app.fax'); ?> +39 0585 807 818</span>
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
                         <?php if($language == 'en'): ?>
                        <li>
                            <a href="<?php echo e(url(''.$privacy.'')); ?>"><?php echo app('translator')->getFromJson('app.privacy_policy'); ?></a>
                        </li>
                        <li>
                            <a href=<?php echo e(url(''.$terms.'')); ?>><?php echo app('translator')->getFromJson('app.terms_use'); ?></a>
                        </li>
                        <li>
                            <a href=<?php echo e(url(''.$legal.'')); ?>><?php echo app('translator')->getFromJson('app.legal_notice'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route(''.$vcontact.'')); ?>"><?php echo app('translator')->getFromJson('app.contact_us'); ?></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><?php echo app('translator')->getFromJson('app.site_map'); ?></a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($privacy); ?>"><?php echo app('translator')->getFromJson('app.privacy_policy'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($terms); ?>"><?php echo app('translator')->getFromJson('app.terms_use'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($legal); ?>"><?php echo app('translator')->getFromJson('app.legal_notice'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url(''.$language.'')); ?>/<?php echo e($vcontact); ?>"><?php echo app('translator')->getFromJson('app.contact_us'); ?></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><?php echo app('translator')->getFromJson('app.site_map'); ?></a>
                        </li>

                        <?php endif; ?>
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
 <script src="https://kit.fontawesome.com/bce09a172b.js"></script>
<?php echo e(Html::script('ui/js/jquery.matchHeight-min.js')); ?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114506662-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-114506662-1');

</script>
<script>
$(function() {
      $('.equal-height').matchHeight({
           byRow: true,
           property: 'height'
      });
});
</script>
</body>
</html>
