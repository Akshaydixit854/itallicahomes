<div class="wrapper">
        <div class="about-page-banner">
        <img src="<?php echo e(public_path('images/post-cover-images/'.$post->cover_image)); ?>" width="300px" height="300px">
        </div>

    </div>
    <!-- Banner Section End -->
    <!-- blog Start -->
    <div class="wrapper">
        <div class="about-us-text-wrapper">
            <div class="main-container-wrapper">
                <span class="inner-blog-heading">
                    <?php if(\Lang::has('blog.blog_title_'.$post->id)): ?>
                        <?php echo (new \App\Services\PropertyService)->truncate(trans('blog.blog_title_'.$post->id),250); ?>

                    <?php else: ?>
                        <?php echo $post->title; ?>

                    <?php endif; ?>
                </span>
                <ul class="blog-share-section1 row">
                    <li class="col-md-6 col-6">
                        <a href="javascript:void(0)" class="calendar">&#xf073;</a>
                        <span><?php echo e(date('d-m-Y',strtotime($post->created_at))); ?></span>
                    </li>
                    
                </ul>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-blog-content">
                                <?php if(\Lang::has('blog.blog_description_'.$post->id)): ?>
                                    <?php echo trans('blog.blog_description_'.$post->id); ?>

                                <?php else: ?>
                                    <?php echo $post->content; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="demo">
                              <ul id="lightSlider">
                                  <?php if(!$gallery_images->isEmpty()): ?>
                                      <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li data-thumb="<?php echo e(public_path("/images/cover-images/".$gallery_image->image)); ?>">
                                              <img src="<?php echo e(public_path("/images/cover-images/".$gallery_image->image)); ?>"/ class="gallery-img">
                                          </li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </ul>
                          </div>
                        </div> -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>