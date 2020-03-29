<?php $__env->startSection('title'); ?>
    Messages
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


    <!-- JQuery DataTable Css -->
    <?php echo e(Html::style('bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>


<?php $__env->stopSection(); ?>
<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <h2>Messages</h2>
        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>Messages</h2>
                        <ul class="header-dropdown m-r--5">
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php if(count($contact_faqs) > 0): ?>
                                    <?php $__currentLoopData = $contact_faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if($row->is_read == 0): ?>
                                                <td><b><?php echo e($key + 1); ?></b></td>
                                                <td><b><?php echo e($row->name); ?> </b></td>
                                                <td><b><?php echo e($row->email); ?></b> </td>
                                                <td><b><?php echo e($row->message); ?></b> </td>
                                                <td>
                                                   <a href="/admin/mark/read/<?php echo e($row->id); ?>" class="btn btn-success waves-effect" type="submit"><i class="far fa-eye"></i></a>
                                                   <a href="/admin/mark/delete/<?php echo e($row->id); ?>" class="btn btn-danger waves-effect" type="submit"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            <?php else: ?>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e($row->name); ?> </td>
                                                <td><?php echo e($row->email); ?> </td>
                                                <td><?php echo e($row->message); ?> </td>
                                                <td>
                                                   <a href="/admin/mark/read/<?php echo e($row->id); ?>" class="btn btn-success waves-effect" type="submit"><i class="far fa-eye"></i></a>
                                                   <a href="/admin/mark/delete/<?php echo e($row->id); ?>" class="btn btn-danger waves-effect" type="submit"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
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


    <!-- Jquery DataTable Plugin Js -->
    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/jquery.dataTables.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/tables/jquery-datatable.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>