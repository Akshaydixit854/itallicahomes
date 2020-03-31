@extends('index')

@section('title')
    User
@endsection

@section('extra-css')
<!-- Colorpicker Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}

    <!-- Dropzone Css -->
    {{ Html::style('bsbmd/plugins/dropzone/dropzone.css') }}

    <!-- Multi Select Css -->
    {{ Html::style('bsbmd/plugins/multi-select/css/multi-select.css') }}

    <!-- Bootstrap Spinner Css -->
    {{ Html::style('bsbmd/plugins/jquery-spinner/css/bootstrap-spinner.css') }}

    <!-- Bootstrap Tagsinput Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}

    <!-- Bootstrap Select Css -->
    {{ Html::style('bsbmd/plugins/bootstrap-select/css/bootstrap-select.css') }}

    <!-- noUISlider Css -->
    {{ Html::style('bsbmd/plugins/nouislider/nouislider.min.css') }}

@endsection

@section('content')
        <div class="container-fluid">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="block-header">
                <h2>Contact Deatils</h2>
            </div>
    <div class="row">
        <div class="col-lg-12">            
            <div class="card card-outline-info">
               <!--  <div class="card-header">
                   <h4 class="m-b-0 text-white">{{trans('label.general')}} {{trans('label.settings')}}</h4>
               </div> -->
                <div class="card-body">

                    {{ Form::model(!empty($arrGeneral), array("method" => "POST", "url" =>'admin/general-settings', "name"=>"create_form", "id"=>"create-form", "class"=>"", "files" => true)) }}
                    <div class="form-body">
                        <h3 class="card-title">REGISTRED OFFICE</h3>
                        <hr>
                        <!-- pagination and social link   -->
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Address<sup class="text-danger">*</sup></label>
                                    
                                    {{Form::text("registred_address", $value =(!empty($arrGeneral['registred_address'])) ?$arrGeneral['registred_address'] : old("registred_address") , array("class" => "form-control  ", "id"=>"registred_address","placeholder" =>'Address',"required"=>'required'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Telephone<sup class="text-danger">*</sup></label>
                                    
                                    {{Form::text("registred_telephone", $value =(!empty($arrGeneral['registred_telephone'])) ?$arrGeneral['registred_telephone'] : old("registred_telephone") , array("class" => "form-control  ", "id"=>"registred_telephone","minlength"=>"10","maxlength"=>"25","placeholder" =>'Telephone',"required"=>'required'))}}
                                </div>
                            </div>
                        </div>
                        
                        <!-- end pagination   -->
                        <!-- contact no and contact email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Fax<sup class="text-danger">*</sup></label>
                                    
                                    {{Form::text("registred_fax", $value =(!empty($arrGeneral['registred_fax'])) ?$arrGeneral['registred_fax'] : old("registred_fax") , array("class" => "form-control  ", "id"=>"registred_fax","minlength"=>"10","maxlength"=>"30","placeholder" =>'Fax'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email<sup class="text-danger">*</sup></label>
                                    {{Form::email("registred_mail", $value =(!empty($arrGeneral['registred_mail'])) ?$arrGeneral['registred_mail'] : old("registred_mail") , array("class" => "form-control ", "id"=>"registred_mail","placeholder" =>'Mail'))}}
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
                                    
                                    {{Form::text("service_address", $value =(!empty($arrGeneral['service_address'])) ?$arrGeneral['service_address'] : old("service_address") , array("class" => "form-control  ", "id"=>"service_address","placeholder" =>'Address',"required"=>'required'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Telephone<sup class="text-danger">*</sup></label>
                                    
                                    {{Form::text("service_telephone", $value =(!empty($arrGeneral['service_telephone'])) ?$arrGeneral['service_telephone'] : old("service_telephone") , array("class" => "form-control  ", "id"=>"service_telephone","minlength"=>"10","maxlength"=>"25","placeholder" =>'Telephone',"required"=>'required'))}}
                                </div>
                            </div>
                        </div>
                        
                        <!-- end pagination   -->
                        <!-- contact no and contact email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Fax<sup class="text-danger">*</sup></label>
                                    
                                    {{Form::text("service_fax", $value =(!empty($arrGeneral['service_fax'])) ?$arrGeneral['service_fax'] : old("service_fax") , array("class" => "form-control  ", "id"=>"service_fax","minlength"=>"10","maxlength"=>"30","placeholder" =>'Fax'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email<sup class="text-danger">*</sup></label>
                                    {{Form::email("service_mail", $value =(!empty($arrGeneral['service_mail'])) ?$arrGeneral['service_mail'] : old("service_mail") , array("class" => "form-control ", "id"=>"service_mail","placeholder" =>'Mail'))}}
                                </div>
                            </div>
                        </div>
                        <!--end contact no and contact email -->
                    </div>
                    <div class="form-actions">
                        {!! Form::submit( 'Save', ['class' => 'btn btn-info save-btn']) !!}
                        <a href="{{url('/admin/')}}" class="cancel-btn">Cancel</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-script')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script>
jQuery(document).ready(function ($) {
    
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
                required  : "{{trans('label.please_enter')}} {{trans('label.pagination_rows')}}",
                maxlength : "{{trans('label.pagination_rows')}} {{trans('label.must_contain_less_than')}} {0} {{trans('label.digits')}}",
            },
            contact_no : {
                maxlength : "{{trans('label.contact_no')}} {{trans('label.must_contain')}} {0} {{trans('label.digits')}}",
                minlength : "{{trans('label.contact_no')}} {{trans('label.must_contain')}} {0} {{trans('label.digits')}}"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
  
});
</script>
@endsection