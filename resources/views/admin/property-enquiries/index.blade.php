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
      <!-- JQuery sweetalert Css -->
     {{ Html::style('/css/sweetalert.css') }}

@endsection
@section('content')
        <div class="container-fluid">
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
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
                                            <th>PropertyId</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>address</th>
                                            <th>message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>PropertyId</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>address</th>
                                            <th>message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (count($property_enquiries) > 0)
                                        	@foreach($property_enquiries as $key => $row)
                                                <tr>
                                                    @if($row->read == 0)
                                                        <td><b>{{ $key + 1 }}</b></td>
                                                        <td><b>{{ $row->property_id }} </b></td>
                                                        <td><b>{{ $row->name }} </b></td>
                                                        <td><b>{{ $row->email }}</b> </td>
                                                        <td><b>{{ $row->phone }} </b></td>
                                                        <td><b>{{ $row->address }}</b></td>
                                                        <td><b>{{ $row->message }}</b></td>
                                                        <td>
                                                            <a href="{{url('')}}/admin/properties_index/read/{{$row->id}}" class="btn btn-success  waves-effect" type="submit"><i class="far fa-eye"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-danger waves-effect delete_form_{{$row->id}}" id="delete_form" onclick="delete_record('{{$row->id}}')" type="button"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    @else
                                                         <td><b>{{ $key + 1 }}</b></td>
                                                        <td><b>{{ $row->property_id }} </b></td>
                                                        <td><b>{{ $row->name }} </b></td>
                                                        <td><b>{{ $row->email }}</b> </td>
                                                        <td><b>{{ $row->phone }} </b></td>
                                                        <td><b>{{ $row->address }}</b></td>
                                                        <td><b>{{ $row->message }}</b></td>
                                                        <td>
                                                            <a href="{{url('')}}/admin/properties_index/read/{{$row->id}}" class="btn btn-success waves-effect" type="submit"><i class="far fa-eye"></i></a>
                                                            <a href="javascript:void(0);" id="delete_form" class="btn btn-danger  waves-effect delete_form_{{$row->id}}"  onclick="delete_record('{{$row->id}}')" type="button"><i class="far fa-trash-alt"></i></a>
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
      <!-- Jquery Sweetalert  Js -->
    {{Html::script('js/sweetalert.min.js')}}

    <script type="text/javascript">
    $(document).ready(function(){
        if($('.alert').length){
            $('.alert').fadeOut(4000);
        }
    });


    function delete_record(id){
        swal({
              title: "Are you sure?",
              text: "Your will not be able to Recover this Contact Enquiry Details!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
          },
          function(confirmButtonText){
                if (confirmButtonText) {
                    window.location ='{{url('')}}/admin/properties_index/delete/'+id;
                }   
        });
    }
</script>
@endsection
