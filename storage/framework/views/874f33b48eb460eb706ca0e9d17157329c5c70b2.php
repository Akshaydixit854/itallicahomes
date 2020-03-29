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
<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <div class="block-header">
                <h2>Destination</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                               Edit Destinations
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="<?php echo e(route('add-destination.update',$destination->id)); ?>" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               <?php echo e(csrf_field()); ?>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Destination Name <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <input type="text" class="form-control" name="destination_name" value="<?php echo e($destination->destination_name); ?>" required placeholder="Enter Destination Name">
                                            </div>
                                            <?php if($errors->has('destination_name')): ?>
                                                <label id="name-error" class="error" for="destination_name"><?php echo e($errors->first('destination_name')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $language_title = json_decode($language_line_title);
                                        ?>

                                        <label class="form-label">Name/Title In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php if(\Lang::has('destination.destination_title_'.$destination->id)): ?> <?php echo e($language_title->text->it); ?> <?php endif; ?>" name="name_italian"  placeholder="Enter Name or Title of the Property In Italian">
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <label class="form-label">Name/Title In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control"  value="<?php if(\Lang::has('destination.destination_title_'.$destination->id)): ?> <?php echo e($language_title->text->de); ?> <?php endif; ?>" name="name_german"  placeholder="Enter Name or Title of the Property In German">
                                            </div>
                                            <?php if($errors->has('name_italian')): ?>
                                                <label id="name-error" class="error" for="name_italian"><?php echo e($errors->first('name_italian')); ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $language = json_decode($language_line);
                                        ?>
                                         <label class="form-label">Description <span class="req_field">*</span></label>
                                     <div class="form-group ">
                                            <textarea id="ckeditor" class="description"  name="description" ><?php if(\Lang::has('destination.destination_description_'.$destination->id)): ?> <?php echo e($language->text->en); ?> <?php endif; ?></textarea>
                                        <?php if($errors->has('description')): ?>
                                            <label id="name-error" class="error" for="description"><?php echo e($errors->first('description')); ?></label>
                                        <?php endif; ?>
                                    </div>
                                        <label class="form-label">Description In Italian</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                    $language = json_decode($language_line);
                                                ?>


                                                <textarea id="ckeditor2" class="form-control" name="desc_italian" placeholder="Description in italian"><?php if(\Lang::has('destination.destination_description_'.$destination->id)): ?> <?php echo e($language->text->it); ?> <?php endif; ?></textarea>
                                            </div>
                                        </div>
                                        <label class="form-label">Description In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea id="ckeditor3" name="desc_german" class="form-control"  placeholder="Description in german"><?php if(\Lang::has('destination.destination_description_'.$destination->id)): ?> <?php echo e($language->text->de); ?> <?php endif; ?></textarea>
                                            </div>

                                        </div>
                                        <label class="form-label">Cover Image <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <img src="<?php echo e(url('')); ?>/images/destination-covers/<?php echo e($destination->cover_image); ?>" height="100px" width="100px" />
                                                <input type="file" class="form-control" name="cover_image" placeholder="Choose Cover Image">
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

    <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?>


     <?php echo e(Html::script('bsbmd/plugins/ckeditor/ckeditor.js')); ?>

     <script type="text/javascript">
           $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor');
             CKEDITOR.replace('ckeditor2');
              CKEDITOR.replace('ckeditor3');
           
            CKEDITOR.config.height = 300;
        });
     </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>