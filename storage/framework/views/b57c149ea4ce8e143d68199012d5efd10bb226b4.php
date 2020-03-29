<?php $__env->startSection('title'); ?>
    Add FAQ
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
            <h2>Add New FAQ</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Add New FAQ
                        </h2>

                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" action="<?php echo e(route('add-faq.store')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="form-label">Question <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question" required placeholder="Enter Question">
                                        </div>
                                        <?php if($errors->has('question')): ?>
                                            <label id="name-error" class="error" for="question"><?php echo e($errors->first('question')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Question In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question_italian"  placeholder="Question In Italian">
                                        </div>
                                        <?php if($errors->has('question_italian')): ?>
                                            <label id="name-error" class="error" for="question_italian"><?php echo e($errors->first('question_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Question In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question_german"  placeholder="Question  In German">
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="question_german"><?php echo e($errors->first('question_german')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Answer <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="answer" required placeholder="Enter Answer"></textarea>
                                        </div>
                                        <?php if($errors->has('answer')): ?>
                                            <label id="name-error" class="error" for="answer"><?php echo e($errors->first('answer')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Answer In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="answer_italian"  placeholder="Name In Italian"></textarea>
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="answer_italian"><?php echo e($errors->first('answer_italian')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Answer In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="answer_german"  placeholder="Name  In German"></textarea>
                                        </div>
                                        <?php if($errors->has('name_italian')): ?>
                                            <label id="name-error" class="error" for="answer_german"><?php echo e($errors->first('answer_german')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <label class="form-label">Priority <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="priority" required>
                                        </div>
                                        <?php if($errors->has('priority')): ?>
                                            <label id="name-error" class="error" for="priority"><?php echo e($errors->first('answer')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon" style="text-align: left;">
                                                <input type="checkbox" name="is_agent" class="filled-in" value="1" id="ig_checkbox">
                                                <label for="ig_checkbox" >Is Agent?</label>
                                        </span>
                                        <?php if($errors->has('is_agent')): ?>
                                            <label id="name-error" class="error" for="is_agent"><?php echo e($errors->first('is_agent')); ?></label>
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