@extends('index')

@section('title')
    Contact Enquiries
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

     <!-- JQuery DataTable Css -->
    {{ Html::style('bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}

@endsection
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@section('content')
        <div class="container-fluid">
            <div class="block-header">
                <h2>Contact Enquiries</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>Contact Enquiries</h2>
                            <ul class="header-dropdown m-r--5">
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="display nowrap table table-bordered table-striped table-hover dataTable js-exportable" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (count($contact_enquireis) > 0)
                                        	@foreach($contact_enquireis as $key => $row)
                                                <tr>
                                                    @if($row->read == 0)
                                                        <td><b>{{ $key + 1 }}</b></td>
                                                        <td><b>{{ $row->name }} </b></td>
                                                        <td><b>{{ $row->email }}</b> </td>
                                                        <td><b>{{ $row->subject }}</b> </td>
                                                        <td>
                                                            <a href="/admin/general_mark/read/{{$row->id}}" class="btn btn-success waves-effect" type="submit"><i class="far fa-eye"></i></a>
                                                            <a href="/admin/general_mark/delete/{{$row->id}}" class="btn btn-dangerwaves-effect" type="submit"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    @else
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $row->name }} </td>
                                                        <td>{{ $row->email }} </td>
                                                        <td>{{ $row->subject }} </td>
                                                        <td>
                                                            <a href="/admin/general_mark/read/{{$row->id}}" class="btn btn-success waves-effect" type="submit"><i class="far fa-eye"></i></a>
                                                            <a href="/admin/general_mark/delete/{{$row->id}}" class="btn btn-danger waves-effect" type="submit"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Jquery DataTable Plugin Js -->
    {{Html::script('bsbmd/plugins/jquery-datatable/jquery.dataTables.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/jszip.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}
    {{Html::script('bsbmd/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}
    {{Html::script('bsbmd/js/pages/tables/jquery-datatable.js') }}
@endsection
