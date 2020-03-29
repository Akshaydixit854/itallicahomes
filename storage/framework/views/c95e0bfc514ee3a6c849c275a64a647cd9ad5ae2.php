<?php $__env->startSection('custom-css'); ?>

<?php
  $lang1 =Session::get('language');

  if($property && !is_null($property)){
      $meta_title = $meta_descr = '';
    if($lang1 == 'en'){
      $meta_title = $property->meta_title;
      $meta_descr = substr($property->meta_description,0,160);
       $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
    }
    if($lang1 == 'de'){
  
      $meta_title = $property->meta_title_german;
      $meta_descr = substr($property->meta_description_german,0,160);
       $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
    }
    else {
    
      $meta_title = $property->meta_title_italian;
      $meta_descr = substr($property->meta_description_italian,0,160);
       $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr);
    }
    
  }
?>

<title><?php echo e($meta_title); ?></title>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

<meta property="fb:app_id" content="2346017678815971" />
<meta property="og:title" content="<?php if(\Lang::has('property.property_title_'.$property->id)): ?><?php echo e(trans('property.property_title_'.$property->id)); ?><?php else: ?><?php echo e($property->name); ?><?php endif; ?>">
    <meta property="og:site_name" content="http://www.italicahomes.com">
    <meta property="og:url" content="">
    <meta property="og:description" content="<?php if(\Lang::has('property.property_'.$property->id)): ?>
                                <?php echo trans('property.property_'.$property->id); ?>

                            <?php else: ?>
                                <?php echo $property->detail_description; ?>

                            <?php endif; ?>">
    <meta name="description" content="Best Homes Italica 1" >
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>">
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />

    <meta name="twitter:image" content="<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>"/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="<?php if(\Lang::has('property.property_title_'.$property->id)): ?><?php echo e(trans('property.property_title_'.$property->id)); ?><?php else: ?><?php echo e($property->name); ?><?php endif; ?>"/>
    <!-- <meta name="twitter:image" content="http://graphics8.nytimes.com/images/2012/02/19/us/19whitney-span/19whitney-span-articleLarge.jpg"> -->
    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">

    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <!-- Custom CSS End -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/owl.carousel.min.css")); ?>>
   
    <!-- Properties Slider Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/thumbnail-slider.css")); ?> type="text/css" media="screen" />
    
    <style>
        .js-contact.query-btn.red-color {
            margin-top:15px;
        }
        .modal-body .grey-bg.section {
            padding: 18px 0px;
        }
        .gray-color {
            background-color: #787c80;
        }
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background:url("/images/Preloader_2.gif")  center no-repeat #fff;
        }

    </style>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
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

