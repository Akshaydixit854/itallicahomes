@extends('index')

@section('title')
    Testimonials
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
    {{ Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') }}
    {{ Html::style('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css') }}
    {{ Html::style('bsbmd/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}

      <!-- JQuery sweetalert Css -->
     {{ Html::style('/css/sweetalert.css') }}

@endsection
@section('content')
        <div class="container-fluid">
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@if(Session::has('Error'))
    <p class="alert alert-danger">{{ Session::get('Error') }}</p>
@endif
      
            <div class="block-header">
                <h2>Testimonials</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>Testimonials</h2>
                            <a href="{{route('add-testimonial.create')}}" class="btn btn-info m-t-15 waves-effect">Add New</a>
                            <ul class="header-dropdown m-r--5">

                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="display table table-bordered table-striped table-hover dataTable js-exportable" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Cover Image</th>
                                            <th>Testimonial Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Cover Image</th>
                                            <th>Testimonial Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (count($testimonials) > 0)
                                        	@foreach($testimonials as $row)
                                            <tr>
                                            	<td>{{ $row->id }}</td>
                                                <td class="table-prev-img"><a target="_blank" href="{{url('')}}/images/testimonial-covers/{{$row->cover_image}}"> <img  src="{{url('')}}/images/testimonial-covers/{{$row->cover_image}}" /></td></td>
                                                <td class="table-tit">{{ $row->name }} </td>
                                                <td class="table-des">{{ $row->description }} </td>
                                            	<td>
                                            		<a href="{{route('add-testimonial.edit',$row->id)}}" class="btn btn-warning waves-effect"><i class="far fa-edit"></i></a>
                                                        <form id="delete_form" class="display-inline delete_form_{{$row->id}}" method="POST" action="{{ route('add-testimonial.destroy',$row->id) }}" >
    					                            	{{ csrf_field() }}
    					                            	<input name="_method" type="hidden" value="DELETE">
    					                                <button class="btn btn-danger waves-effect" type="button" onclick="delete_record('{{$row->id}}')"><i class="far fa-trash-alt"></i></button>
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

    <script type="text/javascript">
    $(document).ready(function(){
        if($('.alert').length){
            $('.alert').fadeOut(4000);
        }
    });


    function delete_record(id){
        swal({
              title: "Are you sure?",
              text: "Your will not be able to Recover this Testimonial Details!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
          },
          function(confirmButtonText){
                if (confirmButtonText) {
                    $('#delete_form.delete_form_'+id).submit();
                }   
        });
    }
       
</script>


@endsection
