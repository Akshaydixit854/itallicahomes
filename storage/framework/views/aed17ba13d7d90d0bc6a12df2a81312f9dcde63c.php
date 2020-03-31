<?php $__env->startSection('custom-css'); ?>
    <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">

    <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
    <!-- Bootstrap CSS End -->
    <!-- Custom CSS Start -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
    <!-- Custom CSS End -->
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/owl.carousel.min.css")); ?>>

    <link rel="stylesheet" href=<?php echo e(asset("ui/css/thumbnail-slider.css")); ?>  media="screen">
    <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
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

    <!-- Banner Section Start -->
    <div class="wrapper">
        <div class="about-page-banner">
            <img src=<?php echo e(asset("/images/cover-images/".$property->cover_image_name)); ?> alt="about" />
        </div>
        <div class="properties-view-btn">
           <a href="#"  data-toggle="modal" data-target="#view-properties-details" class="quick-btn"><i>&#xf009;</i><?php echo app('translator')->getFromJson('app.view_gallery'); ?></a>
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper single-about-us-text-wrapper">
            <div class="main-container-wrapper">
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
                          <i>&#xf153;</i><?php echo e(number_format($property->price , 0, ',', '.')); ?>

                          <span>+ <?php echo e(str_replace('.',',',$property->vat)); ?>% <?php echo app('translator')->getFromJson('app.taxmode'); ?>  </span>
                    </li>
                    
                    
                    <ul>
                        <div class="">
                            <div class="properties-id-block row">
                                <div class="col-md-6 col-sm-6">
                                   <h2 class="pro-tit">
                                    <?php if(App::isLocale('en')): ?>
                                        <?php echo e($property->name); ?>

                                    <?php elseif(App::isLocale('it')): ?>
                                        <?php echo e($property->name_in_italian); ?>

                                    <?php elseif(App::isLocale('de')): ?>
                                        <?php echo e($property->name_in_german); ?>

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
                                                    <li style="width: 16%;"><a href="javascript:void(0)" class="btnShare"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="far fa-envelope"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
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
                                <li>
                                    <span><?php echo e($property->beds); ?></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.bedrooms'); ?></abbr>
                                    <em>&#xf236;</em>
                                </li>
                                <li>
                                    <span><?php echo e($property->baths); ?></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.baths'); ?></abbr>
                                    <em>&#xf2cd;</em>
                                </li>
                                <li>
                                    <span><?php echo e($property->kitchens); ?></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.kitchen'); ?></abbr>
                                    <em>&#xf0f5;</em>
                                </li>
                                <li>
                                    <span><?php echo e($property->parking); ?></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.parking'); ?></abbr>
                                    <em><i class="fas fa-car"></i></em>
                                </li>
                                <li>
                                    <span><?php echo e($property->fire_place); ?></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.fireplace'); ?></abbr>
                                    <em><i class="fas fa-fire"></i></em>
                                </li>
                                <li>
                                    <span><?php echo e($property->terrace); ?></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.terrace'); ?></abbr>
                                    <em><i class="fas fa-umbrella-beach"></i></em>
                                </li>
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
                                <li>
                                    <span class="tick"><i class="<?php if(in_array(1,$ids)): ?> <?php echo e('fas fa-check'); ?> <?php endif; ?>"></i></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.heating'); ?></abbr>
                                    <em><i class="fas fa-fire"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="<?php if(in_array(6,$ids)): ?> <?php echo e('fas fa-check'); ?> <?php endif; ?>"></i></span>
                                    <abbr>Beach &amp; Sea</abbr>
                                    <em><i class="fas fa-umbrella-beach"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="<?php if(in_array(3,$ids)): ?> <?php echo e('fas fa-check'); ?> <?php endif; ?>"></i></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.swimming_pool'); ?></abbr>
                                    <em><i class="fas fa-swimmer"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="<?php if(in_array(4,$ids)): ?> <?php echo e('fas fa-check'); ?> <?php endif; ?>"></i></span>
                                    <abbr>Garden</abbr>
                                    <em><i class="fab fa-pagelines"></i></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="<?php if(in_array(5,$ids)): ?> <?php echo e('fas fa-check'); ?> <?php endif; ?>"></i></span>
                                    <abbr>Horses</abbr>
                                    <em><img src="<?php echo e(asset("ui/images/horse-riding.svg")); ?>" class="pro-icon-img"></em>
                                </li>
                                <li>
                                    <span class="tick"><i class="<?php if(in_array(2,$ids)): ?> <?php echo e('fas fa-check'); ?> <?php endif; ?>"></i></span>
                                    <abbr><?php echo app('translator')->getFromJson('app.sea_view'); ?></abbr>
                                    <em><img src="<?php echo e(asset("ui/images/sea.svg")); ?>" class="pro-icon-img"></em>
                                </li>
                            </ul>
                        </div>
                        <div class="properties-des-block">
                            <span><?php echo app('translator')->getFromJson('app.description'); ?></span>
                            <?php if(App::isLocale('en')): ?>
                                <?php echo $property->detail_description; ?>

                            <?php elseif(App::isLocale('it')): ?>
                                <?php echo $property->detail_description_in_italian; ?>

                            <?php elseif(App::isLocale('de')): ?>
                                <?php echo $property->detail_description_in_german; ?>

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
                                     <?php
                                        $new = (new \App\Services\PropertyService)->propertySingleType($property->type_id);
                                     ?>
                                     <?php echo e($new); ?>

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
                                 <em><?php echo app('translator')->getFromJson('app.plot'); ?><i><?php echo e($property->plot_size); ?> m2</i></em>
                              </span>
                                </li>

                                <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.size'); ?><i><?php echo e($property->living_area); ?> m2</i></em>
                              </span>
                                </li>

                                 <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.location'); ?><i><?php echo e($areas->area_name); ?></i></em>
                              </span>
                                </li>

                                  <li>
                              <span class="equal-height">
                                 <abbr></abbr>
                                 <em><?php echo app('translator')->getFromJson('app.destination'); ?><i><?php echo e($destination_name); ?></i></em>
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
                        <span>Map</span>
                    </div>
                </div>

                <div class="properties-map-wrapper">
                    <iframe src="https://www.google.com/maps/embed/v1/place?q=<?php echo e($property->property_location_latitude); ?>,<?php echo e($property->property_location_longitude); ?>&amp;key=AIzaSyAlVWqoyW0m38zUFtbQ88f3h_kYYQtc9g0" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="wrapper">
                <div class="single-about-us-banner">
                    <div class="main-container-wrapper">
                        <span class="main-heading singla-properties-heading">About
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
                                        <img src="<?php echo e(asset("/images/cover-images/".$region_data->image)); ?>" alt="about-pic" class="responsive" />
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
                              <h4 class="query-tit">Send Query For This Property</h4>
                              <form class="query-form" action="/property_enquiry" method="post">
                                  <?php echo e(csrf_field()); ?>

                                  <div class="form-group">
                                      <input type="text" class="form-control name" name="name" placeholder="Your Name (required)">
                                      <input type="hidden" name="property_id" value="<?php echo e($property->id); ?>">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control email" name="email" placeholder="Your Email (required)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control phone" name="phone" placeholder="Your Phone (required)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control address" name="address" placeholder="Your Address (required)">
                                  </div>
                                  <div class="form-group">
                                      <textarea class="form-control message" rows="5" name="message" placeholder="Your Message"></textarea>
                                  </div>
                                  <button class="js-contact query-btn red-color">Submit Request</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
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
    <!-- Slider Js Start -->
    <script src=<?php echo e(asset("ui/js/owl.carousel.min.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/thumbnail-slider.js")); ?>></script>
    <script src=<?php echo e(asset("ui/js/jquery.matchHeight-min.js")); ?>></script>
    <script>
          $(".fav-alert-close").click(function(){
             $(".fav-alert-box").fadeOut();
          });
    </script>
    <!-- Slider Js Start -->
    <script>
    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        }else{
            return false;
        }
    }
    </script>
    <script>
         $(function() {
            $('.equal-height').matchHeight({
                byRow: true,
                property: 'height'
            });
        });

         $(document).ready(function() {
             var count  = 0
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
     <script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script>
    <script>
        window.fbAsyncInit = function(){
            FB.init({
                appId: '965744690218951',
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
              var obj = {method: 'feed',link: url, picture: 'http://www.url.com/images/'+image,name: title,description: desc};
            function callback(response){}
            FB.ui(obj, callback);
        }

        $('.btnShare').click(function(){
          
            elem = $(this);
            postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));
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
                if(name.trim() == '' || email.trim() == '' || phone.trim() == '' || address.trim() == '' || message.trim() == ''){
                    if(name.trim() == ''){
                        $('.name').after('<p class="error">Required</p>');
                    }
                    if(email.trim() == ''){
                        $('.email').after('<p class="error">Required</p>');
                    }
                    if(phone.trim() == ''){
                        $('.phone').after('<p class="error">Required</p>');
                    }
                    if(address.trim() == ''){
                        $('.address').after('<p class="error">Required</p>');
                    }
                    if(message.trim() == ''){
                        $('.message').after('<p class="error">Required</p>');
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>