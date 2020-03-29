<?php $__env->startSection('title'); ?>
    Edit Destination
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
        <?php if(Session::has('message')): ?>
            <p class="alert <?php echo e(Session::get('alert-class', 'alert-info1')); ?>"><?php echo e(Session::get('message')); ?></p>
        <?php endif; ?>
            <div class="block-header">
                <h2>Edit Testimonial</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                                <?php echo app('translator')->getFromJson('app.add-new-testimonial'); ?>
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="<?php echo e(route('add-testimonial.update',$testimonial->id)); ?>" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               <?php echo e(csrf_field()); ?>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Testimonial Person Name <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <input type="text" class="form-control" name="name" value="<?php echo e($testimonial->name); ?>" data-parsley-errors-container="#checkbox-errors" required placeholder="Enter Testimonial Person Name">
                                            </div>
                                            <?php if($errors->has('name')): ?>
                                                <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                          <div id="checkbox-errors"  class="error"></div>

                                        <label class="form-label">Description <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <textarea class="form-control" rows="4" name="description"  placeholder="Enter Destination Description" data-parsley-errors-container="#checkbox-error_des" required><?php echo e($testimonial->description); ?></textarea>
                                        
                                            </div>
                                            <?php if($errors->has('description')): ?>
                                                <label id="name-error" class="error" for="description"><?php echo e($errors->first('description')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <div id="checkbox-error_des" class="error"></div>

                                        <label class="form-label">Cover Image</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <img src="<?php echo e(url('')); ?>/images/testimonial-covers/<?php echo e($testimonial->cover_image); ?>" width="150px" height="150px" />
                                                <input type="file" class="form-control" name="cover_image"  placeholder="Choose Cover Image">
                                            </div>
                                            <?php if($errors->has('cover_image')): ?>
                                                <label id="name-error" class="error" for="cover_image"><?php echo e($errors->first('cover_image')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">UPDATE</button>
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
    <?php echo e(Html::script('bsbmd/plugins/autosize/autosize.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/momentjs/moment.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/forms/basic-form-elements.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')); ?>

    <!-- <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?> -->

     <?php echo e(Html::script('/js/parsley.min.js')); ?>


     <script type="text/javascript">

   $(function(){

        window.ParsleyValidator
        .addValidator('fileextension', function (value, requirement) {
                var tagslistarr = requirement.split(',');
            var fileExtension = value.split('.').pop();
                        var arr=[];
                        $.each(tagslistarr,function(i,val){
                         arr.push(val);
                        });
            if(jQuery.inArray(fileExtension, arr)!='-1') {
              console.log("is in array");
              return true;
            } else {
              console.log("is NOT in array");
              return false;
            }
        }, 32)
        .addMessage('en', 'fileextension', 'The extension doesn\'t match the required');
  
     $('#testimonial_form').parsley();
});
 

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>