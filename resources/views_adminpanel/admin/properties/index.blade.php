@extends('index')

@section('title')
    Properties
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
    {{ Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    {{ Html::style('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css')}}
    {{ Html::style('bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}
         <!-- JQuery sweetalert Css -->
     {{ Html::style('/css/sweetalert.css') }}

@endsection
@section('content')
        <div class="container-fluid">
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            <div class="block-header">
                <h2>Properties</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>All Properties</h2>
                            <a href="{{route('properties.create')}}" class="btn btn-info m-t-15 waves-effect">Add New</a>
                            <ul class="header-dropdown m-r--5">
                                <form action="{{url('')}}/admin/properties" id="form_avail_type">
                                    {{csrf_field()}}
                                    <select class="selectpicker" name="avail_type" id="avail_type" onchange="this.form.submit()">
                                         <option value=''>-- Sort By --</option>
                                         <option value='A' @if($type == "") {{ 'selected' }}  @endif>All Properties</option>
                                         <option value='Y' @if($type == "Y") {{ 'selected' }}  @endif>Available</option>
                                         <option value='S' @if($type == "S") {{ 'selected' }}  @endif>Sold/Moved</option>
                                     
                                    </select>
                                  
                                </form>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="display nowrap table table-bordered table-striped table-hover dataTable js-exportable" id="example" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Property ID</th>
                                            <th>Property Added On</th>
                                            <th>Property Name</th>
                                            <th>Property Description</th>
                                            <th>Availability</th>
                                            <th>Agency Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Property ID</th>
                                            <th>Property Added On</th>
                                            <th>Property Name</th>
                                            <th>Property Description</th>
                                            <th>Availability</th>
                                            <th>Agency Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (count($properties) > 0)
                                        	@foreach($properties as $key => $row)
                                            <tr>
                                            	<td>{{ $key + 1 }}</td>
                                                <td class="table-prev-img"><img src={{asset("images/cover-images/" . $row->cover_image_name)}} width="150px" height="100px"/></td>
                                                <td>{{ $row->property_sequence_id }} </td>
                                                <td>{{ date('d-m-Y',strtotime($row->created_at)) }} </td>
                                                <td>{{ $row->name }} </td>
                                                <td class="property-des-txt">{{ $row->short_description }} </td>
                                                <td>{{ $row->availability == 'Y' ? 'Available' : 'Sold / Moved'}} </td>
                                                @if(is_null($row->agent_id))
                                                    <td>{{'N/A'}}</td>
                                                @else
                                                    <td>{{(new \App\Services\PropertyService)->getAgent($row->agent_id)}}</td>
                                                @endif

                                            	<td>
                                            	    <a href="{{route('properties.edit',$row->id)}}" class="btn btn-warning waves-effect"><i class="far fa-edit"></i></a>
                                                    <form class="display-inline delete_form_{{$row->id}}" id="delete_form" method="POST" action="{{ route('properties.destroy',$row->id) }}">
    					                   {{ csrf_field() }}
    					                   <input name="_method" type="hidden" value="DELETE">
    					                   <button class="btn btn-danger waves-effect"  onclick="delete_record('{{$row->id}}')" type="button"><i class="far fa-trash-alt"></i></button>
    					            </form>
                                            	</td>
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
    {{Html::script('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js')}}
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
     {{Html::script('js/sweetAlert.js')}}
     <script>
         $(document).ready(function(){
            if($('.alert').length) {
                $('.alert').fadeOut(4000);
            }
         });
     </script>
    
@endsection
