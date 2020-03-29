@extends('index')

@section('title')
    Edit FAQ
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
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@section('content')
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit FAQ</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                                Edit FAQ
                            </h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{ route('add-faq.update',$faq->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="form-label">Question <span class="req_field">*</span></label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="question" value="{{$faq->question}}" required placeholder="Enter Question">
                                            </div>
                                            @if ($errors->has('question'))
                                                <label id="name-error" class="error" for="question">{{ $errors->first('question') }}</label>
                                            @endif
                                        </div>
                                        @php
                                            $language_title = json_decode($language_line);
                                        @endphp
                                        <label class="form-label">Question In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="question_italian" value="@if(\Lang::has('faq.faq_question_'.$faq->id)) {{$language_title->text->it}} @endif"  placeholder="Question In Italian">
                                            </div>
                                            @if ($errors->has('question_italian'))
                                                <label id="name-error" class="error" for="question_italian">{{ $errors->first('question_italian') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Question In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="question_german" value="@if(\Lang::has('faq.faq_question_'.$faq->id)) {{$language_title->text->de}} @endif"  placeholder="Question  In German">
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="question_german">{{ $errors->first('question_german') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Answer <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                               <textarea rows="2" class="form-control" name="answer"  required placeholder="Enter Answer">{{$faq->answer}}</textarea>
                                            </div>
                                            @if ($errors->has('answer'))
                                                <label id="name-error" class="error" for="answer">{{ $errors->first('answer') }}</label>
                                            @endif
                                        </div>
                                        @php
                                            $language_ans = json_decode($language_line_title);
                                        @endphp
                                        <label class="form-label">Answer In Italian</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="answer_italian" placeholder="Answer In Italian">{{(\Lang::has('faq.faq_answer_'.$faq->id)) ? $language_ans->text->it:''}}</textarea>
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="answer_italian">{{ $errors->first('answer_italian') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Answer In German</label>
                                        <div class="form-group ">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="answer_german" placeholder="Answer  In German">{{(\Lang::has('faq.faq_answer_'.$faq->id)) ? $language_ans->text->de:''}}</textarea
>
                                            </div>
                                            @if ($errors->has('name_italian'))
                                                <label id="name-error" class="error" for="answer_german">{{ $errors->first('answer_german') }}</label>
                                            @endif
                                        </div>
                                        <label class="form-label">Priority <span class="req_field">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="priority" value="{{$faq->priority}}" required>
                                            </div>
                                            @if ($errors->has('priority'))
                                                <label id="name-error" class="error" for="priority">{{ $errors->first('answer') }}</label>
                                            @endif
                                        </div>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" style="text-align: left;">
                                                    <input type="checkbox" name="is_agent" class="filled-in" value="1"  id="ig_checkbox" @if($faq->is_agent == 1) {{'checked'}}@endif>
                                                    <label for="ig_checkbox" >Is Agent?</label>
                                            </span>
                                            @if ($errors->has('is_agent'))
                                                <label id="name-error" class="error" for="is_agent">{{ $errors->first('is_agent') }}</label>
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
    {{Html::script('bsbmd/js/pages/forms/form-validation.js')}}
@endsection
