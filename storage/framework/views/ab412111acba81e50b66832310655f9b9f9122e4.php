<?php $__env->startSection('title'); ?>
    Destinations
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
    <?php echo e(Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')); ?>

    <?php echo e(Html::style('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css')); ?>

    <?php echo e(Html::style('bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>

    <!-- JQuery sweetalert Css -->
    <?php echo e(Html::style('/css/sweetalert.css')); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <?php if(Session::has('message')): ?>
                <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
            <?php endif; ?>
            <div class="block-header">
                <h2>Destinations</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>Add New Destinations</h2>
                            <a href="<?php echo e(route('add-destination.create')); ?>" class="btn btn-info m-t-15 waves-effect">Add New</a>
                            <ul class="header-dropdown m-r--5">

                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="display nowrap table table-bordered table-striped table-hover dataTable js-exportable" id="example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cover Image</th>
                                            <th>Destination NAme</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cover Image</th>
                                            <th>Destination NAme</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if(count($destinations) > 0): ?>
                                        	<?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            	<td><?php echo e($key + 1); ?></td>
                                                <td><a target="_blank" href="<?php echo e(url('')); ?>/images/destination-covers/<?php echo e($row->cover_image); ?>" class="table-prev-img"> <img  src="<?php echo e(url('')); ?>/images/destination-covers/<?php echo e($row->cover_image); ?>" width="200px" height="100px" /></td></td>
                                                <td class="table-tit"><?php echo e($row->destination_name); ?> </td>
                                                <td class="table-des"><?php echo e($row->description); ?> </td>
                                            	<td>
                                            	    <a href="<?php echo e(route('add-destination.edit',$row->id)); ?>" class="btn btn-warning waves-effect"><i class="far fa-edit"></i></a>
                                                    <form class="display-inline delete_form_<?php echo e($row->id); ?>" id="delete_form" method="POST" action="<?php echo e(route('add-destination.destroy',$row->id)); ?>">
    					                  <?php echo e(csrf_field()); ?>

    					                  <input name="_method" type="hidden" value="DELETE">
    					                  <button class="btn btn-danger waves-effect" onclick="delete_record('<?php echo e($row->id); ?>')" type="button"><i class="far fa-trash-alt"></i></button>
    					            </form>
                                            	</td>
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

    <?php echo e(Html::script('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>

    <?php echo e(Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>

    <?php echo e(Html::script('bsbmd/js/pages/tables/jquery-datatable.js')); ?>

    <!-- Jquery Sweetalert  Js -->
    <?php echo e(Html::script('js/sweetalert.min.js')); ?>

    <?php echo e(Html::script('js/sweetAlert.js')); ?>

     <script>
         $(document).ready(function(){
            if($('.alert').length) {
                $('.alert').fadeOut(4000);
            }
         });
     </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>