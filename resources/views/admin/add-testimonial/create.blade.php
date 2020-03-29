@extends('index')

@section('title')
    Add Destinition
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
<style type="text/css">
    .error {
        color: red;
        margin-top: 5px;
    }
    .form-group  {
        margin-bottom: 0;
    }
    .form-label {
        margin-top: 6px;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid">
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
        <div class="block-header">
            <h2>Testimonial</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>
                            Add New Testimonial
                        </h2>

                    </div>
                    <div class="body">
                        <form method="POST" action="{{ route('add-testimonial.store') }}"  id='testimonial_form' enctype="multipart/form-data" data-parsley-validate="">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="form-label">Testimonial Person Name <span class="req_field">*</span></label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" data-parsley-errors-container="#checkbox-errors" required placeholder="Enter Testimonial Person Name">
                                        </div>
                                    </div>
                                        @if ($errors->has('name'))
                                            <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                        @endif
                                     <div id="checkbox-errors"  class="error"></div>

                                    <label class="form-label">Description <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="description" data-parsley-errors-container="#checkbox-error_des" required placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                        @if ($errors->has('description'))
                                            <label id="name-error" class="error" for="description">{{ $errors->first('description') }}</label>
                                        @endif
                                     <div id="checkbox-error_des" class="error"></div>

                                    <label class="form-label">Cover Image <span class="req_field">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" name="cover_image" data-parsley-fileextension='jpg,jpeg,png' data-parsley-errors-container="#checkbox-error_img" required="" placeholder="Choose Cover Image">
                                        </div>
                                    </div>
                                        @if ($errors->has('cover_image'))
                                            <label id="name-error" class="error" for="cover_image">{{ $errors->first('cover_image') }}</label>
                                        @endif
                                     <div id="checkbox-error_img"  class="error"></div>

                                </div>
                            </div>

                            <button class="btn btn-primary waves-effect" type="submit">ADD</button>
                            <button class="btn btn-info1" type="button" onclick="window.history.back();">BACK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->

    </div>
@endsection

@section('extra-script')
    {{Html::script('bsbmd/plugins/autosize/autosize.js')}}
    {{Html::script('bsbmd/plugins/momentjs/moment.js')}}
    {{Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}
    {{Html::script('bsbmd/js/pages/forms/basic-form-elements.js')}}
    {{Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')}}
    {{Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')}}
    {{Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')}}
 <!--    {{Html::script('bsbmd/js/pages/forms/form-validation.js')}} -->

 {{Html::script('/js/parsley.min.js')}}

<script type="text/javascript">

   $(function(){

        window.ParsleyValidator
        .addValidator('fileextension', function (value, requirement) {
                var tagslistarr = requirement.split(',');
            var fileExtension = value.split('.').pop();
                        var arr=[];
                        $.each(tagslistarr,function(i,val){
                         arr.push(val);
                        });
            if(jQuery.inArray(fileExtension, arr)!='-1') {
              console.log("is in array");
              return true;
            } else {
              console.log("is NOT in array");
              return false;
            }
        }, 32)
        .addMessage('en', 'fileextension', 'The extension doesn\'t match the required');
  
     $('#testimonial_form').parsley();
});
 

</script>
@endsection
