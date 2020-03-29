<?php $__env->startSection('title'); ?>
	User
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
                <h2>Add New User</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New User
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="<?php echo e(route('users.store')); ?>">
                            <?php echo e(csrf_field()); ?>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line <?php echo e($errors->has('name') ? ' error' : ''); ?>">
                                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Username"  autocomplete="off" required autofocus>
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
                                        <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email Address" required autofocus>
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <label id="email-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line <?php echo e($errors->has('password') ? ' error' : ''); ?>">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <label id="password-error" class="error" for="name"><?php echo e($errors->first('password')); ?></label>
                                    <?php endif; ?>
                                </div>
                                            <!-- $fl_array = in_array("/%admin%/", $role); -->
                                <div class="form-group form-float">
                                    <label class="form-label">Roles</label>
                                    <select class="form-control show-tick" name="roles[]" multiple required>
                                            <optgroup label="Roles" data-max-options="1">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option><?php echo e($role); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                            </optgroup>
                                  <!--       <optgroup label="Roles" data-max-options="1">
                                            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                                            <?php
                                            $aray = array('admin','admin1','admin2','admin3','superadmin','superadmin2','superadmin3','superadmin4','Admin','super-admin','SuperAdmin','super-admin1','super-admin2','super-admin3','super-admin4');
                                            ?>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($role,$aray)): ?>
                                            continue;
                                            <?php else: ?>                  
                                            <option><?php echo e($role); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php else: ?> 
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option><?php echo e($role); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>                                      
                                        </optgroup> -->
                                    </select>
                                    
                                     <?php if($errors->has('roles')): ?>
                                        <label id="name-error" class="error" for="email"><?php echo e($errors->first('roles')); ?></label>
                                    <?php endif; ?>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">ADD</button>
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