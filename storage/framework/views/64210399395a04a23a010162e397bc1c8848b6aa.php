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

<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <?php if(Session::has('message')): ?>
                <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
            <?php endif; ?>
            <div class="block-header">
                <h2>Contact Deatils</h2>
            </div>
    <div class="row">
        <div class="col-lg-12">            
            <div class="card card-outline-info">
               <!--  <div class="card-header">
                   <h4 class="m-b-0 text-white"><?php echo e(trans('label.general')); ?> <?php echo e(trans('label.settings')); ?></h4>
               </div> -->
                <div class="card-body">

                    <?php echo e(Form::model(!empty($arrGeneral), array("method" => "POST", "url" =>'admin/general-settings', "name"=>"create_form", "id"=>"create-form", "class"=>"", "files" => true))); ?>

                    <div class="form-body">
                        <h3 class="card-title">REGISTRED OFFICE</h3>
                        <hr>
                        <!-- pagination and social link   -->
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Address<sup class="text-danger">*</sup></label>
                                    
                                    <?php echo e(Form::text("registred_address", $value =(!empty($arrGeneral['registred_address'])) ?$arrGeneral['registred_address'] : old("registred_address") , array("class" => "form-control  ", "id"=>"registred_address","placeholder" =>'Address',"required"=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Telephone<sup class="text-danger">*</sup></label>
                                    
                                    <?php echo e(Form::text("registred_telephone", $value =(!empty($arrGeneral['registred_telephone'])) ?$arrGeneral['registred_telephone'] : old("registred_telephone") , array("class" => "form-control  ", "id"=>"registred_telephone","minlength"=>"10","maxlength"=>"25","placeholder" =>'Telephone',"required"=>'required'))); ?>

                                </div>
                            </div>
                        </div>
                        
                        <!-- end pagination   -->
                        <!-- contact no and contact email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Fax<sup class="text-danger">*</sup></label>
                                    
                                    <?php echo e(Form::text("registred_fax", $value =(!empty($arrGeneral['registred_fax'])) ?$arrGeneral['registred_fax'] : old("registred_fax") , array("class" => "form-control  ", "id"=>"registred_fax","minlength"=>"10","maxlength"=>"30","placeholder" =>'Fax'))); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email<sup class="text-danger">*</sup></label>
                                    <?php echo e(Form::email("registred_mail", $value =(!empty($arrGeneral['registred_mail'])) ?$arrGeneral['registred_mail'] : old("registred_mail") , array("class" => "form-control ", "id"=>"registred_mail","placeholder" =>'Mail'))); ?>

                                </div>
                            </div>
                        </div>
                        <!--end contact no and contact email -->
                    </div>
                    <hr>
                    <div class="form-body">
                        <h3 class="card-title">SERVICE OFFICE</h3>
                        <hr>
                        <!-- pagination and social link   -->
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Address<sup class="text-danger">*</sup></label>
                                    
                                    <?php echo e(Form::text("service_address", $value =(!empty($arrGeneral['service_address'])) ?$arrGeneral['service_address'] : old("service_address") , array("class" => "form-control  ", "id"=>"service_address","placeholder" =>'Address',"required"=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Telephone<sup class="text-danger">*</sup></label>
                                    
                                    <?php echo e(Form::text("service_telephone", $value =(!empty($arrGeneral['service_telephone'])) ?$arrGeneral['service_telephone'] : old("service_telephone") , array("class" => "form-control  ", "id"=>"service_telephone","minlength"=>"10","maxlength"=>"25","placeholder" =>'Telephone',"required"=>'required'))); ?>

                                </div>
                            </div>
                        </div>
                        
                        <!-- end pagination   -->
                        <!-- contact no and contact email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Fax<sup class="text-danger">*</sup></label>
                                    
                                    <?php echo e(Form::text("service_fax", $value =(!empty($arrGeneral['service_fax'])) ?$arrGeneral['service_fax'] : old("service_fax") , array("class" => "form-control  ", "id"=>"service_fax","minlength"=>"10","maxlength"=>"30","placeholder" =>'Fax'))); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email<sup class="text-danger">*</sup></label>
                                    <?php echo e(Form::email("service_mail", $value =(!empty($arrGeneral['service_mail'])) ?$arrGeneral['service_mail'] : old("service_mail") , array("class" => "form-control ", "id"=>"service_mail","placeholder" =>'Mail'))); ?>

                                </div>
                            </div>
                        </div>
                        <!--end contact no and contact email -->
                    </div>
                    <div class="form-actions">
                        <?php echo Form::submit( 'Save', ['class' => 'btn btn-info save-btn']); ?>

                        <a href="<?php echo e(url('/admin/')); ?>" class="cancel-btn">Cancel</a>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-script'); ?>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script>
jQuery(document).ready(function ($) {
    $('body').on('keypress', '#pagination_rows', function(event) {
        if (($(this).val().length === 0 && event.which == 48) ||(event.which != 46 || event.which != 190 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
            event.preventDefault(); //stop character from entering input
    });

    $("form[name='create_form']").validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules : {
            pagination_rows : {
                required  : true,
                maxlength : 2
            },
            contact_no : {
                digits    : true,
                maxlength : 10,
                minlength : 10
            }
        },
        messages : {
            pagination_rows : {
                required  : "<?php echo e(trans('label.please_enter')); ?> <?php echo e(trans('label.pagination_rows')); ?>",
                maxlength : "<?php echo e(trans('label.pagination_rows')); ?> <?php echo e(trans('label.must_contain_less_than')); ?> {0} <?php echo e(trans('label.digits')); ?>",
            },
            contact_no : {
                maxlength : "<?php echo e(trans('label.contact_no')); ?> <?php echo e(trans('label.must_contain')); ?> {0} <?php echo e(trans('label.digits')); ?>",
                minlength : "<?php echo e(trans('label.contact_no')); ?> <?php echo e(trans('label.must_contain')); ?> {0} <?php echo e(trans('label.digits')); ?>"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
  
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>