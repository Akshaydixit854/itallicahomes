<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Italica</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="<?php echo e(url('')); ?>/ui/css/pdf_css/style.css" rel="stylesheet">
     <style type="text/css">
    .propety-ser-list.row {
        display:flex;
      }
      .pro-ser-box-outer {
    width: 16%;
}
    </style>
</head>

<body>
        <?php
    $lang1 =Session::get('language');

    ?>
    <div class="main-sec">
        <div class="content-sec">
            <div class="logo-sec text-center">
                <a href="http://www.italicahomes.com" target="_blank" class="logo-img"><img src="<?php echo e(url('')); ?>/ui/images/pdf_template/logo.png"
                    style="margin-left: 45%;"></a>
            </div>
            <div class="det-property">
                <a href="<?php echo e(url('')); ?>/properties/<?php echo e($property); ?>" target="_blank" class="property-img"><img style="height: 300px;" src=<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?>></a>
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
                            <?php if(\Lang::has('destination.destination_title_'.$property->destination_id)): ?>
                                         <?php echo e(trans('destination.destination_title_'.$property->destination_id)); ?>

                                     <?php else: ?>
                                         <?php echo e($destination_name); ?>

                                     <?php endif; ?>
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
                <div class="property-cost">
                    <b> <?php if(\Lang::has('property_offer.property_offer_title_'.$property->offer_id)): ?>
                              <?php echo e(trans('property_offer.property_offer_title_'.$property->offer_id)); ?>

                          <?php else: ?>
                              <?php echo e((new \App\Services\PropertyService)->getOffer($property->offer_id)); ?>

                          <?php endif; ?>
                          /</b> <?php echo e(number_format($property->price , 0, ',', '.')); ?> €
                    <span>+ <?php echo e($property->vat); ?>% <?php echo app('translator')->getFromJson('app.taxmode'); ?> </span>
                </div>
                <div class="property-name">
                    <a href="<?php echo e(url('')); ?>/properties/<?php echo e($property->id); ?>" target="_blank" class="red-color pro-tit"><h3 class="red-color"><?php if(\Lang::has('property.property_title_'.$property->id)): ?>
                                        <?php echo e(trans('property.property_title_'.$property->id)); ?>

                                    <?php else: ?>
                                        <?php echo e($property->name); ?>

                                    <?php endif; ?></h3></a>
                     <?php if($lang1 =='en'): ?>
                    <p class="text pro-url"><?php echo app('translator')->getFromJson('app.property_url'); ?>:<a href="<?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" target="_blank"><?php echo e(url('')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?></a></p>
                    <?php else: ?> 
                    <p class="text pro-url"><?php echo app('translator')->getFromJson('app.property_url'); ?>:<a href="<?php echo e(url(''.$lang1.'')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?>" target="_blank"><?php echo e(url(''.$lang1.'')); ?>/properties/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getPropertytitle(trans('property.property_title_'.$property->id)))); ?></a></p>

                    <?php endif; ?>
                    <p class="pro-date"><?php echo e(date('F d Y', strtotime($property->created_at))); ?></p>
                    <p><?php echo app('translator')->getFromJson('app.property_id'); ?>: <?php echo e($property->id); ?></p>
                </div>
                <div class="propety-ser-list row">
                    <!-- Property Service Box Starts -->
                      <?php if($property->beds > 0): ?>
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count"><?php echo e($property->beds); ?></p>
                            <p class="pro-txt"><?php echo app('translator')->getFromJson('app.bedrooms'); ?></p>
                            <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/bed.png" class="ser-img">
                        </div>
                    </div>
                     <?php endif; ?>
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                       <?php if($property->baths > 0): ?>
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count"><?php echo e($property->baths); ?></p>
                            <p class="pro-txt"><?php echo app('translator')->getFromJson('app.baths'); ?></p>
                            <img src=<?php echo e(asset("ui/images/pdf_template/bathtub.png")); ?> class="ser-img">
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                       <?php if($property->kitchens > 0): ?>
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count"><?php echo e($property->kitchens); ?></p>
                            <p class="pro-txt"><?php echo app('translator')->getFromJson('app.kitchen'); ?></p>
                            <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/kitchen.png" class="ser-img">
                        </div>
                    </div>
                     <?php endif; ?>
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                      <?php if($property->parking > 0): ?>
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count"><?php echo e($property->parking); ?></p>
                            <p class="pro-txt"><?php echo app('translator')->getFromJson('app.parking'); ?></p>
                            <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/car.png" class="ser-img">
                        </div>
                    </div>
                     <?php endif; ?>
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                     <?php if($property->fire_place > 0): ?>
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count"><?php echo e($property->fire_place); ?></p>
                            <p class="pro-txt"><?php echo app('translator')->getFromJson('app.fireplace'); ?></p>
                            <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/fireplace.png" class="ser-img">
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- Property Service Box Ends -->
                    <!-- Property Service Box Starts -->
                      <?php if($property->terrace > 0): ?>
                    <div class="pro-ser-box-outer col">
                        <div class="pro-ser-box text-center">
                            <p class="pro-count"><?php echo e($property->terrace); ?></p>
                            <p class="pro-txt"><?php echo app('translator')->getFromJson('app.terrace'); ?></p>
                            <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/balcony.png" class="ser-img">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="propety-ser-list row">
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
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt"><?php echo app('translator')->getFromJson('app.heating'); ?></p>
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/fire.png" class="ser-img">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if(in_array(6,$ids)): ?>

                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt"><?php echo app('translator')->getFromJson('app.beach_and_sea'); ?></p>
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/beach.png" class="ser-img">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if(in_array(3,$ids)): ?>
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt"><?php echo app('translator')->getFromJson('app.swimming_pool'); ?></p>
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/pool.png" class="ser-img">
                                    </div>
                                </div>
                         
                                <?php endif; ?>
                                <?php if(in_array(4,$ids)): ?>
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                       <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png" class="tick-img">
                                       <p class="pro-txt"><?php echo app('translator')->getFromJson('app.garden'); ?></p>
                                       <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/garden.png" class="ser-img">
                                   </div>
                               </div>
                                                           
                                <?php endif; ?>
                                <?php if(in_array(5,$ids)): ?>
                                 <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                       <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png" class="tick-img">
                                       <p class="pro-txt"><?php echo app('translator')->getFromJson('app.horses'); ?></p>
                                       <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/horse_riding.png" class="ser-img">
                                   </div>
                               </div>
                                <?php endif; ?>
                                <?php if(in_array(2,$ids)): ?>
                                        <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                       <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png" class="tick-img">
                                       <p class="pro-txt"><?php echo app('translator')->getFromJson('app.sea_view'); ?></p>
                                       <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/sea_view.png" class="ser-img">
                                   </div>
                               </div>
                                <?php endif; ?>
                                <?php if(in_array(7,$ids)): ?>
                                <div class="pro-ser-box-outer col">
                                    <div class="pro-ser-box text-center">
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png" class="tick-img">
                                        <p class="pro-txt"><?php echo app('translator')->getFromJson('app.wifi'); ?></p>
                                        <img src="<?php echo e(url('')); ?>/ui/images/pdf_template/wifi.png" class="ser-img">
                                    </div>
                                </div>
                              
                                <?php endif; ?>
                    <!-- Property Service Box Ends -->
                </div>
                </div>
                

                <div class="property-des">
                    <h4 class="main-tit"><?php echo app('translator')->getFromJson('app.description'); ?></h4>
                    <p class="text">   <?php if(\Lang::has('property.property_'.$property->id)): ?>
                                <?php echo trans('property.property_'.$property->id); ?>

                            <?php else: ?>
                                <?php echo $property->detail_description; ?>

                            <?php endif; ?></p>
                </div>
                <!-- Details Starts -->
                <div class="details">
                    <h4 class="main-tit"><?php echo app('translator')->getFromJson('app.details'); ?></h4>
                    <div class="details-list">
                        <div class="row">
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit"><?php echo app('translator')->getFromJson('app.region'); ?></h6>
                                    <p class="details-txt text"> <?php if(\Lang::has('region.region_title_'.$property->region_id)): ?>
                                         <?php echo e(trans('region.region_title_'.$property->region_id)); ?>

                                     <?php else: ?>
                                         <?php echo e((new \App\Services\PropertyService)->getRegion($property->region_id)); ?>

                                     <?php endif; ?></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit"><?php echo app('translator')->getFromJson('app.type'); ?></h6>
                                    <p class="details-txt text">  <?php if(\Lang::has('property_type.property_type_'.$property->type_id)): ?>
                                         <?php echo e(trans('property_type.property_type_'.$property->type_id)); ?>

                                     <?php else: ?>
                                         <?php
                                            $new = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                         ?>
                                         <?php echo e($new); ?>

                                     <?php endif; ?></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit"><?php echo app('translator')->getFromJson('app.condition'); ?></h6>
                                    <p class="details-txt text"> <?php if(\Lang::has('condition.condition_display_name_'.$property->condition_id)): ?>
                                         <?php echo e(trans('condition.condition_display_name_'.$property->condition_id)); ?>

                                     <?php else: ?>
                                         <?php
                                            $new_condition = (new \App\Services\PropertyService)->condition($property->condition_id);
                                         ?>
                                         <?php echo e($new_condition->condition_display_name); ?>

                                     <?php endif; ?></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit"><?php echo app('translator')->getFromJson('app.plot'); ?></h6>
                                    <p class="details-txt text"><?php echo e($property->plot_size); ?> m<sup>2</sup></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit"><?php echo app('translator')->getFromJson('app.size'); ?></h6>
                                    <p class="details-txt text"><?php echo e($property->living_area); ?> m<sup>2</sup></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit"><?php echo app('translator')->getFromJson('app.location'); ?></h6>
                                    <p class="details-txt text"> <?php if(\Lang::has('area.area_title_'.$property->area_id)): ?>
                                         <?php echo e(trans('area.area_title_'.$property->area_id)); ?>

                                     <?php else: ?>
                                         <?php echo e($areas->area_name); ?>

                                     <?php endif; ?></p>
                                </div>
                            </div>
                            <div class="col-6 col">
                                <div class="details-box">
                                    <h6 class="details-tit"><?php echo app('translator')->getFromJson('app.destination'); ?></h6>
                                    <p class="details-txt text"><?php if(\Lang::has('destination.destination_title_'.$property->destination_id)): ?>
                                         <?php echo e(trans('destination.destination_title_'.$property->destination_id)); ?>

                                     <?php else: ?>
                                         <?php echo e($destination_name); ?>

                                     <?php endif; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Details Ends -->
                <!-- Ameneties Starts -->
                <div class="ameneties mt-20"  style="margin-top: 30px;">
                    <h4 class="main-tit"><?php echo app('translator')->getFromJson('app.ameneties'); ?></h4>
                    <ul class="row amenity-list">
                         <?php if(isset($amenities) && sizeof($amenities)>0): ?>
                         <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="amenity-list-item col col-6">
                            <div class="row">
                               <!--  <div class="amenity-icon"> -->
                                    <span>     
                                        <img style='width: 15px;height:20px;' src="<?php echo e(url('')); ?>/ui/images/pdf_template/tick.png">
                                    </span>
                                <!-- </div> -->
                                <span>
                                  <?php if(\Lang::has('ameneties.ameneties_display_name_'.$amenity['amenities']['id'])): ?>
                                <span class="amenity-txt"><?php echo e(trans('ameneties.ameneties_display_name_'.$amenity['amenities']['id'])); ?></span>
                                <?php else: ?>
                                <span class="amenity-txt"><?php echo e($amenity['amenities']['amenities_display_name']); ?></span>
                                <?php endif; ?>
                            </span>
                            </div>                            
                        </li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php else: ?> 
                                 <div class="row">
                                <p>No amenities</p>
                            </div> 
                         <?php endif; ?>
                    </ul>
                </div>
                <!-- Ameneties Ends -->
             <!--    <div class="map-sec mt-20">
                	<h4 class="main-tit">Map</h4>
                	<div class="" id="map" style="width: 100%; height: 300px;"></div>
                </div> -->
                <!-- Galeery Section Starts -->
                <div class="gallery-sec mt-20">
                    <h4 class="main-tit"><?php echo app('translator')->getFromJson('app.gallery'); ?></h4>
                    <div class="row">
                        <!-- Gallery Box Starts -->
                         <?php if(!$data->isEmpty()): ?>
                                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="">
                            <div class="gallery-box big-img">
                                <img src=<?php echo e(asset("/images/cover-images/".$gallery_image->image)); ?>>
                            </div>
                        </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php else: ?>
                                        <div class="gallery-box big-img">
                                            <li><?php echo app('translator')->getFromJson('app.no_preview'); ?></li>
                                        </div>
                                          
                                       <?php endif; ?>
                        <!-- Gallery Box Ends -->
                    </div>
                </div>
                <!-- Galeery Section Ends -->
            </div>
            <footer class="text-center">
                 <ul id="social-list" style="margin-left: 37%;">
                   <p style="width: 30px;display: inline-block;">
                            <a target="_blank" href="https://www.facebook.com/italicahomes/" class="social-link"><img src="<?php echo e(url('')); ?>/ui/images/pdf_template/facebook.png"></a>
                        </p>
                        <p style="width: 30px;display: inline-block;">
                            <a target="_blank" href="https://twitter.com/livingartIT" class="social-link"><img src="<?php echo e(url('')); ?>/ui/images/pdf_template/twitter.png"></a>
                        </p>
                        <p style="width: 30px;display: inline-block;">
                            <a target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="social-link"><img src="<?php echo e(url('')); ?>/ui/images/pdf_template/linkedin.png"></a>
                        </p>
                    </ul>
                <!-- <div class="social-block text-center">
                    <ul class="social-list list-unstyled inline"> 
                        <li>
                            <a target="_blank" href="https://www.facebook.com/italicahomes/" class="social-link"><img src="<?php echo e(url('')); ?>/ui/images/pdf_template/facebook.png"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://twitter.com/livingartIT" class="social-link"><img src="<?php echo e(url('')); ?>/ui/images/pdf_template/twitter.png"></a>
                        </li>
                        <li>
                        </li>
                            <a target="_blank" href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" class="social-link"><img src="<?php echo e(url('')); ?>/ui/images/pdf_template/linkedin.png"></a>
                    </ul>
                </div> -->
                <div class="address">
                    <p class="text">
                        Schömerweg 14 94050 Pocking/Germany
                    </p>
                </div>
                <div class="number-block">
                    <ul class="num-list list-unstyled inline m-0">
                        <li>
                            <p class="num-txt">Phone: <a href="#" class="num-link">&nbsp; +49 8538 2659988</a></p>
                        </li>
                        <li>
                            <p class="num-txt">Fax: <a href="#" class="num-link">&nbsp; +49 821 9998501223</a></p>
                        </li>
                    </ul>
                </div>
                <div class="number-block">
                    <ul class="num-list list-unstyled inline m-0">
                        <li>
                            <p class="num-txt">Email: <a href="mailto:info@italica.de" class="num-link">&nbsp; info@italica.de</a></p>
                        </li>
                    </ul>
                </div>                
                <div class="text-center foot-logo"><a href="http://www.italicahomes.com/properties/33" target="_blank"><img src="<?php echo e(url('')); ?>/ui/images/logo.png"></a></div>
                <p class="text-center text copy-txt"><?php echo app('translator')->getFromJson('app.Copyright'); ?> &copy; italicahomes</p>
            </footer>
        </div>
    </div>
    <!-- Scripts -->
    <script src=<?php echo e(asset("ui/js/pdf_js/jquery-3.4.1.min.js")); ?>></script>
    </script>
</body>

</html>