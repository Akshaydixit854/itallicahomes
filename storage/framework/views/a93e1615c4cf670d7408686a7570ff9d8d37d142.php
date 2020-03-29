<?php $__env->startSection('title'); ?>
    Edit Agency
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
                <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
            <?php endif; ?>
            <div class="block-header">
                <h2>Edit Agency</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                                Edit Agency
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="<?php echo e(route('add-agency.update',$agency->id)); ?>" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               <?php echo e(csrf_field()); ?>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Agency Name <span class="req_field">*</span></label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="agency_name" required value="<?php echo e($agency->agent_name); ?>">
                                            </div>
                                            <?php if($errors->has('agency_name')): ?>
                                                <label id="name-error" class="error" for="agency_name"><?php echo e($errors->first('agency_name')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $language_title = json_decode($language_line_title);
                                        ?>

                                        <label class="form-label">Agency Name In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php if(\Lang::has('agency.agency_title_'.$agency->id)): ?> <?php echo e($language_title->text->it); ?> <?php endif; ?>" name="name_italian"  placeholder="Agency Name In Italian">
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Agency Name In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control"  value="<?php if(\Lang::has('agency.agency_title_'.$agency->id)): ?> <?php echo e($language_title->text->de); ?> <?php endif; ?>" name="name_german"  placeholder="Agency Name In German">
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Phone Number <span class="req_field">*</span></label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="phone" class="form-control" name="phone_number" required value="<?php echo e($agency->phone_number); ?>">
                                            </div>
                                            <?php if($errors->has('phone_number')): ?>
                                                <label id="name-error" class="error" for="phone_number"><?php echo e($errors->first('phone_number')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Email <span class="req_field">*</span></label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="email" class="form-control" name="email" required value="<?php echo e($agency->email); ?>">
                                            </div>
                                            <?php if($errors->has('email')): ?>
                                                <label id="name-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
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

    <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>