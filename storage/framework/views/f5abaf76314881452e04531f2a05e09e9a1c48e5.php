<?php $__env->startSection('content'); ?>

<form id="sign_in" role="form" method="POST" action="<?php echo e(url('login')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="msg">Sign in to start your session</div>
    <div class="input-group">
        <span class="input-group-addon">
        <i class="material-icons">person</i>
        </span>
        <div class="form-line <?php echo e($errors->has('email') ? ' error' : ''); ?>">
            <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Username" required autofocus>
        </div>
        <?php if($errors->has('email')): ?>
        <label id="name-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
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
        <label id="name-error" class="error" for="name"><?php echo e($errors->first('password')); ?></label>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-xs-8 p-t-5">
            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> class="filled-in chk-col-pink">
            <label for="rememberme">Remember Me</label>
        </div>
        <div class="col-xs-4">
            <button class="btn btn-block bg-pink waves-effect sign-btn" type="submit">SIGN IN</button>
        </div>
    </div>
    <div class="row m-t-15 m-b--20">
        
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>