@extends('index')

@section('title')
    Edit Destination
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
            <p class="alert {{ Session::get('alert-class', 'alert-info1') }}">{{ Session::get('message') }}</p>
        @endif
            <div class="block-header">
                <h2>Edit Testimonial</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                                @lang('app.add-new-testimonial')
                            </h2>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('add-testimonial.update',$testimonial->id) }}" enctype="multipart/form-data">
                               <input type="hidden" name="_method" value="PUT">
                               {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Testimonial Person Name <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}" data-parsley-errors-container="#checkbox-errors" required placeholder="Enter Testimonial Person Name">
                                            </div>
                                            @if ($errors->has('name'))
                                                <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                            @endif
                                        </div>
                                          <div id="checkbox-errors"  class="error"></div>

                                        <label class="form-label">Description <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="_method" type="hidden" value="PUT">
                                                <textarea class="form-control" rows="4" name="description"  placeholder="Enter Destination Description" data-parsley-errors-container="#checkbox-error_des" required>{{ $testimonial->description }}</textarea>
                                        
                                            </div>
                                            @if ($errors->has('description'))
                                                <label id="name-error" class="error" for="description">{{ $errors->first('description') }}</label>
                                            @endif
                                        </div>
                                        <div id="checkbox-error_des" class="error"></div>

                                        <label class="form-label">Cover Image</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <img src="{{url('')}}/images/testimonial-covers/{{$testimonial->cover_image}}" width="150px" height="150px" />
                                                <input type="file" class="form-control" name="cover_image"  placeholder="Choose Cover Image">
                                            </div>
                                            @if ($errors->has('cover_image'))
                                                <label id="name-error" class="error" for="cover_image">{{ $errors->first('cover_image') }}</label>
                                            @endif
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
@endsection

@section('extra-script')
    {{Html::script('bsbmd/plugins/autosize/autosize.js')}}
    {{Html::script('bsbmd/plugins/momentjs/moment.js')}}
    {{Html::script('bsbmd/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}
    {{Html::script('bsbmd/js/pages/forms/basic-form-elements.js')}}
    {{Html::script('bsbmd/plugins/jquery-validation/jquery.validate.js')}}
    {{Html::script('bsbmd/plugins/jquery-steps/jquery.steps.js')}}
    {{Html::script('bsbmd/plugins/sweetalert/sweetalert.min.js')}}
    <!-- {{Html::script('bsbmd/js/pages/forms/form-validation.js')}} -->

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
