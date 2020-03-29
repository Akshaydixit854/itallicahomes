<?php

    Route::get('/terms/index','Admin\AddTerms@index');
    Route::get('/terms/create','Admin\AddTerms@create');
    Route::post('/terms/store','Admin\AddTerms@store');
    Route::get('/terms/edit/{id}','Admin\AddTerms@edit');
    Route::post('/terms/update/{id}','Admin\AddTerms@update');

    Route::get('/legal_notice/index','Admin\AddLegalNotice@index');
    Route::get('/legal_notice/create','Admin\AddLegalNotice@create');
    Route::post('/legal_notice/store','Admin\AddLegalNotice@store');
    Route::get('/legal_notice/edit/{id}','Admin\AddLegalNotice@edit');
    Route::post('/legal_notice/update/{id}','Admin\AddLegalNotice@update');

    Route::get('/privacy_policy/index','Admin\AddPrivacyPolicy@index');
    Route::get('/privacy_policy/create','Admin\AddPrivacyPolicy@create');
    Route::post('/privacy_policy/store','Admin\AddPrivacyPolicy@store');
    Route::get('/privacy_policy/edit/{id}','Admin\AddPrivacyPolicy@edit');
    Route::post('/privacy_policy/update/{id}','Admin\AddPrivacyPolicy@update');

    Route::post('/property_preview/{temp_id?}','Admin\PropertiesController@property_preview');
    Route::post('/property_preview_edit/{temp_id?}','Admin\PropertiesController@property_preview_edit');
    Route::get('/single_property/{id}','Admin\PropertiesController@findProperty');

    Route::get('/edit_single_property/{id}','Admin\PropertiesController@findEditProperty');

    Route::get('/property_card/{id}','Admin\PropertiesController@property_card');
    Route::get('/custom_delete/{id}','Admin\PropertiesController@custom_delete');
    Route::post('/delete_gallery_image','Admin\PropertiesController@delete_gallery_image');

    Route::resource('delete_property_type_image', 'Admin\AddPropertyTypes@delete_property_type_image');

    Route::post('/blog_image_gallery/{id}','Admin\AddPost@blog_image_gallery');
    Route::get('/destroy_blog_image/{id}','Admin\AddPost@destroy_blog_image');
    Route::post('/image_gallery/{id}','Admin\PropertiesController@image_gallery');
    Route::get('/properties/destroy_image/{id}','Admin\PropertiesController@destroy_image');
    Route::post('/type_image_gallery/{id}','Admin\PropertiesController@type_image_gallery');
    Route::get('/properties/destroy_image_gallery/{id}','Admin\PropertiesController@destroy_image_gallery');
    Route::get('/',['as'=>'dashboard','uses'=>'HomeController@index']);
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('add-items', 'Admin\AddItemController');
    Route::resource('add-property-types', 'Admin\AddPropertyTypes');
    Route::resource('add-destination', 'Admin\AddDestination');
    Route::resource('add-region', 'Admin\AddRegion');
    Route::resource('add-area', 'Admin\AddArea');
    Route::resource('add-faq', 'Admin\AddFaq');
    Route::resource('add-post', 'Admin\AddPost');
    Route::resource('add-agency', 'Admin\AddAgency');
    Route::resource('add-destination', 'Admin\AddDestination');
    Route::resource('add-offer', 'Admin\AddOffer');
    Route::resource('add-location', 'Admin\AddLocationsController');
    Route::resource('add-condition', 'Admin\AddConditionController');
    Route::resource('add-amenities', 'Admin\AddAmenitiesController');
    Route::resource('add-testimonial', 'Admin\AddTestimonialController');

    Route::get('inbox', 'Admin\IndexAdminController@inbox');
    Route::get('mark/read/{id}', 'Admin\IndexAdminController@mark');
    Route::get('mark/delete/{id}', 'Admin\IndexAdminController@delete');

    Route::get('contact_enquiry/index', 'Admin\IndexAdminController@index');
    Route::get('contact_enquiry/read/{id}', 'Admin\IndexAdminController@enquiry_mark');
    Route::get('contact_enquiry/delete/{id}', 'Admin\IndexAdminController@enquiry_delete');

    Route::get('inbox/unread', 'Admin\IndexAdminController@unreadInbox');
    Route::post('inbox/{id}/{status}', 'Admin\IndexAdminController@inboxStatus');
    Route::resource('properties', 'Admin\PropertiesController');
    Route::resource('settings', 'Admin\SettingsController');

    Route::get('general_index', 'Admin\IndexAdminController@general_index');
    Route::get('general_mark/read/{id}', 'Admin\IndexAdminController@general_mark');
    Route::get('general_mark/delete/{id}', 'Admin\IndexAdminController@general_delete');


