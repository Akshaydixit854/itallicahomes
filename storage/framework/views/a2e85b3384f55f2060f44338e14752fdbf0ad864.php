

<?php $__env->startSection('title'); ?>
New Property Type
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
<?php echo e(Html::style('bsbmd/plugins/bootstrap/css/bootstrap.css')); ?>

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


<!-- Colorpicker Css -->
<?php echo e(Html::style('bsbmd/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')); ?>


<!-- Font Awesome -->
<?php echo e(Html::style('bsbmd/plugins/font-awesome/css/font-awesome.min.css')); ?>

<?php echo e(Html::style('bsbmd/plugins/font-awesome-icons/fontawesome-iconpicker.css')); ?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


<?php $__env->stopSection(); ?>
<?php if(Session::has('message')): ?>
<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>Property Type</h2>
    </div>
    <?php
    $uniq_id = uniqid();
    ?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2>
                        Add Meta Tags, Description & keywords
                    </h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" action="<?php echo e(route('add-meta-tags.store')); ?>"
                    enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row clearfix">
                     <div class="col-sm-6">
                          <label class="form-label">Page Title <span class="req_field">*</span></label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="page_title" id="page_title" placeholder="Enter Page Title"></textarea>
                            </div>
                            <?php if($errors->has('page_title')): ?>
                            <label id="name-error" class="error" for="page_title"><?php echo e($errors->first('page_title')); ?></label>
                            <?php endif; ?>
                        </div>
                        <label class="form-label">Meta Title <span class="req_field">*</span></label>
                        <div class="form-group ">
                            <div class="form-line">
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title">
                            </div>
                            <?php if($errors->has('meta_title')): ?>
                            <label id="name-error" class="error" for="meta_title"><?php echo e($errors->first('meta_title')); ?></label>
                            <?php endif; ?>
                        </div>
                         <label class="form-label">Meta Title German</label>
                        <div class="form-group ">
                            <div class="form-line">
                                <input type="text" class="form-control" name="meta_title_german" id="meta_title_german" placeholder="Enter Meta Title German">
                            </div>
                            <?php if($errors->has('meta_title_german')): ?>
                            <label id="name-error" class="error" for="meta_title_german"><?php echo e($errors->first('meta_title_german')); ?></label>
                            <?php endif; ?>
                        </div>
                         <label class="form-label">Meta Title Italian</label>
                        <div class="form-group ">
                            <div class="form-line">
                                <input type="text" class="form-control" name="meta_title_italian" id="meta_title_italian" placeholder="Enter Meta Title Italian">
                            </div>
                            <?php if($errors->has('meta_title_italian')): ?>
                            <label id="name-error" class="error" for="meta_title_italian"><?php echo e($errors->first('meta_title_italian')); ?></label>
                            <?php endif; ?>
                        </div>

                        <label class="form-label">Meta Description <span class="req_field">*</span></label>
                        <div class="form-group ">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description"></textarea>
                            </div>
                            <?php if($errors->has('meta_description')): ?>
                            <label id="name-error" class="error" for="meta_description"><?php echo e($errors->first('meta_description')); ?></label>
                            <?php endif; ?>
                        </div>
                        <label class="form-label">Meta Description German</label>
                        <div class="form-group ">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_description_german" id="meta_description_german" placeholder="Enter Meta Description German"></textarea>
                            </div>
                            <?php if($errors->has('meta_description_german')): ?>
                            <label id="name-error" class="error" for="meta_description_german"><?php echo e($errors->first('meta_description_german')); ?></label>
                            <?php endif; ?>
                        </div>
                        <label class="form-label">Meta Description Italian</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_description_italian" id="meta_description_italian" placeholder="Enter Meta Description Italian"></textarea>
                            </div>
                            <?php if($errors->has('meta_description_italian')): ?>
                            <label id="name-error" class="error" for="meta_description_italian"><?php echo e($errors->first('meta_description_italian')); ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Meta Keyword</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Enter Meta Keyword"></textarea>
                            </div>
                            <?php if($errors->has('meta_keyword')): ?>
                            <label id="name-error" class="error" for="meta_keyword"><?php echo e($errors->first('meta_keyword')); ?></label>
                            <?php endif; ?>
                        </div>
                        <label class="form-label">Meta Keyword German</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_keyword_italian" id="meta_keyword_italian" placeholder="Enter Meta Keyword German"></textarea>
                            </div>
                            <?php if($errors->has('meta_keyword_italian')): ?>
                            <label id="name-error" class="error" for="meta_keyword_italian"><?php echo e($errors->first('meta_keyword_italian')); ?></label>
                            <?php endif; ?>
                        </div>
                        <label class="form-label">Meta Keyword Italian</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="2" class="form-control" name="meta_keyword_german" id="meta_keyword_german" placeholder="Enter Meta Keyword Italian"></textarea>
                            </div>
                            <?php if($errors->has('meta_keyword_german')): ?>
                            <label id="name-error" class="error" for="meta_keyword_german"><?php echo e($errors->first('meta_keyword_german')); ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button id="button" class="btn btn-primary waves-effect" type="submit">Add</button>
                        <button class="btn btn-info1" type="button" onclick="window.history.back();">BACK</button>
                    </div>
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

<script type="text/javascript">

    $("#button").click(function (e) {
        if($('.error').length > 0) {
            $('.error').remove();
        }
        var meta_title = $('#meta_title').val().trim();
        var meta_description = $('#meta_description').val().trim();
        var page_title = $('#page_title').val().trim();


        if( meta_title == '' || meta_description == '' || page_title =='')
        {
            if(meta_title == '') {
                $('#meta_title').after('<p class="error">Required</p>');
            }
            if(page_title == '') {
                $('#page_title').after('<p class="error">Required</p>');
            }
            if(meta_description == ''){
                $('#meta_description').after('<p class="error">Required</p>');
            }
            return false;
        }
        $('#form_validation').submit();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>