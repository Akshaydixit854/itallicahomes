<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | <?php echo app('translator')->getFromJson('app.app-name'); ?></title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <?php $__env->startSection('css'); ?>
        <?php echo e(Html::style('bsbmd/plugins/bootstrap/css/bootstrap.css')); ?>

        <?php echo e(Html::style('bsbmd/plugins/node-waves/waves.css')); ?>

        <?php echo e(Html::style('bsbmd/plugins/animate-css/animate.css')); ?>

        <?php echo e(Html::style('bsbmd/plugins/morrisjs/morris.css')); ?>

        <?php echo e(Html::style('bsbmd/css/style.css')); ?>

        <?php echo e(Html::style('bsbmd/css/themes/all-themes.css')); ?>


         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php echo $__env->yieldSection(); ?>
</head>

<body class="login-page">
<div class="container">
<div class="row">
    <div class="col-md-7 col-sm-7"></div>
    <div class="col-md-5 col-sm-5">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);"><b></b><?php echo app('translator')->getFromJson('app.app-name'); ?></a>
                <small>Welcome</small>
            </div>
            <div class="card">
                <div class="body">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <?php $__env->startSection('script'); ?>
        <?php echo e(Html::script('bsbmd/plugins/jquery/jquery.min.js')); ?>

        <?php echo e(Html::script('bsbmd/plugins/bootstrap/js/bootstrap.js')); ?>

        <?php echo e(Html::script('bsbmd/plugins/node-waves/waves.js')); ?>

        <?php echo e(Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')); ?>

        <?php echo e(Html::script('bsbmd/js/admin.js')); ?>

        <?php echo e(Html::script('bsbmd/js/pages/examples/sign-in.js')); ?>

    <?php echo $__env->yieldSection(); ?>

</body>

</html>