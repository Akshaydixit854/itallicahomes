

        <?php $__env->startSection('custom-css'); ?>
            <title>Blogs</title>
<?php
  if($posts && sizeof($posts)>0){
    $meta_descr = strip_tags($posts[1]['short_description']);
    $meta_descr= substr($meta_descr,160);
    $metakey= preg_replace('/[[:space:]]+/',',',$meta_descr);
}
?>
<meta name="description" content="<?php echo e(isset($meta_descr) ? $meta_descr : ''); ?>">
<meta name="keywords" content="<?php echo e(isset($metakey) ? $metakey : ''); ?>">

            <?php echo e(Html::style('ui/css/bootstrap.min.css')); ?>

            <?php echo e(Html::style('ui/css/styles.css')); ?>

            <?php echo e(Html::style('ui/css/responsive.css')); ?>

            <?php echo e(Html::style('ui/css/custom.css')); ?>

            <?php echo e(Html::style('ui/css/font-awesome.css')); ?>

            <?php echo e(Html::style('ui/css/scroll-top.css')); ?>

              <script src="https://kit.fontawesome.com/bce09a172b.js"></script>
            <link rel="icon" href=<?php echo e(asset("ui/images/favicon.png")); ?> sizes="16x16" type="image/png">
            <meta property="fb:app_id" content="2346017678815971" />
<!--     <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> -->
<meta property="og:title" content="Blogs">
    <meta property="og:site_name" content="http://livingart-online.com">
    <meta property="og:url" content="<?php echo e(url('/blog/'.$post->id)); ?>">
    <meta property="og:description" content="Best Homes Italica">
    <meta name="description" content="Best Homes Italica 1" >
    <meta property="og:type" content="website">
      <meta property="og:image" content="<?php echo e(asset("/images/post-cover-images/".$post->cover_image)); ?>">
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    
    <meta name="twitter:image" content="<?php echo e(asset("/images/post-cover-images/".$post->cover_image)); ?>"/>
  <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:card" content="summary"/>
   <!--  -->
        <?php $__env->stopSection(); ?>
        

<?php $__env->startSection('content'); ?>
<?php
    $lang1 =  App::getLocale();
