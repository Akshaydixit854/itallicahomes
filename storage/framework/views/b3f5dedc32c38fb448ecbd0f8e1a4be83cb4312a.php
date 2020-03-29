<?php $__env->startSection('title'); ?>
    Edit Permission
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
                <h2>Users</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit User Details
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="<?php echo e(route('users.update',$user->id)); ?>">
                            <?php echo e(csrf_field()); ?>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line <?php echo e($errors->has('name') ? ' error' : ''); ?>">
                                        <input name="_method" type="hidden" value="PUT">
                                        <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" placeholder="Username" required autofocus>
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line <?php echo e($errors->has('email') ? ' error' : ''); ?>">
                                        <input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>" placeholder="Email Address" required autofocus>
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <label id="email-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Roles</label>
                                    <select class="form-control show-tick" name="roles[]" id="you" multiple required>
                                        <optgroup label="Roles" data-max-options="1">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option><?php echo e($role); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                    </select>
                                     <?php if($errors->has('roles')): ?>
                                        <label id="name-error" class="error" for="email"><?php echo e($errors->first('roles')); ?></label>
                                    <?php endif; ?>
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


    <!-- Multi Select Plugin Js -->
    <?php echo e(Html::script('bsbmd/plugins/multi-select/js/jquery.multi-select.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/forms/form-validation.js')); ?>


     <script type="text/javascript">
     console.log(role);
        $("select").val(role).prop("selected", true);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>