?>
  <div class="se-pre-con" id="se-pre-con" style="display: none;"></div>
    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <input type="hidden" name="prope_id" id="prope_id" value="<?php echo e($property->id); ?>">
            <input type="hidden" name="prop_id" id="prop_id" value="<?php echo e($property->id); ?>">
            <input type="hidden" name="prop_img" id="prop_img" value="<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>">
            <img src=<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?> alt="about" />
        </div>
        <div class="properties-view-btn">
           <a href="#"  data-toggle="modal" data-target="#view-properties-details" class="quick-btn"><i>&#xf009;</i><?php echo app('translator')->getFromJson('app.view_gallery'); ?></a>
        </div>
    </div>
    <!-- Banner Section End -->
       <?php

                        $fills = 0;
                        $property_markers = array();


                                if(\Lang::has('property.property_title_'.$property->id)){
                                    $property_markers[$fills]['name'] = trans('property.property_title_'.$property->id);
                                }else{
                                    $property_markers[$fills]['name'] = $property->name;
                                }
                                if(\Lang::has('region.region_title_'.$property->region_id)){
                                    $property_markers[$fills]['region'] = trans('region.region_title_'.$property->region_id);
                                }else{
                                    $property_markers[$fills]['region'] = (new \App\Services\PropertyService)->getRegion($property->region_id);
                                }
                                $property_markers[$fills]['latitude'] = $property->property_location_latitude;
                                $property_markers[$fills]['longitude'] = $property->property_location_longitude;
                                $property_markers[$fills]['image'] = asset("/images/cover-images/".$property->cover_image_name);
                                $property_markers[$fills]['url'] = '/properties/'.$property->id;
                                $property_markers[$fills]['id'] = $property->id;
                                $property_markers[$fills]['price'] = number_format($property->price , 0, ',', '.');
                                $property_markers[$fills]['fav'] = 1;
                                $property_markers[$fills]['fav'] = (new \App\Services\PropertyService)->checkQuickFav($property->id);
                                $fills++;
                              
                            ?>
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper single-about-us-text-wrapper">
            <div class="main-container-wrapper">
                <div class="about-nav">
                     <p>
                       <span>
                           <?php if(\Lang::has('region.region_title_'.$property->region_id)): ?>
                               <?php echo e(trans('region.region_title_'.$property->region_id)); ?>

                           <?php else: ?>
                               <?php echo e((new \App\Services\PropertyService)->getRegion($property->region_id)); ?>

                           <?php endif; ?>
                       </span> /
                       <span>
                           <?php echo e($destination_name); ?>

                       </span> /
                       <span>
                           <?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                               <?php echo e(trans('property.property_title_'.$property->id)); ?>

                           <?php else: ?>
                               <?php echo e($property->name); ?>

                           <?php endif; ?>
                       </span>
                      </p>
                </div>
                <ul class="single-properties-price">
                    <li>
                         <abbr>
                              <?php if(\Lang::has('property_offer.property_offer_title_'.$property->offer_id)): ?>
                                  <?php echo e(trans('property_offer.property_offer_title_'.$property->offer_id)); ?>

                              <?php else: ?>
                                  <?php echo e((new \App\Services\PropertyService)->getOffer($property->offer_id)); ?>

                              <?php endif; ?>
                              /
                          </abbr>
                          <?php echo e(number_format($property->price , 0, ',', '.')); ?> <i style="padding: 0px;">&#xf153;</i>
                          <span>+ <?php echo e($property->vat); ?>% <?php echo app('translator')->getFromJson('app.taxmode'); ?>  </span>
                    </li>
                    <li style="margin-top: 2px;"><i><a class="heart-fav" href="<?php echo e(url('/')); ?>/favourite/<?php echo e($property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></li>
                    <li><a href="javascript:void(0)" class="properties-contact-page" data-toggle="modal" data-target="#myModal"><i>&#xf003;</i><?php echo app('translator')->getFromJson('app.contact'); ?></a></li>
                    <ul>
                        <div class="">
                            <div class="properties-id-block row">
                                <div class="col-md-6 col-sm-6">
                                   <h2 class="pro-tit">
                                    <?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                                        <?php echo e(trans('property.property_title_'.$property->id)); ?>

                                    <?php else: ?>
                                        <?php echo e($property->name); ?>

                                    <?php endif; ?>
                                    </h2>
                                    <p class="pro-id"><?php echo app('translator')->getFromJson('app.property_id'); ?>: <?php echo e($property->property_id); ?></p>
                                </div>
                                 <div class="col-md-6 col-sm-6">
                                <ul class="single-properties-share text-right">
                                    <li>
                                        <a href="<?php echo e(url('/')); ?>/property/<?php echo e($property->id); ?>/pdf">&#xf1c1;</a>
                                    </li>
                                    <li>
                                        <a href="#share-detail4" class="idattrlink">&#xf045;</a>
                                        <div class="share-social-media idcontainer" id="share-detail4" style="display:none;">
                                            <div class="share-block-header">
                                                <span>Share</span>
                                                <abbr class="idcontainer-close">&#xf057;</abbr>
                                            </div>
                                            <div class="share-inner-content">
                                                <ul class="share-social-media-icon">
                                                    <?php
                                                    $var = preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)));
                                                    ?>
                                                    <!-- <li><a href="https://www.instagram.com/?url=<?php echo e(url('')); ?>/properties/<?php echo e($property); ?>"><i class="fab fa-instagram"></i></a></li> -->
                                                    <li style="width: 16%;"><a href="javascript:void(0);" target="_blank" class="btnShare" lang="<?php echo e($lang1); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="http://twitter.com/share?text=<?php echo e($property->name); ?>&url=<?php echo e(url('')); ?>/properties/<?php echo e($property->id); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="mailto:?subject=<?php echo e($property->name); ?>&body=Check out this site <?php echo e(url('')); ?>/properties/<?php echo e((new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id))); ?>" target="_blank"><i class="far fa-envelope"></i></a></li>
                                                    <!-- <li><a href="https://plus.google.com/share?url=<?php echo e(url('/properties/'.$property->id)); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/')); ?>/property/<?php echo e($property->id); ?>/print">&#xf02f;</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="calendar">&#xf073;</a>
                                        <span><?php echo e(date('F d Y', strtotime($property->created_at))); ?></span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="properties-service-list">
                            <ul class="properties-list12 single-feature-list row">
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
                                        <em><img src="<?php echo e(asset("ui/images/campfire.svg")); ?>" class="pro-icon-img"></em>
                                    </li>
                                <?php endif; ?>
                                <?php if($property->terrace > 0): ?>
                                    <li>
                                        <span><?php echo e($property->terrace); ?></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.terrace'); ?></abbr>
                                        <em><img src="<?php echo e(asset("ui/images/terrace.svg")); ?>" class="pro-icon-img"></em>
                                    </li>
                                <?php endif; ?>
                                <?php
                                    $ids = array();
                                ?>
                                <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($amenity['amenities']['flag']) && $amenity['amenities']['flag'] != null): ?>
                                        <?php
                                            $ids[] = $amenity['amenities']['flag'];
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array(1,$ids)): ?>
                                    <li>
                                        <span class="tick"><i class="fas fa-check"></i></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.heating'); ?></abbr>
                                        <em><i class="fas fa-fire"></i></em>
                                    </li>
                                <?php endif; ?>
                                <?php if(in_array(6,$ids)): ?>
                                    <li>
                                        <span class="tick"><i class="fas fa-check"></i></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.beach_and_sea'); ?></abbr>
                                        <em><i class="fas fa-umbrella-beach"></i></em>
                                    </li>
                                <?php endif; ?>
                                <?php if(in_array(3,$ids)): ?>
                                    <li>
                                        <span class="tick"><i class="fas fa-check"></i></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.swimming_pool'); ?></abbr>
                                        <em><i class="fas fa-swimmer"></i></em>
                                    </li>
                                <?php endif; ?>
                                <?php if(in_array(4,$ids)): ?>
                                    <li>
                                        <span class="tick"><i class="fas fa-check"></i></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.garden'); ?></abbr>
                                        <em><i class="fab fa-pagelines"></i></em>
                                    </li>
                                <?php endif; ?>
                                <?php if(in_array(5,$ids)): ?>
                                    <li>
                                        <span class="tick"><i class="<?php if(in_array(5,$ids)): ?> <?php echo e('fas fa-check'); ?> <?php endif; ?>"></i></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.horses'); ?></abbr>
                                        <em><img src="<?php echo e(asset("ui/images/horse-riding.svg")); ?>" class="pro-icon-img"></em>
                                    </li>
                                <?php endif; ?>
                                <?php if(in_array(2,$ids)): ?>
                                    <li>
                                        <span class="tick"><i class="fas fa-check"></i></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.sea_view'); ?></abbr>
                                        <em><img src="<?php echo e(asset("ui/images/sea.svg")); ?>" class="pro-icon-img"></em>
                                    </li>
                                <?php endif; ?>
                                <?php if(in_array(7,$ids)): ?>
                                    <li>
                                        <span class="tick"><i class="fas fa-check"></i></span>
                                        <abbr><?php echo app('translator')->getFromJson('app.wifi'); ?></abbr>
                                        <em><i class="fas fa-wifi"></i></em>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="properties-des-block">
                            <span><?php echo app('translator')->getFromJson('app.description'); ?>