?>
   <!-- Banner Section Start -->
   <div class="wrapper">
      <div class="about-page-banner">
         <img src=<?php echo e(asset("ui/images/destination_banner.jpg")); ?> alt="banner" />
      </div>
   </div>
   <!-- Banner Section End -->
   <!-- blog Start -->
   <div class="wrapper">
      <div class="about-us-text-wrapper remove-box-shadow">
         <div class="main-container-wrapper">
            <span class="main-heading"><?php echo app('translator')->getFromJson('app.blog'); ?></span>
            <div class="destinations-list-wrapper">
              <div class="infinite-scroll">
                 <div class="row">
                   <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                     <input type="hidden" name="post_id" id="post_id" value="<?php echo e($post->id); ?>">
                       <div class="blog-main-wrapper">
                          <div class="blog-images">
                             <a href="<?php echo e(url('')); ?>/blog/<?php echo e($post->id); ?>"><img src=<?php echo e(asset("images/post-cover-images/". $post['cover_image'])); ?> alt="<?php echo e($post['title']); ?>"></a>
                          </div>
                          <div class="blog-main-inner">
                             <div class="blog-inner-content equal-height">
                                <ul class="blog-share-section">
                                   <li>
                                      <a href="<?php echo e(url('')); ?>/blog/<?php echo e($post->id); ?>/print">&#xf02f;</a>
                                   </li>
                                   <li>
                                      <a href="javascript:void(0);" data-main-id="<?php echo e($post->id); ?>" id="share_dt" class=" idattrlink_<?php echo e($post->id); ?>" onclick="socialpopup(this)">&#xf045;</a>
                                      <div class="share-social-media idcontainer_<?php echo e($post->id); ?>" id="share-detail" style="display:none;">
                                         <div class="share-block-header">
                                            <span>Share</span>
                                            <abbr class="idcontainer-close" data-main-id="<?php echo e($post->id); ?>" 
                                              onclick="closepopup(this)" >&#xf057;</abbr>
                                         </div>
                                         <div class="share-inner-content">
                                            <ul class="share-social-media-icon">
                                               <li  style="width: 16%;"><a target="_blank" href="javascript:void(0);" lang="<?php echo e($lang1); ?>" class="btnShare"><i class="fab fa-facebook-f"></i></a></li>
                                               <li><a target="_blank" href="http://twitter.com/share?text=<?php echo e($post['title']); ?>&url=<?php echo e(url('blog/'.$post['id'])); ?>"><i class="fab fa-twitter"></i></a></li>
                                              <!--  <li><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li> -->
                                               <li><a target="_blank" href="mailto:?subject=<?php echo e($post->title); ?>&body=Check out this Blog <?php echo e(url('')); ?>/blog/<?php echo e($post->id); ?>"><i class="far fa-envelope"></i></a></li>
                                              <!--  <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo e(url('/blog/'.$post['id'])); ?>"><i class="fab fa-google-plus-g"></i></a></li> -->
                                            </ul>
                                      
                                         </div>
                                      </div>
                                   </li>
                                   <li>
                                      <a href="<?php echo e(url('')); ?>/blog/<?php echo e($post['id']); ?>/pdf">&#xf1c1;</a>
                                   </li>
                                   <li>
                                      <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                                      <span><?php echo e(date('d-m-Y',strtotime($post['created_at']))); ?></span>
                                   </li>
                                </ul>
                                <div class="blog-content">
                                   <span>
                                       <?php if(\Lang::has('blog.blog_title_'.$post['id'])): ?>
                                           <?php echo (new \App\Services\PropertyService)->truncate(trans('blog.blog_title_'.$post['id']),250); ?>

                                       <?php else: ?>
                                           <?php echo $post['title']; ?>

                                       <?php endif; ?>
                                   </span>
                                   <p>
                                       <?php if(\Lang::has('blog.blog_short_description_'.$post['id'])): ?>
                                           <?php echo (new \App\Services\PropertyService)->truncate(trans('blog.blog_short_description_'.$post['id']),250); ?>

                                       <?php else: ?>
                                           <?php echo (new \App\Services\PropertyService)->truncate($post['short_description'],250); ?>

                                       <?php endif; ?>
                                   </p>
                                    <?php if($lang1 == 'en'): ?>
                                                <a href="<?php echo e(url('')); ?>/blog/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getBlogTitle(trans('blog.blog_title_'.$post['id'])))); ?>" >Read More...</a>
                                              <?php else: ?>
                                               <a href="<?php echo e(url(''.$lang1.'')); ?>/blog/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getBlogTitle(trans('blog.blog_title_'.$post['id'])))); ?>">Read More...</a>
                                              <?php endif; ?>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($posts->links()); ?>

                 </div>
              </div>
            </div>
         </div>
       <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
      </div>
   </div>

   <?php $__env->startSection('custom-js'); ?>
            <?php echo e(Html::script('ui/js/jquery-library.js')); ?>

            <?php echo e(Html::script('ui/js/popper.min.js')); ?>

            <?php echo e(Html::script('ui/js/bootstrap.min.js')); ?>

            <?php echo e(Html::script('js/share.js')); ?>

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
           var lang1 = $(this).attr('lang');
            var URL ='';
            if(lang1 == 'en' ){
                var URL = "<?php echo e(url('')); ?>/blog/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getBlogTitle(trans('blog.blog_title_'.$post['id'])))); ?>";
            }else {

            var URL = "<?php echo e(url('')); ?>/"+lang1+"/blog/<?php echo e(preg_replace('/[[:space:]]+/', '+',(new \App\Services\PropertyService)->getBlogTitle(trans('blog.blog_title_'.$post['id'])))); ?>";
            }
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
      </script>
            <script>
                // Match Height
                $(function() {
                    $('.equal-height').matchHeight({
                        byRow: true,
                        property: 'height'
                    });

            
                });
               
               function socialpopup(th){
                if($('.share-social-media').length){
                  $('.share-social-media').fadeOut(300);
                }
                var postid =$(th).attr('data-main-id');
                $(th).next(".idcontainer_"+postid+"").show();
               }
               function closepopup(th){
                var poupid =$(th).attr('data-main-id');
                $(".idcontainer_"+poupid+"").slideUp(300);
               }
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

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>