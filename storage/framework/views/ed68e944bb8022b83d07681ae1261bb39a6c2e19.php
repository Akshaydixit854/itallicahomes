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
            <h2>Owner Services</h2>
        </div>
        <?php
            $uniq_id = uniqid();
        ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Add Owner Services
                        </h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="<?php echo e(url('')); ?>/admin/store_owner" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                 
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
          $("#button").click(function (e) {
            e.preventDefault();
             $('#form_validation').submit();
            //$('#form_validation').submit();
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>