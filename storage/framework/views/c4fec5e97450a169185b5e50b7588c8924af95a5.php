<?php $__env->startSection('title'); ?>
    New Property Type
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
<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <h2>Region Type</h2>
        </div>
        <!-- 'name', 'net_wt', 'gross_wt', 'stone_wt', 'other_details', 'description', 'item_image', 'caret', 'item_size', 'purity', 'height', 'width', 'discount', 'price', 'user_id']; -->
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Add New Region Type
                        </h2>

                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="<?php echo e(route('add-region.store')); ?>"
                              enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <label class="form-label">Region Name <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="region_name" placeholder="Enter Property Type" required>
                                        </div>
                                        <?php if($errors->has('region_name')): ?>
                                            <label id="name-error" class="error"
                                                   for="region_name"><?php echo e($errors->first('region_name')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Name/Title In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_italian"  placeholder="Name In Italian">
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Name/Title In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name_german"  placeholder="Name  In German">
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Description <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="description" required placeholder="Enter Property Description"></textarea>
                                        </div>
                                        <?php if($errors->has('description')): ?>
                                            <label id="name-error" class="error"
                                                   for="type_name"><?php echo e($errors->first('description')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Description In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="italian"  placeholder="Description in italian"></textarea>
                                        </div>

                                    </div>
                                    <label class="form-label">Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="german"  placeholder="Description in german"></textarea>
                                        </div>
                                    </div>
                                    <label class="form-label">Image <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                        <?php if($errors->has('image')): ?>
                                            <label id="name-error" class="error" for="image"><?php echo e($errors->first('image')); ?></label>
                                        <?php endif; ?>
                                    </div>


                                </div>
                            </div>

                            <button class="btn btn-primary waves-effect" type="submit">ADD</button>
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

    <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>