</span>
                            <?php if(\Lang::has('property.property_'.$property->id)): ?>
                                <?php echo trans('property.property_'.$property->id); ?>

                            <?php else: ?>
                                <?php echo $property->detail_description; ?>

                            <?php endif; ?>
                        </div>
                        <div class="properties-des-block pb50">
                            <span><?php echo app('translator')->getFromJson('app.details'); ?></span>
                            <ul class="properties-custome-detail">
                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.region'); ?><i>
                                     <?php if(\Lang::has('region.region_title_'.$property->region_id)): ?>
                                         <?php echo e(trans('region.region_title_'.$property->region_id)); ?>

                                     <?php else: ?>
                                         <?php echo e((new \App\Services\PropertyService)->getRegion($property->region_id)); ?>

                                     <?php endif; ?>
                                 </i></em>
                              </span>
                                </li>
                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.type'); ?><i>
                                     <?php if(\Lang::has('property_type.property_type_'.$property->type_id)): ?>
                                         <?php echo e(trans('property_type.property_type_'.$property->type_id)); ?>

                                     <?php else: ?>
                                         <?php
                                            $new = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                         ?>
                                         <?php echo e($new); ?>

                                     <?php endif; ?>
                                 </i></em>
                              </span>
                                </li>

                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.condition'); ?><i>
                                     <?php if(\Lang::has('condition.condition_display_name_'.$property->condition_id)): ?>
                                         <?php echo e(trans('condition.condition_display_name_'.$property->condition_id)); ?>

                                     <?php else: ?>
                                         <?php
                                            $new_condition = (new \App\Services\PropertyService)->condition($property->condition_id);
                                         ?>
                                         <?php echo e($new_condition->condition_display_name); ?>

                                     <?php endif; ?>

                                 </i></em>
                              </span>
                                </li>

                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.plot'); ?><i><?php echo e($property->plot_size); ?> m<sup>2</sup></i></em>
                              </span>
                                </li>

                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.size'); ?><i><?php echo e($property->living_area); ?> m<sup>2</sup></i></em>
                              </span>
                                </li>

                                 <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.location'); ?><i>

                                     <?php if(\Lang::has('area.area_title_'.$property->area_id)): ?>
                                         <?php echo e(trans('area.area_title_'.$property->area_id)); ?>

                                     <?php else: ?>
                                         <?php echo e($areas->area_name); ?>

                                     <?php endif; ?>

                                 </i></em>
                              </span>
                                </li>

                                  <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.destination'); ?><i>
                                     <?php if(\Lang::has('destination.destination_title_'.$property->destination_id)): ?>
                                         <?php echo e(trans('destination.destination_title_'.$property->destination_id)); ?>

                                     <?php else: ?>
                                         <?php echo e($destination_name); ?>

                                     <?php endif; ?>

                                 </i></em>
                              </span>
                                </li>

                                
                            </ul>
                        </div>
                        <div class="properties-des-block pb50">
                            <span><?php echo app('translator')->getFromJson('app.ameneties'); ?></span>
                            <ul class="properties-amenities-list">
                                <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(\Lang::has('ameneties.ameneties_display_name_'.$amenity['amenities']['id'])): ?>
                                        <li><?php echo e(trans('ameneties.ameneties_display_name_'.$amenity['amenities']['id'])); ?></li>
                                    <?php else: ?>
                                        <li><?php echo e($amenity['amenities']['amenities_display_name']); ?></li>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
            </div>
            <div class="">
                <div class="main-container-wrapper">
                    <div class="properties-des-block properties-border-bottom-remove">
                        <span><?php echo app('translator')->getFromJson('app.map'); ?></span>
                    </div>
                </div>

                <div class="properties-map-wrapper">
                    <div class="property-view-map">
                        <div class="" id="map" style="width: 100%; height: 500px;"></div>
                    </div>
                    <!-- <iframe src="https://www.google.com/maps/embed/v1/place?q=<?php echo e($property->property_location_latitude); ?>,<?php echo e($property->property_location_longitude); ?>&amp;key=AIzaSyAlVWqoyW0m38zUFtbQ88f3h_kYYQtc9g0" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                </div>
            </div>
            <div class="wrapper">
                <div class="releted-propertie-wrapper">
                    <div class="main-container-wrapper">
                        <span class="main-heading"><?php echo app('translator')->getFromJson('app.related_properties'); ?></span>
                    </div>
                    <div class="main-container-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="testimonial-slider" class="owl-carousel custom-slider-arrow">
                                    <?php $__currentLoopData = $related_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="releted-propertie-wrapper-slider">
                                            <div class="wrapper">
                                                <div class="properties-list-wrapper">
                                                    <div class="properties-pic-section">
                                                        <span><a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$related_property->id)))); ?>" class=""><img src=<?php echo e(asset("/images/cover-images/".$related_property->cover_image_name)); ?>></a></span>
                                                        <ul class="properties-list">
                                                            <?php if($related_property->beds > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($related_property->beds); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.bedrooms'); ?></abbr>
                                                                    <em>&#xf236;</em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($related_property->baths > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($related_property->baths); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.baths'); ?></abbr>
                                                                    <em>&#xf2cd;</em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($related_property->kitchens > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($related_property->kitchens); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.kitchen'); ?></abbr>
                                                                    <em>&#xf0f5;</em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($related_property->parking > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($related_property->parking); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.parking'); ?></abbr>
                                                                    <em><i class="fas fa-car"></i></em>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if($related_property->fire_place > 0): ?>
                                                                <li>
                                                                    <span><?php echo e($related_property->fire_place); ?></span>
                                                                    <abbr><?php echo app('translator')->getFromJson('app.fireplace'); ?></abbr>
                                                                    <em><img src="<?php echo e(asset("ui/images/campfire.svg")); ?>" class="pro-icon-img small-icon"></em>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                        <?php
                                                            $property_type = (new \App\Services\PropertyService)->propertySingleType($related_property->type_id);
                                                            $property_ui = (new \App\Services\PropertyService)->propertySingleResourceType($related_property->type_id);
                                                        ?>

                                                        <abbr class="red-tag rel-red-tag" style="background: <?php echo e($property_ui->ui_color); ?>"><?php echo e($property_type); ?></abbr>
                                                    </div>
                                                    <div class="properties-name">
                                                        <?php if(\Lang::has('property.property_title_'.$related_property->id)): ?>
                                                            <span><em><?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_title_'.$related_property->id))); ?></em><i><a class="heart-fav" href="<?php echo e(url('/')); ?>/favourite/<?php echo e($related_property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($property->id); ?></a></i></span>
                                                        <?php else: ?>
                                                            <span><em><?php echo e((new \App\Services\PropertyService)->truncate($related_property->name)); ?></em><i><a href="<?php echo e(url('/')); ?>/favourite/<?php echo e($related_property->id); ?>"><?php echo (new \App\Services\PropertyService)->checkFav($related_property->id); ?></a></i></span>
                                                        <?php endif; ?>
                                                        <abbr class="properties-loction"><em>&#xf041;</em>
                                                            <?php if(\Lang::has('region.region_title_'.$related_property->region_id)): ?>
                                                                <?php echo e(trans('region.region_title_'.$related_property->region_id)); ?>

                                                            <?php else: ?>
                                                                <?php echo e((new \App\Services\PropertyService)->getRegion($related_property->region_id)); ?>

                                                            <?php endif; ?>
                                                        </abbr>
                                                        <i class="properties-price-doller"><span class="price-range"><?php echo e(number_format($related_property->price , 0, ',', '.')); ?></span></i>
                                                    </div>
                                                    <div class="properties-decription">
                                                        <?php if(\Lang::has('property.property_short_desc_'.$related_property->id)): ?>
                                                            <?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$related_property->id),150)); ?>

                                                        <?php else: ?>
                                                            <?php echo e((new \App\Services\PropertyService)->truncate($related_property->short_description,150)); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                        <a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$related_property->id)))); ?>" class="properties-link"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                                                    </div>
                                            </div>
                                        </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                            <div class="text-center no-pro">
                            <?php if(count($related_properties) <= 0): ?>
                                <?php echo app('translator')->getFromJson('app.no_related_properties'); ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="about-us-text-wrapper1">
                        <div class="about-us-content-btn about-us-content-btn1">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><?php echo app('translator')->getFromJson('app.contact_now'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="single-about-us-banner">
                    <div class="main-container-wrapper">
                        <span class="main-heading singla-properties-heading">
                            <?php if(\Lang::has('region.region_title_'.$property->region_id)): ?>
                                <?php echo e(trans('region.region_title_'.$property->region_id)); ?>

                            <?php else: ?>
                                <?php echo e((new \App\Services\PropertyService)->getRegion($property->region_id)); ?>

                            <?php endif; ?>


                        </span>
                        <div class="wrapper">
                            <div class="row">
                                <?php
                                    $region_data = (new \App\Services\PropertyService)->getRegion($property->region_id,1);
                                ?>
                                <div class="col-md-5">
                                    <div class="about-right-side-img singla-properties-img">
                                        <?php if($region_data->image): ?>
                                        <img src="<?php echo e(asset("/images/cover-images/".$region_data->image)); ?>" alt="about-pic" class="responsive" />
                                        <?php else: ?>
                                        <img src="<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>" alt="about-pic" class="responsive" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="about-us-content singla-properties-content">
                                        <p>
                                            <?php if(\Lang::has('region.region_description_'.$property->region_id)): ?>
                                                <?php echo trans('region.region_description_'.$property->region_id); ?>

                                            <?php else: ?>
                                                <?php echo e($region_data->description); ?>

                                            <?php endif; ?>


                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Start -->
           <div class="modal fade" id="view-properties-details" role="dialog">
              <button type="button" class="btn btn-default close-btn" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <div class="modal-dialog small-model-width">
                 <div class="modal-content">
                    <div class="modal-body">
                       <div class="wrapper">
                          <div class="row">
                             <div class="col-md-12">
                                 <div class="demo">
                                   <ul id="lightSlider">
                                       <?php if(!$gallery_images->isEmpty()): ?>
                                           <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <li data-thumb="<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>">
                                                   <img src="<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>"/ class="gallery-img">
                                               </li>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php else: ?>
                                          <li>No Preview Available</li>
                                       <?php endif; ?>
                                   </ul>
                               </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        <!-- Modal Start -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                  <div class="grey-bg section">
                      <div class="container">
                          <div class="query-form-sec">
                              <h4 class="query-tit"><?php echo app('translator')->getFromJson('app.send_query'); ?></h4>
                              <form class="query-form" action="<?php echo e(url('')); ?>/property_enquiry" method="post">
                                  <?php echo e(csrf_field()); ?>

                                  <div class="form-group">
                                      <input type="text" class="form-control name" name="name" placeholder="<?php echo app('translator')->getFromJson('app.your_name_required'); ?>">
                                      <input type="hidden" name="property_id" value="<?php echo e($property->id); ?>">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control email" name="email" placeholder="<?php echo app('translator')->getFromJson('app.your_email_required'); ?>">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control phone" name="phone" placeholder="<?php echo app('translator')->getFromJson('app.your_phone_required'); ?>">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control address" name="address" placeholder="<?php echo app('translator')->getFromJson('app.your_address_required'); ?>">
                                  </div>
                                  <div class="form-group">
                                      <textarea class="form-control message" rows="5" name="message" placeholder="<?php echo app('translator')->getFromJson('app.your_message'); ?>"></textarea>
                                  </div>
                                    <div class="field-wrapper">
                                        <div id="google_recaptcha" ></div>
                                    </div>
                                  <button class="js-contact query-btn red-color"><?php echo app('translator')->getFromJson('app.submit_request'); ?></button>
                                  <button type="button" class="btn btn-default query-btn gray-color" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
                              </form>
                          </div>
                      </div>
                  </div>
                </div>
             </div>
            </div>
        </div>
         <!-- Modal end -->
         
        <div class="popupslider modal quick-map-modal fade" id="quick-map-modal-<?php echo e($property->id); ?>" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Quick Map View Left Starts -->
                            <div class="col-md-6">
                                <div class="demo">
                                    <ul id="lightSlider" class="lightSlider">
                                        <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="gal-img" data-thumb=<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>>
                                                <img src=<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?> />
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- Quick Map View Left Ends -->
                            <!-- Quick Map View Right Starts -->
                            <div class="col-md-6">
                                <div class="quick-map-right">
                                    <div class="map-det-head">
                                        <h3 class="map-det-tit">
                                            <?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                                                <?php echo e(trans('property.property_title_'.$property->id)); ?>

                                            <?php else: ?>
                                                <?php echo e($property->name); ?>

                                            <?php endif; ?>
        
                                        </h3>
                                        <p class="map-det-txt">Property ID: <?php echo e($property->property_id); ?></p>
                                    </div>
                                    <div class="pos-rel">
                                        <div class="txt-overlay"></div>
                                        <p class="map-view-main-txt">
                                            <?php if(\Lang::has('property.property_short_desc_'.$property->id)): ?>
                                                <?php echo e((new \App\Services\PropertyService)->truncate(trans('property.property_short_desc_'.$property->id),150)); ?>

                                            <?php else: ?>
                                                <?php echo e((new \App\Services\PropertyService)->truncate($property->short_description,150)); ?>

                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <ul class="properties-list12">
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
                                    <div>
                                        <h2 class="map-rate">From <?php echo e(number_format($property->price , 0, ',', '.')); ?> €</h2>
                                        <a href="/favourite/<?php echo e($property->id); ?>" class="map-fav"><?php echo e((new \App\Services\PropertyService)->checkFavTxt($property->id)); ?></a>
                                        <div>
                                     
                    <a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" class="map-read-more cmn-btn red-bg"><?php echo app('translator')->getFromJson('app.read_more'); ?></a>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Quick Map View Right Starts -->
                        </div>
                    </div>
                    <div class="modal-footer custom-model-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog End -->
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <!-- Bootstrap JS Start -->
    <script src=<?php echo e(asset("ui/js/jquery-library.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/popper.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/bootstrap.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/auto-search.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/owl.carousel.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/thumbnail-slider.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/jquery-resizable.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/jquery.matchHeight-min.js")); ?>></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_Z8VD5Hdbl77SrQVIdvc8YwIMlxEBwgM&callback=initMap" type="text/javascript"></script>
    <!-- Slider Js Start -->
    <script>
    $(".fav-alert-close").click(function(){
        $(".fav-alert-box").fadeOut();
    });

    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        }else{
            return false;
        }
    }

    var onloadCallback = function() {
      grecaptcha.render('google_recaptcha', {
        'sitekey' : '6LdbQ64UAAAAAGUL7LjJSjGMYUww1BAIOu1yN2Xa'
      });
    };

    $(function() {
        $('.equal-height').matchHeight({
            byRow: true,
            property: 'height'
        });
        
        if($('.fav-alert-box').length){
            $('.fav-alert-box').fadeOut(4000);
        }
    });

        $(document).ready(function() {
             var count  = 0;
             $('#view-properties-details').on('shown.bs.modal', function () {
                if (count === 1) return;
                 $('#image-gallery').addClass('cS-hidden');
                     $('#lightSlider').lightSlider({
                     gallery:true,
                     item:1,
                     thumbItem:8,
                     slideMargin: 0,
                     speed:500,
                     auto:false,
                     loop:true,
                     autoWidth : false,
                     onSliderLoad: function() {
                         $('#image-gallery').removeClass('cS-hidden');
                     }
                 });
                count++;
            });
         });
     </script>
    <script>
    $(document).ready(function() {
        var count = 0;
        $('.popupslider').on('shown.bs.modal', function() {
            var x = document.getElementsByClassName("lSGallery");
           
            for(var i = 0;i < x.length;i++){
                if(i != 0){
                    x[i].remove();
                }
            }
            if (count === 1) return;
            $('#image-gallery').addClass('cS-hidden');
            $('.lightSlider').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 4,
                slideMargin: 0,
                speed: 900,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    //$('#image-gallery').removeClass('cS-hidden');
                }
            });
            count++;
        });
    });
    </script>
     <script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script>
    <script>
        //965744690218951
        //501344927300041
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
            console.log('share btn click ');
            /*elem = $(this);
            console.log(elem.data('title')+' ' + ''+ elem.data('desc') + '' + elem.data('image')  );*/
            var prop_id = $('#prope_id').val();
            var img = $('#prop_img').val(); 
            console.log(img);
            var vtitle='share property title';
            var vhref ='<?php echo e(url('')); ?>/properties/'+prop_id;
            var vimage = img;
            var vdescription ='Property details';
            postToFeed(vtitle, vdescription, vhref ,vimage );
            return false;
        });

        // Slider Start
        $(document).ready(function(){

            $('.js-contact').click(function(){

                if($('.error').length > 0){
                    $('.error').remove();
                }
                var name = $('.name').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var message = $('.message').val();
                var address = $('.address').val();
                var rcres = grecaptcha.getResponse();
                if(name.trim() == '' || email.trim() == '' || phone.trim() == '' || address.trim() == '' || message.trim() == ''){
                    if(name.trim() == ''){
                        $('.name').after('<p class="error">Name Required</p>');
                    }
                    if(email.trim() == ''){
                        $('.email').after('<p class="error">Email Required</p>');
                    }
                    if(phone.trim() == ''){
                        $('.phone').after('<p class="error">Contact No Required</p>');
                    }
                    if(address.trim() == ''){
                        $('.address').after('<p class="error"> Address Required</p>');
                    }
                    if(message.trim() == ''){
                        $('.message').after('<p class="error"> Message Required</p>');
                    }
                    if(!rcres.length) {
                        $('#google_recaptcha').after("<span class='error'>Please verify reCAPTCHA</span>");
                    }

                    return false;
                }
                if(!validateEmail(email) || isNaN(phone)){
                    if(!validateEmail(email)){
                        $('.email').after('<p class="error">Invalid email</p>');
                        return false;
                    }

                    if(isNaN(phone)){
                        $('.phone').after('<p class="error">Invalid phone</p>');
                        return false;
                    }
                      
                }

			 $('#se-pre-con').show();
            });
            $("#testimonial-slider").owlCarousel({
                items:3,
                itemsDesktop:[1000,1],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination:false,
                navigation:true,
                navigationText:["",""],
                autoPlay:true
            });
        });
        // Slider End
        // Share blog Start
        $(document).ready(function()
        {
            var tdiv = $('.idcontainer')
            tdiv.hide();
            $('.idattrlink').click(function(event){
                event.preventDefault();
                var targetDiv = $($(this).attr('href'));
                $('.idattrlink').removeClass("active");
                if(targetDiv.css("display") == "none")
                {
                    tdiv.hide();
                    $(this).addClass("active");
                    targetDiv.slideDown();
                }
                else
                {
                    tdiv.slideUp();
                    $(this).removeClass("active");
                }
            });
            $('.idcontainer-close').click(function(e) {
                $('.idcontainer').slideUp(300);
                $('.idattrlink').removeClass('active');
            });
        })
        // Share blog End
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


           <?php
        /*  dd($property_markers);*/
        $t = json_encode($property_markers,true);
        ?>

        var l = '<?php echo $t;?>';
        var locations = JSON.parse(l.replace(/^"/,""));
        //Initialize and add the map
        function initMap() {
                
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 8,
              center: new google.maps.LatLng(locations[0]['latitude'], locations[0]['longitude']),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            var obj = {};
            for (i = 0; i < locations.length; i++) {
                if(locations[i]['fav'] == 1){
                    var d = "<i class='fas fa-heart'></i>";
                }else{
                    var d = "<i class='far fa-heart'></i>";
                }
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
                map: map
              });
              con = '';
              con = '<div class="map-hover-view"><div><div class="properties-pic-section"><span><img src="'+locations[i]['image']+'"></span></div>';
              con+='<div class="properties-name"><span><em>'+locations[i]['name']+'</em><i>'+'<a class="heart-fav" href="/favourite/'+locations[i]['id']+'">'+d+'</a></i></span><abbr class="properties-loction"><em> &#xf041; '+locations[i]['region']+'</abbr>';
              con+='<i class="properties-price-doller">'+locations[i]['price']+'</i></div> <div class="map-hover-properties-btn"><a href="javascript:void(0);" data-toggle="modal" data-target="#quick-map-modal-'+locations[i]['id']+'" class="quick-btn"><?php echo app('translator')->getFromJson('app.quick_view'); ?></a>';
              con+='<a href="'+locations[i]['url']+'" class="property-btn"><?php echo app('translator')->getFromJson('app.got_to_property'); ?></a></div></div></div>';
              obj['content'+i] = con;
              google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                
                  infowindow.setContent(obj['content'+i]);
                  infowindow.open(map, marker);
                }
              })(marker,i));
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>