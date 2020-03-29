

        <?php $__env->startSection('custom-css'); ?>
            <title><?php echo e(__('app.contact_us')); ?></title>
<?php
  {{ $vprop = __('app.registered_office'); }}

    $meta_descr = strip_tags($vprop);
    $meta_descr1= substr($meta_descr,0,160);
    $metakey= preg_replace('/[[:space:]]+/', ',',$meta_descr1);
?>
<meta name="description" content="<?php echo e(isset($meta_descr1) ? $meta_descr1 : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">
        
           <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">
           <!-- Bootstrap CSS Start -->
           <link rel="stylesheet" href=<?php echo e(asset("ui/css/bootstrap.min.css")); ?>>
           <!-- Bootstrap CSS End -->
           <!-- Custom CSS Start -->
           <link rel="stylesheet" href=<?php echo e(asset("ui/css/styles.css")); ?>>
           <link rel="stylesheet" href=<?php echo e(asset("ui/css/responsive.css")); ?>>
           <!-- Custom CSS End -->
           <link rel="stylesheet" href=<?php echo e(asset("ui/css/custom.css")); ?>>
           <style type="text/css">
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
            <?php echo e(Html::style('ui/css/font-awesome.css')); ?>

            <?php echo e(Html::style('ui/css/scroll-top.css')); ?>

        <?php $__env->stopSection(); ?>
         <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
           </script>
    <script type="text/javascript">

/*function ValidateForm(frm) {
if (frm.Name.value == "") {alert('Name is required.');frm.Name.focus();return false;}
if (frm.FromEmailAddress.value == "") {alert('Email address is required.');frm.FromEmailAddress.focus();return false;}
if (frm.FromEmailAddress.value.indexOf("@") < 1 || frm.FromEmailAddress.value.indexOf(".") < 1) {alert('Please enter a valid email address.');frm.FromEmailAddress.focus();return false;}
if (frm.Comments.value == "") {alert('Please enter comments or questions.');frm.Comments.focus();return false;}
if (frm.skip_CaptchaCode.value == "") {alert('Enter web form code.');frm.skip_CaptchaCode.focus();return false;}
return true; }*/

