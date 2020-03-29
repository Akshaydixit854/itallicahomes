@extends('index')

@section('title')
    @lang('new-property')
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
            <h2>Properties</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-pink">
                        <h2>Create Property</h2>
                    </div>
                    @php
                        $uniq_id = uniqid();
                    @endphp
                    <div class="body">
                        <form id="form_validation"  method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="form-label">Property Name</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" id="property_name" placeholder="Enter property name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Property Name In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="property_name_italian" name="name_italian"  placeholder="Enter property name in Italy">
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Property Name In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="property_name_german" name="name_german"  placeholder="Enter property name in German">
                                        </div>
                                        @if ($errors->has('name_italian'))
                                            <label id="name-error" class="error" for="name_italian">{{ $errors->first('name_italian') }}</label>
                                        @endif
                                    </div>

                                    <div class="row">
                                         <div class=col-sm-4>
                                              <label class="form-label">Property ID</label>
                                              <div class="form-group ">
                                                  <div class="form-line">
                                                      <input type="text" class="form-control" id="property_id" value="{{isset($sequence) ? $sequence : ''}}" name="property_id" required placeholder="Enter a Property ID" readonly>
                                                  </div>
                                                  @if ($errors->has('property_id'))
                                                      <label id="property-id-error" class="error" for="property_id">{{ $errors->first('property_id') }}</label>
                                                  @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-4>
                                              <label class="form-label"></label>
                                              <div class="form-group">
                                                    <div class="form-line">
                                                       <input type="text" class="form-control" name="property_sequence_id" id="property_sequence_id" placeholder="Enter a Property ID">
                                                    </div>
                                                   @if ($errors->has('property_sequence_id'))
                                                       <label id="property-id-error" class="error" for="property_sequence_id">{{ $errors->first('property_sequence_id') }}</label>
                                                   @endif
                                               </div>
                                         </div>
                                         <div class="col-sm-4">
                                               <label class="form-label">Price</label>
                                               <div class="form-group ">
                                                    <div class="form-line">
                                                         <input type="text" class="form-control" name="price" id="price" placeholder="Enter Actual Property Price">
                                                    </div>
                                                    @if ($errors->has('price'))
                                                        <label id="name-error" class="error" for="price">{{ $errors->first('price') }}</label>
                                                    @endif
                                              </div>
                                         </div>
                                    </div>

                                    <label class="form-label">Short Description</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description"></textarea>
                                        </div>
                                        @if ($errors->has('short_description'))
                                            <label id="name-error" class="error" for="short_description">{{ $errors->first('short_description') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Short Description In Italy</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" id="short_description_italian" name="italian_short_description"  placeholder="Enter property short description in Italy"></textarea>
                                        </div>
                                        @if ($errors->has('italian_short_description'))
                                            <label id="name-error" class="error" for="italian_short_description">{{ $errors->first('italian_short_description') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Short Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control" id="short_description_german" name="german_short_description"  placeholder="Enter property short description in German"></textarea>
                                        </div>
                                        @if ($errors->has('german_short_description'))
                                            <label id="name-error" class="error" for="german_short_description">{{ $errors->first('german_short_description') }}</label>
                                        @endif
                                    </div>

                                    <label class="form-label">Detail Description</label>
                                    <div class="form-group ">
                                            <textarea id="ckeditor" class="detailed_description"  name="detail_description" ></textarea>
                                        @if ($errors->has('detail_description'))
                                            <label id="name-error" class="error" for="detail_description">{{ $errors->first('detail_description') }}</label>
                                        @endif
                                    </div>
                                    <label class="form-label">Description In Italian</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea id="ckeditor2" name="italian"></textarea>
                                        </div>
                                    </div>
                                    <label class="form-label">Description In German</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <textarea id="ckeditor3" name="german"></textarea>
                                        </div>

                                    </div>
                                    <div style="margin-bottom: 20px;">
                                         <label class="form-label">Property Image Gallery</label>
                                         <div class="form-group ">
                                             <div class="dropzone clsbox" id="mydropzone"></div>
                                             <input type="hidden" value="{{$uniq_id}}" id="gallery_token" name="gallery_token">
                                         </div>
                                         <span class="img-alert-list"><li>1)Max file size allowed is 2MB </li><li>2)Max file allowed is 20</li></span>
                                    </div>

                                    <div class="row" >
                                         <div class=col-sm-2>
                                              <label class="form-label">Beds</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="0" id="property_beds" name="beds" required placeholder="Enter No. of Beds">
                                                   </div>
                                                   @if ($errors->has('beds'))
                                                        <label id="name-error" class="error" for="beds">{{ $errors->first('beds') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                             <label class="form-label">Baths</label>
                                             <div class="form-group ">
                                                  <div class="form-line">
                                                       <input type="text" class="form-control" value="0" id="property_baths" name="baths" required placeholder="Enter No. of Baths">
                                                  </div>
                                                 @if ($errors->has('baths'))
                                                    <label id="name-error" class="error" for="baths">{{ $errors->first('baths') }}</label>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Kitchen</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="0" id="property_kitchen" name="kitchens"  placeholder="Enter No. of Beds">
                                                   </div>
                                                   @if ($errors->has('beds'))
                                                        <label id="name-error" class="error" for="beds">{{ $errors->first('beds') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Parking</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="0" name="parking" id="property_parking" placeholder="Parking">
                                                   </div>
                                                   @if ($errors->has('parking'))
                                                       <label id="name-error" class="error" for="parking">{{ $errors->first('parking') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Fireplace</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="0" name="fireplace" id="property_fire_place">
                                                   </div>
                                                   @if ($errors->has('beds'))
                                                        <label id="name-error" class="error" for="beds">{{ $errors->first('beds') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-2>
                                              <label class="form-label">Terrace</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" value="0" name="terrace" id="property_terrace">
                                                   </div>
                                                   @if ($errors->has('terrace'))
                                                        <label id="name-error" class="error" for="terrace">{{ $errors->first('terrace') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Interior</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" name="plot_size" id="plot_size" placeholder="Enter Interior Size">
                                                   </div>
                                                   @if ($errors->has('plot_size'))
                                                       <label id="name-error" class="error" for="plot_size">{{ $errors->first('plot_size') }}</label>
                                                   @endif
                                               </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Living Area</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" name="living_area" id="living_area" placeholder="Enter Living Area Size">
                                                   </div>
                                                   @if ($errors->has('living_area'))
                                                       <label id="name-error" class="error" for="living_area">{{ $errors->first('living_area') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Latitude</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <input type="text" class="form-control" name="property_location_latitude" id="latitude" placeholder="Enter Latitude Coordinates">
                                                   </div>
                                                   @if ($errors->has('property_location_latitude'))
                                                       <label id="name-error" class="error" for="property_location_latitude">{{ $errors->first('property_location_latitude') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Longitude</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" name="property_location_longitude" id="longitude" placeholder="Enter Longitude Coordinates">
                                                   </div>
                                                   @if ($errors->has('property_location_longitude'))
                                                       <label id="name-error" class="error" for="property_location_longitude">{{ $errors->first('property_location_longitude') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Offer Type</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="offer" name="offer_id" required>
                                                            @foreach($offers as $offer)
                                                                <option value={{$offer->id}}>{{$offer->offer_name}}</option>
                                                            @endforeach
                                                         </select>
                                                   </div>
                                                   @if ($errors->has('type_id'))
                                                       <label id="name-error" class="error" for="offer_id">{{ $errors->first('type_id') }}</label>
                                                   @endif
                                               </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Property Type</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="type_id" name="type_id" required>
                                                            @foreach($types as $type)
                                                                <option value={{$type->id}}>{{$type->type_name}}</option>
                                                            @endforeach
                                                        </select>
                                                   </div>
                                                   @if ($errors->has('type_id'))
                                                       <label id="name-error" class="error" for="type_id">{{ $errors->first('type_id') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Property Condition</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="condition" name="condition_id" required>
                                                            @foreach($conditions as $condition)
                                                                <option value={{$condition->id}}>{{$condition->condition_display_name}}</option>
                                                            @endforeach
                                                        </select>
                                                   </div>
                                                   @if ($errors->has('type_id'))
                                                       <label id="name-error" class="error" for="condition_id">{{ $errors->first('type_id') }}</label>
                                                   @endif
                                               </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Region</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <select class="form-control" name="region_id" id="region" required>
                                                           @foreach($regions as $region)
                                                               <option value={{$region->id}}>{{$region->region_name}}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                    @if ($errors->has('region_id'))
                                                        <label id="name-error" class="error" for="region_id">{{ $errors->first('region_id') }}</label>
                                                    @endif
                                               </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Location</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                       <select class="form-control" id="area" name="area_id">
                                                           @foreach($areas as $area)
                                                               <option value={{$area->id}}>{{$area->area_name}}</option>
                                                           @endforeach
                                                       </select>
                                                  </div>
                                                 @if ($errors->has('area_id'))
                                                     <label id="name-error" class="error" for="area_id">{{ $errors->first('area_id') }}</label>
                                                 @endif
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Vat</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" name="vat" id="vat" placeholder="Enter Vat Amount" value="{{$settings->default_vat}}">
                                                   </div>
                                                   @if ($errors->has('vat'))
                                                       <label id="name-error" class="error" for="vat">{{ $errors->first('vat') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Special Offer Price</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="text" class="form-control" name="price_upon_request" id="price_upon_request" placeholder="Enter Price Up on Request">
                                                   </div>
                                                   @if ($errors->has('price_upon_request'))
                                                       <label id="name-error" class="error" for="price_upon_request">{{ $errors->first('price_upon_request') }}</label>
                                                   @endif
                                               </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Nearest Destination</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="destination" name="destination_id">
                                                            <option value=''>No Destination</option>
                                                             @foreach($destinations as $destination)
                                                                 <option value={{$destination->id}}>{{$destination->destination_name}}</option>
                                                             @endforeach
                                                        </select>
                                                   </div>
                                                   @if ($errors->has('destination_id'))
                                                       <label id="name-error" class="error" for="destination_id">{{ $errors->first('destination_id') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                         <div class=col-sm-3>
                                              <label class="form-label">Availability</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" id="availability" name="availability" required>
                                                            <option value="Y">Available</option>
                                                            <option value="S">Sold/Moved</option>
                                                        </select>
                                                  </div>
                                                  @if ($errors->has('availability'))
                                                     <label id="name-error" class="error" for="availability">{{ $errors->first('availability') }}</label>
                                                  @endif
                                              </div>
                                         </div>
                                         <div class="col-sm-3">
                                              <label class="form-label">Agencies</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <select class="form-control" name="agent_id" id="agent_id">
                                                             <option value=''>No Agency</option>
                                                              @foreach($agencies as $agency)
                                                                  <option value={{$agency->id}}>{{$agency->agent_name}}</option>
                                                              @endforeach
                                                         </select>
                                                   </div>
                                                   @if ($errors->has('destination_id'))
                                                       <label id="name-error" class="error" for="agency_id">{{ $errors->first('agency_id') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                    </div>


                                    {{-- <label class="form-label">Address</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="address" required placeholder="Enter Address">
                                        </div>
                                        @if ($errors->has('address'))
                                            <label id="name-error" class="error" for="address">{{ $errors->first('address') }}</label>
                                        @endif
                                    </div> --}}

                                    {{-- <label class="form-label">Special Price</label>
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="special_price"   placeholder="Enter Special Price">
                                        </div>
                                        @if ($errors->has('special_price'))
                                            <label id="name-error" class="error" for="special_price">{{ $errors->first('special_price') }}</label>
                                        @endif
                                    </div> --}}

                                   <div class="row">
                                        <div class="col-sm-12">
                                             <label class="form-label">Ameneties</label>
                                             <div class="input-group input-group-lg">
                                                  <span class="input-group-addon">
                                                  @foreach ($amenities as $amenity)
                                                      <div class="amen-form-group">
                                                           <input type="checkbox" name="ameneties[]" class="amenity filled-in" value="{{$amenity->id}}" id="ig_checkbox_{{$amenity->id}}">
                                                           <label for="ig_checkbox_{{$amenity->id}}" >{{$amenity['amenities_display_name']}}</label>
                                                      </div>
                                                  @endforeach
                                              </div>
                                         </div>
                                         <div class="col-sm-12">
                                              <label class="form-label">Property Cover Image</label>
                                              <div class="form-group ">
                                                   <div class="form-line">
                                                        <input type="file" id="cover_image" name="cover_image" class="form-control" />
                                                   </div>
                                                   @if ($errors->has('cover_image'))
                                                        <label id="name-error" class="error" for="cover_image">{{ $errors->first('cover_image') }}</label>
                                                   @endif
                                              </div>
                                         </div>
                                   </div>





                                    <input type="hidden" name="source" id="data-source">
                                </div>
                            </div>
                            <button id="button" class="btn btn-primary waves-effect pro-submit" type="button">SUBMIT</button>
                            <button id="preview-button" class="btn btn-primary waves-effect pro-submit" type="button">Preview(Single Property)</button>
                            <button id="preview-card-button" class="btn btn-primary waves-effect pro-submit" type="button">Preview(Property Card)</button>
                            {{-- <a href="javascript:void(0)" item={{$uniq_id}} id="preview">Preview</a> --}}
                             <button class="btn btn-info1" type="button" onclick="window.history.back();" >BACK</button>
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
    {{Html::script('bsbmd/plugins/dropzone/dropzone.js')}}
    <!-- Ckeditor -->
    {{Html::script('bsbmd/plugins/ckeditor/ckeditor.js')}}

    <script>
        //drag and drop customization
        var k = parseInt(0);
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#mydropzone", {
          url: "/admin/image_gallery/"+$('#gallery_token').val(),
          uploadMultiple: true,
          parallelUploads: 20,
          autoProcessQueue : true,
          createImageThumbnails: true,
          addRemoveLinks: true,
          maxFiles: 20,
          init: function() {
            this.on('error', function(file, errorMessage) {
              console.log(errorMessage);
            });
            this.on('addedfile', function(file) {
                $('#button').prop("disabled", true);
                if(file.size > (1024 * 1024 * 2)){ // not more than 2mb
                    this.removeFile(file);
                }
            });
            this.on('removedfile', function(file) {
                if(k > 0){
                    k -= parseInt(1);
                }
                if(k == 0){
                    $('#button').prop("disabled", true);
                }
                if(file){
                    $.ajax({
                        type: 'POST',
                        url: '/admin/delete_gallery_image',
                        data: {name: file.name,uniqid: '<?php echo $uniq_id;?>'},
                        sucess: function(data){
                           console.log('success: ' + data);
                        }
                     });
                }

            });
            this.on('success', function(file,response) {
                k+=parseInt(response);
                if(myDropzone.getAcceptedFiles().length == k){
                    $('#button').prop("disabled", false);
                }

                console.log('response:',myDropzone.getAcceptedFiles().length);
                console.log('response:',k);
            });
            this.on("maxfilesexceeded", function(file){
                this.removeFile(file);
            });
          }
        });
        $("#button").click(function (e) {
            if($('.error').length > 0){
                $('.error').remove();
            }
            var name = $('#property_name').val().trim();
            var property_id = $('#property_id').val().trim();
            var property_sequence_id = $('#property_sequence_id').val().trim();
            var short_description = $('#short_description').val().trim();
            var detail_description = CKEDITOR.instances["ckeditor"].getData();
            var property_beds = $('#property_beds').val().trim();
            var property_baths = $('#property_baths').val().trim();
            var property_kitchen = $('#property_kitchen').val().trim();
            var property_parking = $('#property_parking').val().trim();
            var property_fire_place = $('#property_fire_place').val().trim();
            var property_terrace = $('#property_terrace').val().trim();

            var plot_size = $('#plot_size').val().trim();
            var living_area = $('#living_area').val().trim();
            var latitude = $('#latitude').val().trim();
            var longitude = $('#longitude').val().trim();
            var price = $('#price').val().trim();
            var cover_image = document.getElementById("cover_image").files.length;
            var vat = $('#vat').val().trim();
            //var price_upon_request = $('#price_upon_request').val().trim();

            if(name == '' || property_id == '' || property_sequence_id == '' || detail_description == '' || property_beds == '' || short_description == ''
            || property_baths == '' || property_kitchen == '' || property_parking == '' || property_fire_place == '' || property_terrace == ''
            || plot_size == '' || living_area == '' || latitude == '' || longitude == '' || price == '' || vat == '' || isNaN(property_beds)
            || isNaN(property_baths) || isNaN(property_kitchen) || isNaN(property_parking) || isNaN(property_fire_place) || isNaN(property_terrace)
            || isNaN(plot_size) || isNaN(living_area) || isNaN(latitude) || isNaN(longitude) || isNaN(price) || isNaN(vat) || cover_image <= 0)
            {
                if(name == ''){
                    //console.log('1');
                    $('#property_name').after('<p class="error">Required</p>');
                }
                if(property_id == ''){
                    //console.log('2');
                    $('#property_id').after('<p class="error">Required</p>');
                }
                if(property_sequence_id == ''){
                    //console.log('3');
                    $('#property_sequence_id').after('<p class="error">Required</p>');
                }
                if(detail_description == ''){
                    //console.log('4');
                    $('#ckeditor').after('<p class="error">Required</p>');
                }
                if(short_description == ''){
                    //console.log('5');
                    $('#short_description').after('<p class="error">Required</p>');
                }
                if(property_beds == ''){
                    //console.log('6');
                    $('#property_beds').after('<p class="error">Required</p>');
                }
                if(property_baths == ''){
                    //console.log('7');
                    $('#property_baths').after('<p class="error">Required</p>');
                }
                if(property_kitchen == ''){
                    //console.log('8');
                    $('#property_kitchen').after('<p class="error">Required</p>');
                }

                if(property_parking == ''){
                    //console.log('9');
                    $('#property_parking').after('<p class="error">Required</p>');
                }
                if(property_fire_place == ''){
                    //console.log('10');
                    $('#property_fire_place').after('<p class="error">Required</p>');
                }
                if(property_terrace == ''){
                    //console.log('11');
                    $('#property_terrace').after('<p class="error">Required</p>');
                }
                if(plot_size == ''){
                    //console.log('12');
                    $('#plot_size').after('<p class="error">Required</p>');
                }
                if(living_area == ''){
                    //console.log('13');
                    $('#living_area').after('<p class="error">Required</p>');
                }
                if(latitude == ''){
                    //console.log('14');
                    $('#latitude').after('<p class="error">Required</p>');
                }
                if(longitude == ''){
                    //console.log('15');
                    $('#longitude').after('<p class="error">Required</p>');
                }
                if(price == ''){
                    //console.log('16');
                    $('#price').after('<p class="error">Required</p>');
                }
                if(vat == ''){
                    //console.log('17');
                    $('#vat').after('<p class="error">Required</p>');
                }
                if(cover_image <= 0){
                    $('#cover_image').after('<p class="error">Required</p>');
                }
                // if(price_upon_request == ''){
                //     $('#price_upon_request').after('<p class="error">Required</p>');
                // }
                //numeric
                if(price != '' && isNaN(price)){
                    //console.log('18');
                    $('#price').after('<p class="error">Invalid Price</p>');
                }
                // if(price_upon_request != '' && isNaN(price_upon_request)){
                //     $('#price_upon_request').after('<p class="error">Invalid Price</p>');
                // }
                if(latitude != '' && isNaN(latitude)){
                    //console.log('19');
                    $('#latitude').after('<p class="error">Invalid Latitude</p>');
                }
                if(longitude != '' && isNaN(longitude)){
                    //console.log('20');
                    $('#longitude').after('<p class="error">Invalid Longitude</p>');
                }
                if(plot_size != '' && isNaN(plot_size)){
                    //console.log('21');
                    $('#plot_size').after('<p class="error">Invalid Plot Size</p>');
                }
                if(living_area != '' && isNaN(living_area)){
                    //console.log('22');
                    $('#living_area').after('<p class="error">Invalid Living Area</p>');
                }
                if(vat != '' && isNaN(vat)){
                    //console.log('18');
                    $('#vat').after('<p class="error">Invalid Vat</p>');
                }

                if(property_beds != '' && isNaN(property_beds)){
                    //console.log('23');
                    $('#property_beds').after('<p class="error">Invalid Bed</p>');
                }
                if(property_baths != '' && isNaN(property_baths)){
                    //console.log('24');
                    $('#property_baths').after('<p class="error">Invalid Baths</p>');
                }
                if(property_kitchen != '' && isNaN(property_kitchen)){
                    //console.log('25');
                    $('#property_kitchen').after('<p class="error">Invalid Kitchen</p>');
                }

                if(property_parking != '' && isNaN(property_parking)){
                    //console.log('26');
                    $('#property_parking').after('<p class="error">Invalid Parking</p>');
                }
                if(property_fire_place != '' && isNaN(property_fire_place)){
                    //console.log('27');
                    $('#property_fire_place').after('<p class="error">Invalid Fire Place</p>');
                }
                if(property_terrace != '' && isNaN(property_terrace)){
                    //console.log('28');
                    $('#property_terrace').after('<p class="error">Invalid Terrace</p>');
                }
                //console.log('am out');
                return false;
            }
            //return false;
            $('#form_validation').submit();
        });

        $("#preview-button").click(function(){
            var name = $('#property_name').val().trim();
            var name_italian = $('#property_name_italian').val().trim();
            var name_german = $('#property_name_german').val().trim();

            var property_id = $('#property_id').val().trim();
            var property_sequence_id = $('#property_sequence_id').val().trim();

            var short_description = $('#short_description').val().trim();
            var short_description_in_italian = $('#short_description_italian').val().trim();
            var short_description_in_german = $('#short_description_german').val().trim();
            var italian_short_description = $('#short_description_italian').val().trim();
            var german_short_description = $('#short_description_german').val().trim();

            var detail_description = CKEDITOR.instances["ckeditor"].getData();

            var detail_description_in_italian = CKEDITOR.instances["ckeditor2"].getData();
            var detail_description_in_german = CKEDITOR.instances["ckeditor3"].getData();

            var italian = CKEDITOR.instances["ckeditor2"].getData();
            var german = CKEDITOR.instances["ckeditor3"].getData();

            var property_beds = $('#property_beds').val().trim();
            var property_baths = $('#property_baths').val().trim();
            var property_kitchen = $('#property_kitchen').val().trim();
            var property_parking = $('#property_parking').val().trim();
            var property_fire_place = $('#property_fire_place').val().trim();
            var property_terrace = $('#property_terrace').val().trim();

            var plot_size = $('#plot_size').val().trim();
            var living_area = $('#living_area').val().trim();

            var availability = $('#availability').val().trim();
            var latitude = $('#latitude').val().trim();
            var longitude = $('#longitude').val().trim();
            var area_id = $('#area').val().trim();
            var region_id = $('#region').val().trim();

            var type_id = $('#type_id').val().trim();
            var condition_id = $('#condition').val().trim();
            var offer_id = $('#offer').val().trim();

            var price = $('#price').val().trim();
            var cover_image = document.getElementById("cover_image").files;

            var image = $('#cover_image').prop("files")[0];

            var cover_image = document.getElementById("cover_image").files.length;
            var ameneties = [];
            $('.amenity').each(function(){
                if($(this).prop('checked') == true){
                    ameneties.push($(this).val());
                }
            });

            if(cover_image > 0){
                var formImage = new FormData();
                formImage.append('cover_image', image , image['name']);
            }



            var temp_id = $('#gallery_token').val();
            var vat = $('#vat').val().trim();
            var price_upon_request = $('#price_upon_request').val().trim();
            var destination_id = $('#destination').val().trim();
            var agent_id = $('#agent_id').val();



            $.ajax({
                url: '/admin/property_preview',
                data: {
                    'name' : name,
                    'name_italian' : name_italian,
                    'name_german' : name_german,
                    'name_italian' : name_italian,
                    'property_id' : property_id,
                    'property_sequence_id' : property_sequence_id,
                    'short_description' : short_description,
                    'short_description_in_italian' : italian_short_description,
                    'short_description_in_german' : german_short_description,
                    'italian_short_description' : italian_short_description,
                    'german_short_description' : german_short_description,
                    'detail_description' : detail_description,
                    'detail_description_in_italian' : detail_description_in_italian,
                    'detail_description_in_german' : detail_description_in_german,
                    'italian' : italian,
                    'german' : german,
                    'beds' : property_beds,
                    'baths' : property_baths,
                    'kitchens' : property_kitchen,
                    'parking' : property_parking,
                    'fire_place' : property_fire_place,
                    'terrace' : property_terrace,
                    'plot_size' : plot_size,
                    'living_area' : living_area,
                    'availability' : availability,
                    'latitude' : latitude,
                    'longitude' : longitude,
                    'area_id' : area_id,
                    'region_id' : region_id,
                    'type_id' : type_id,
                    'condition_id' : condition_id,
                    'offer_id' : offer_id,
                    'price' : price,
                    //'cover_image' : cover_image,
                    'vat' : vat,
                    'price_upon_request' : price_upon_request,
                    'destination_id' : destination_id,
                    'agent_id' : agent_id,
                    'temp_id' : temp_id,
                    'ameneties' : ameneties

                },
                type: "POST",
                success: function(data){
                    if(cover_image > 0){
                        $.ajax({
                            url: '/admin/property_preview/'+temp_id,
                            processData: false,
                            dataType : "JSON",
                            contentType: false,
                            data: formImage,
                            type: "POST",
                            success: function(data){
                                var url = "<?php echo url('/admin/single_property');?>"+'/'+temp_id;
                                 window.open(url);
                            }
                       });
                   }else{
                       var url = "<?php echo url('/admin/single_property');?>"+'/'+temp_id;
                       window.open(url);
                   }

                }
          });


        });
        $('#preview-card-button').click(function(){
            var name = $('#property_name').val().trim();
            var name_italian = $('#property_name_italian').val().trim();
            var name_german = $('#property_name_german').val().trim();

            var property_id = $('#property_id').val().trim();
            var property_sequence_id = $('#property_sequence_id').val().trim();

            var short_description = $('#short_description').val().trim();
            var short_description_in_italian = $('#short_description_italian').val().trim();
            var short_description_in_german = $('#short_description_german').val().trim();
            var italian_short_description = $('#short_description_italian').val().trim();
            var german_short_description = $('#short_description_german').val().trim();

             var detail_description = CKEDITOR.instances["ckeditor"].getData();

            var detail_description_in_italian = CKEDITOR.instances["ckeditor2"].getData();
            var detail_description_in_german = CKEDITOR.instances["ckeditor3"].getData();

            var italian = CKEDITOR.instances["ckeditor2"].getData();
            var german = CKEDITOR.instances["ckeditor3"].getData();

            var property_beds = $('#property_beds').val().trim();
            var property_baths = $('#property_baths').val().trim();
            var property_kitchen = $('#property_kitchen').val().trim();
            var property_parking = $('#property_parking').val().trim();
            var property_fire_place = $('#property_fire_place').val().trim();
            var property_terrace = $('#property_terrace').val().trim();

            var plot_size = $('#plot_size').val().trim();
            var living_area = $('#living_area').val().trim();

            var availability = $('#availability').val().trim();
            var latitude = $('#latitude').val().trim();
            var longitude = $('#longitude').val().trim();
            var area_id = $('#area').val().trim();
            var region_id = $('#region').val().trim();

            var type_id = $('#type_id').val().trim();
            var condition_id = $('#condition').val().trim();
            var offer_id = $('#offer').val().trim();

            var price = $('#price').val().trim();
            var cover_image = document.getElementById("cover_image").files;

            var image = $('#cover_image').prop("files")[0];

            var cover_image = document.getElementById("cover_image").files.length;
            var ameneties = [];
            $('.amenity').each(function(){
                if($(this).prop('checked') == true){
                    ameneties.push($(this).val());
                }
            });

            if(cover_image > 0){
                var formImage = new FormData();
                formImage.append('cover_image', image , image['name']);
            }



            var temp_id = $('#gallery_token').val();
            var vat = $('#vat').val().trim();
            var price_upon_request = $('#price_upon_request').val().trim();
            var destination_id = $('#destination').val().trim();
            var agent_id = $('#agent_id').val();



            $.ajax({
                url: '/admin/property_preview',
                data: {
                    'name' : name,
                    'name_italian' : name_italian,
                    'name_german' : name_german,
                    'name_italian' : name_italian,
                    'property_id' : property_id,
                    'property_sequence_id' : property_sequence_id,
                    'short_description' : short_description,
                    'short_description_in_italian' : italian_short_description,
                    'short_description_in_german' : german_short_description,
                    'italian_short_description' : italian_short_description,
                    'german_short_description' : german_short_description,
                    'detail_description' : detail_description,
                    'detail_description_in_italian' : detail_description_in_italian,
                    'detail_description_in_german' : detail_description_in_german,
                    'italian' : italian,
                    'german' : german,
                    'beds' : property_beds,
                    'baths' : property_baths,
                    'kitchens' : property_kitchen,
                    'parking' : property_parking,
                    'fire_place' : property_fire_place,
                    'terrace' : property_terrace,
                    'plot_size' : plot_size,
                    'living_area' : living_area,
                    'availability' : availability,
                    'latitude' : latitude,
                    'longitude' : longitude,
                    'area_id' : area_id,
                    'region_id' : region_id,
                    'type_id' : type_id,
                    'condition_id' : condition_id,
                    'offer_id' : offer_id,
                    'price' : price,
                    //'cover_image' : cover_image,
                    'vat' : vat,
                    'price_upon_request' : price_upon_request,
                    'destination_id' : destination_id,
                    'agent_id' : agent_id,
                    'temp_id' : temp_id,
                    'ameneties' : ameneties

                },
                type: "POST",
                success: function(data){
                    if(cover_image > 0){
                        $.ajax({
                            url: '/admin/property_preview/'+temp_id,
                            processData: false,
                            dataType : "JSON",
                            contentType: false,
                            data: formImage,
                            type: "POST",
                            success: function(data){
                                var url = "<?php echo url('/admin/property_card');?>"+'/'+temp_id;
                                window.open(url);
                            }
                       });
                   }else{
                       var url = "<?php echo url('/admin/property_card');?>"+'/'+temp_id;
                       window.open(url);
                   }

                }
           });

        });
        // $("#preview").click(function(e){
        //     var data = $('#form_validation').serialize();

        // });
        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('ckeditor2');
            CKEDITOR.replace('ckeditor3');
            CKEDITOR.config.height = 300;
        });
    </script>
@endsection
