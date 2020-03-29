

<?php $__env->startSection('title'); ?>
    Add New Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <!-- Colorpicker Css -->
    <?php echo e(Html::style('bsbmd/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')); ?>


    <!-- Dropzone Css -->
    <?php echo e(Html::style('bsbmd/plugins/dropzone/dropzone.css')); ?>


    <!-- Multi Select Css -->
    <?php echo e(Html::style('bsbmd/plugins/multi-select/css/multi-select.css')); ?>


    <!-- Bootstrap Spinner Css -->
    <?php echo e(Html::style('bsbmd/plugins/jquery-spinner/css/bootstrap-spinner.css')); ?>


    <!-- Bootstrap Tagsinput Css -->
    <?php echo e(Html::style('bsbmd/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>


    <!-- Bootstrap Select Css -->
    <?php echo e(Html::style('bsbmd/plugins/bootstrap-select/css/bootstrap-select.css')); ?>


    <!-- noUISlider Css -->
    <?php echo e(Html::style('bsbmd/plugins/nouislider/nouislider.min.css')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
<?php if(Session::has('error')): ?>
    <p class="errors alert alert-danger"><?php echo e(Session::get('error')); ?></p>

<?php endif; ?>
            <h2>Add New Blog</h2>
        </div>
        <?php
            $uniq_id = uniqid();
        ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Add New Blogs
                        </h2>

                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="<?php echo e(route('add-post.store')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="form-label">Blog Title <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>" placeholder="blog Title" required>
                                        </div>
                                        <?php if($errors->has('title')): ?>
                                            <label id="name-error" class="error" for="title"><?php echo e($errors->first('title')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Name/Title In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_italian"  value="<?php echo e(old('name_italian')); ?>" placeholder="Title  In Italian">
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Name/Title In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_german"  value="<?php echo e(old('name_german')); ?>" placeholder="Enter Title  In German">
                                        </div>
                                        <?php if($errors->has('name_german')): ?>
                                            <label id="name-error" class="error" for="name_german"><?php echo e($errors->first('name_german')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Short Description <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="short_description" value="<?php echo e(old('short_description')); ?>"  placeholder="Enter Short Description" required></textarea>
                                        </div>
                                        <?php if($errors->has('short_description')): ?>
                                            <label id="name-error" class="error" for="short_description"><?php echo e($errors->first('short_description')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Short Description In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="italian_short_description" value="<?php echo e(old('italian_short_description')); ?>"  placeholder="Enter Short Description In Italian"></textarea>
                                        </div>
                                        <?php if($errors->has('italian_short_description')): ?>
                                            <label id="name-error" class="error" for="italian_short_description"><?php echo e($errors->first('italian_short_description')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Short Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="german_short_description" value="<?php echo e(old('german_short_description')); ?>"  placeholder="Enter Short Description In German"></textarea>
                                        </div>
                                        <?php if($errors->has('german_short_description')): ?>
                                            <label id="name-error" class="error" for="german_short_description"><?php echo e($errors->first('german_short_description')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Post Content <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <textarea id="ckeditor1" name="content" value="<?php echo e(old('content')); ?>"  required></textarea>
                                        <?php if($errors->has('content')): ?>
                                            <label id="name-error" class="error" for="content"><?php echo e($errors->first('content')); ?></label>
                                        <?php endif; ?>
                                    </div>

                                    <label class="form-label">Post Content In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea id="ckeditor2" name="content_italian" value="<?php echo e(old('content_italian')); ?>" required></textarea>
                                        </div>
                                        <?php if($errors->has('content_italian')): ?>
                                            <label id="name-error" class="error" for="content_italian"><?php echo e($errors->first('content_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Post Content In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea id="ckeditor3" name="content_german"  value="<?php echo e(old('content_german')); ?>" required></textarea>
                                        </div>
                                        <?php if($errors->has('content_german')): ?>
                                            <label id="name-error" class="error" for="content_german"><?php echo e($errors->first('name_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Property Image Gallery</label>
                                    <div class="form-group ">
                                        <div class="dropzone clsbox" id="mydropzone">
            		                    </div>
                                        <input type="hidden" value="<?php echo e($uniq_id); ?>" id="gallery_token" name="gallery_token">
                                    <div>
                                    <ul class="img-alert-list"><li>1)Max file size allowed is 2MB </li><li>2)Max file allowed is 20</li></ul>

                                    <label class="form-label">Cover Image <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="file" name="cover_image" id="cover_image" class="form-control"  />
                                        </div>
                                        <p id="error1" style="display:none; color:#FF0000;">
                                        Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                        </p>
                                        <p id="error2" style="display:none; color:#FF0000;">
                                        Maximum File Size Limit is 1MB.
                                        </p>

                                        <?php if($errors->has('cover_image')): ?>
                                            <label id="name-error" class="error" for="cover_image"><?php echo e($errors->first('cover_image')); ?></label>
                                        <?php endif; ?>
                                    </div>

                                    <label class="form-label">Published By</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="published_by" required value="<?php echo e(Auth::user()->name); ?>">
                                        </div>
                                        <?php if($errors->has('published_by')): ?>
                                            <label id="name-error" class="error" for="published_by"><?php echo e($errors->first('published_by')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Online/Offline <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <select class="form-control" name="is_available" required>
                                                <option value="1" selected>Online</option>
                                                <option value="0">Offline</option>
                                            </select>
                                        </div>
                                        <?php if($errors->has('is_available')): ?>
                                            <label id="name-error" class="error" for="is_available"><?php echo e($errors->first('is_available')); ?></label>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>

                            <button id="button" class="btn btn-primary waves-effect" type="button">ADD</button>
                            <button class="btn btn-info1" type="button" onclick="window.history.back();">BACK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-script'); ?>
<script>
var a=0;
//binds to onchange event of your input field
$('#cover_image').on('change', function() {

var ext = $('#cover_image').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
    $('#error1').slideDown("slow");
    $('#error2').slideUp("slow");
    a=0;
    }else{
    var picsize = (this.files[0].size);
    if (picsize > 1000000){
    $('#error2').slideDown("slow");
    a=0;
    }else{
    a=1;
    $('#error2').slideUp("slow");
    }
    $('#error1').slideUp("slow");
    if (a==1){
        /*alert('in laert box');*/
       /* $('#form_validation').submit('click');*/
        }
}
});
    
</script>
    <?php echo e(Html::script('bsbmd/plugins/autosize/autosize.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/momentjs/moment.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/forms/basic-form-elements.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/dropzone/dropzone.js')); ?>

    <!-- Ckeditor -->
    <?php echo e(Html::script('bsbmd/plugins/ckeditor/ckeditor.js')); ?>

 <!--    <script>
        $(function () { 
            if($('.errors.alert').length){
                 $('.errors.alert').fadeOut('800000000');
            }
        });
    </script> -->
    <script>
        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.replace('ckeditor2');
            CKEDITOR.replace('ckeditor3');
            CKEDITOR.config.height = 300;
        });
    </script>
    <script>
        //drag and drop customization
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#mydropzone", {
          url: "/admin/blog_image_gallery/"+$('#gallery_token').val(),
          uploadMultiple: true,
          parallelUploads: 20,
          autoProcessQueue : false,
          createImageThumbnails: true,
          addRemoveLinks: true,
          maxFiles: 20,
          init: function() {
            this.on('error', function(file, errorMessage) {
            });
            this.on('addedfile', function(file) {
                if(file.size > (1024 * 1024 * 2)){ // not more than 2mb
                    this.removeFile(file);
                }
            });
            this.on("maxfilesexceeded", function(file){
                this.removeFile(file);
            });
          }
        });
        $("#button").click(function (e) {
            e.preventDefault();
            myDropzone.processQueue();
            setTimeout(function(){ $('#form_validation').submit(); }, 2000);
            //$('#form_validation').submit();
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>