</script>
        <?php if(Session::has('message')): ?>
        <div class="fav-alert-box row">
           <div class="col-11">
                    <p class="success-box alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
           </div>
           <div class="col-1">
                <a href="javascript:void(0);" class="fav-alert-close"><i class="fas fa-times"></i></a>
           </div>
        </div>
      <?php endif; ?>

        <?php $__env->startSection('content'); ?>
        <div class="se-pre-con" id="se-pre-con" style="display: none;"></div>
           <!-- Banner Section Start -->
           <div class="wrapper">
              <div class="about-page-banner">
                 <img src=<?php echo e(asset("ui/images/contact_picture.jpg")); ?> alt="banner" />
              </div>
           </div>
           <!-- Banner Section End -->
           <!-- Contact detail Start -->
           <div class="wrapper">
              <div class="about-us-text-wrapper remove-box-shadow">
                 <div class="main-container-wrapper">
                    <span class="main-heading"><?php echo app('translator')->getFromJson('app.contact_us'); ?></span>
                    <div class="destinations-list-wrapper">
                       <div class="row">
                          <div class="col-md-4 col-sm-6">
                             <ul class="contact-us-info">
                                <li>
                                   <span><?php echo app('translator')->getFromJson('app.registered_office'); ?></span>
                                </li>
                                <li>
                                   <abbr>Schömerweg 14 <br>94060 Pocking/Germany</abbr>
                                </li>
                                <li>
                                   <abbr>Tel.: +49 08538 2659988</abbr>
                                </li>
                                <li>
                                   <abbr>Fax: +49 0821 9998501223</abbr>
                                </li>
                                <li>
                                   <abbr>E-mail : info@italica.de</abbr>
                                </li>
                             </ul>
                             <ul>
                                <ul class="contact-us-info">
                                   <li>
                                      <span><?php echo app('translator')->getFromJson('app.service_office_italy'); ?></span>
                                   </li>
                                   <li>
                                      <abbr>via degli Olmi 31<br>54100 Massa/Italy</abbr>
                                   </li>
                                   <li>
                                      <abbr>Tel.: +39 0585 807818</abbr>
                                   </li>
                                   <li>
                                      <abbr>Fax: +39 0585 807 818</abbr>
                                   </li>
                                </ul>
                          </div>
                          <div class="col-md-8 col-sm-6">
                             <div class="contact-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5297.447035450058!2d13.3855753!3d48.4042525!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4774435f60d1e2b7%3A0x3714d97cce651b72!2sSch%C3%B6merweg+14%2C+94060+Pocking%2C+Germany!5e0!3m2!1sen!2sin!4v1537985697608" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!-- Contact detail End -->
           <!-- Contact Form Start -->
           <div class="wrapper">
              <div class="contant-form-wrapper">
                 <div class="main-container-wrapper">
                    <span class="contant-form-heading"><?php echo app('translator')->getFromJson('app.contact_form'); ?></span>
                    <form id="form_validation" method="POST" action=<?php echo e(route('contact-store')); ?> enctype="multipart/form-data">
                       <?php echo e(csrf_field()); ?>

                    <div class="contant-form-content-wrapper">
                       <div class="row">
                          <div class="col-md-12">
                             <ul class="contant-form-field">
                                <li>
                                   <span><?php echo app('translator')->getFromJson('app.your_name_required'); ?></span>
                                   <abbr>
                                      <input type="text" class="name" name="name">
                                   </abbr>
                                </li>
                                <li>
                                   <span><?php echo app('translator')->getFromJson('app.your_email_required'); ?></span>
                                   <abbr>
                                      <input type="text" class="email" name="email">
                                   </abbr>
                                </li>
                                <li>
                                   <span><?php echo app('translator')->getFromJson('app.subject'); ?></span>
                                   <abbr>
                                      <input type="text" class="subject" name="subject">
                                   </abbr>
                                </li>
                             <li>
                            <div class="field-wrapper">
                              <div id="google_recaptcha"></div>
                            </div>
                               
                             </li>
                                <li>
                                   <span><?php echo app('translator')->getFromJson('app.message'); ?></span>
                                   <abbr>
                                      <textarea name="message" class="message"></textarea>
                                   </abbr>
                                </li>
                             </ul>
                             <div class="about-us-content-btn">
                                <button id="js-contact-us" type="submit" href="#"><?php echo app('translator')->getFromJson('app.submit'); ?></button>
                             </div>
                          </div>
                       </div>
                    </div>
                    </form>
                 </div>
                  <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
              </div>
           </div>
           <!-- Contact Form End -->
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('custom-js'); ?>
           <!-- Bootstrap JS Start -->
           <script src=<?php echo e(asset("ui/js/jquery-library.js")); ?>></script>
           <script src=<?php echo e(asset("ui/js/popper.min.js")); ?>></script>
           <script src=<?php echo e(asset("ui/js/bootstrap.min.js")); ?>></script>
             <?php echo e(Html::script('ui/js/scroll_top.js')); ?>

             <script type="text/javascript">
               var onloadCallback = function() {
              grecaptcha.render('google_recaptcha', {
                'sitekey' : '6LdbQ64UAAAAAGUL7LjJSjGMYUww1BAIOu1yN2Xa'
              });
            };

            
             </script>
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
             $(function(){
              if($(".fav-alert-box").length){
                $(".fav-alert-box").fadeOut(4000);
              }
             });
             
              $(".fav-alert-close").click(function(){
                  $(".fav-alert-box").fadeOut();
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

                   $('#js-contact-us').click(function(){
                       if($('.error').length > 0){
                           $('.error').remove();
                       }
                       var name = $('.name').val();
                       var email = $('.email').val();
                       var subject = $('.subject').val();
                       var message = $('.message').val();
                       var rcres = grecaptcha.getResponse();
                        console.log(rcres);
                       if(name.trim() == '' || email.trim() == '' || subject.trim() == ''  || message.trim() == '' || !rcres.length ){
                           if(name.trim() == ''){
                               $('.name').after('<p class="error">Name Required</p>');
                           }
                           if(email.trim() == ''){
                               $('.email').after('<p class="error">Email Required</p>');
                           }
                           if(subject.trim() == ''){
                               $('.subject').after('<p class="error">Subject Required</p>');
                           }
                           if(message.trim() == ''){
                               $('.message').after('<p class="error">Message Required</p>');
                           }
                           if(!rcres.length) {
                            $('#google_recaptcha').after("<span class='error'>Please verify reCAPTCHA</span>");
                          }
                           return false;
                       }
                       if(!validateEmail(email)){
                           $('.email').after('<p class="error">Invalid email</p>');
                           return false;
                       }

                       $('#se-pre-con').show();
                   });

               });
               // Responsive Menu  Start
           </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>