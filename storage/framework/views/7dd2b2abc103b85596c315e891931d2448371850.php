<?php $__env->startSection('title'); ?>
    Edit Offer
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
                <h2>Property Offer</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>Edit Property Offer</h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="<?php echo e(route('add-offer.update',$offer->id)); ?>" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               <?php echo e(csrf_field()); ?>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Offer Name <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <input type="text" class="form-control" name="offer_name" value="<?php echo e($offer->offer_name); ?>" required placeholder="Enter Offer Name">
                                            </div>
                                            <?php if($errors->has('offer_name')): ?>
                                                <label id="name-error" class="error" for="offer_name"><?php echo e($errors->first('offer_name')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <?php

                                            $language_title = json_decode($language_line_title);
                                        ?>

                                        <label class="form-label">Name/Title In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php if(\Lang::has('property_offer.property_offer_title_'.$offer->id)): ?> <?php echo e($language_title->text->it); ?> <?php endif; ?>" name="name_italian"  placeholder="Enter Name or Title of the Property In Italian">
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Name/Title In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control"  value="<?php if(\Lang::has('property_offer.property_offer_title_'.$offer->id)): ?> <?php echo e($language_title->text->de); ?> <?php endif; ?>" name="name_german"  placeholder="Enter Name or Title of the Property In German">
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">UPDATE</button>
                                  <button class="btn btn-info1" type="button" onclick="window.history.back();" >BACK</button>
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