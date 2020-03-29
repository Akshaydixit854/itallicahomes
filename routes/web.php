<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    dd("cache cleared");
    // return what you want
});

Auth::routes();
/*
 *  Set up locale and locale_prefix if other language is selected
 */

Route::get('/locale/{locale}', ['as' => 'locale', 'uses' => 'IndexController@update_language']);
    
Route::get('/typography',['as'=>'typography','uses'=>'HomeController@typography']);
Route::get('/helper',['as'=>'helper','uses'=>'HomeController@helper']);
Route::get('/widget',['as'=>'widget','uses'=>'HomeController@widget']);
Route::get('/table',['as'=>'table','uses'=>'HomeController@table']);
Route::get('/media',['as'=>'media','uses'=>'HomeController@media']);
Route::get('/chart',['as'=>'chart','uses'=>'HomeController@chart']);
Route::get('/form',['as'=>'form','uses'=>'HomeController@form']);

Route::group(['middleware' => ['web']], function () {

    Route::get('admin', 'Auth\LoginController@showLoginForm');
    Route::post('translation','IndexController@translation');

    Route::get('special_offer','IndexController@special_offer');
    Route::get('sonderangebot','IndexController@special_offer');
    Route::get('offerta','IndexController@special_offer');
    
    Route::get('new_arrivals','IndexController@new_arrivals');
    Route::get('neue_objekte','IndexController@new_arrivals');
    Route::get('nuove_di_arrivo','IndexController@new_arrivals');


    Route::get('translation','IndexController@translation');
    Route::get('/',['as'=>'home','uses'=>'IndexController@index']);

    Route::get('about',['as'=>'about','uses'=>'IndexController@about']);
    Route::get('uber_uns',['as'=>'uber_uns','uses'=>'IndexController@about']);
    Route::get('chi_siamo',['as'=>'chi_siamo','uses'=>'IndexController@about']);

    Route::get('blogs',['as'=>'blogs','uses'=>'IndexController@blog']);
   
    Route::get('blog/{id}',['as'=>'blog-post','uses'=>'IndexController@blogPost']);
   
    Route::get('blog/{id}/pdf',['as'=>'blog-post-pdf','uses'=>'IndexController@blogPostPdf']);

    Route::get('properties/autocomplete','IndexController@autocomplete');
    Route::get('property/{id}/pdf',['as'=>'property-post-pdf','uses'=>'IndexController@propertyPdf']);
    Route::get('property/{id}/print',['as'=>'property-post-pdf','uses'=>'IndexController@propertyPrint']);
    
    Route::get('favourite/{id}','IndexController@favourite');

    Route::get('myfavourite','IndexController@myFavourite');
    Route::get('ihre_favoriten','IndexController@myFavourite');
    Route::get('preferiti','IndexController@myFavourite');

    Route::get('new_arrival','IndexController@new_arrival');
    Route::post('property_enquiry','IndexController@propertyEnquiry');

    Route::get('blog/{id}/print',['as'=>'blog-post-pdf','uses'=>'IndexController@blogPostPrint']);
    
    Route::get('contact',['as'=>'contact','uses'=>'IndexController@contact']);
    Route::get('kontakt',['as'=>'kontakt','uses'=>'IndexController@contact']);
    Route::get('contatti',['as'=>'contatti','uses'=>'IndexController@contact']);
  
    Route::post('contact/store',['as'=>'contact-store','uses'=>'IndexController@contactStore']);
    Route::post('contact/faq',['as'=>'contact-faq','uses'=>'IndexController@contactFaq']);

    Route::get('destinations',['as'=>'destinations','uses'=>'IndexController@destinations']);
    Route::get('ort',['as'=>'ort','uses'=>'IndexController@destinations']);
    Route::get('luoghi',['as'=>'luoghi','uses'=>'IndexController@destinations']);

    Route::get('destination/{id}',['as'=>'destination','uses'=>'IndexController@single_destination']);
    Route::get('ort/{id}',['as'=>'ort','uses'=>'IndexController@single_destination']);
    Route::get('luoghi/{id}',['as'=>'luoghi','uses'=>'IndexController@single_destination']);

    Route::get('destination/{id}/print',['as'=>'destination-pdf','uses'=>'IndexController@destinationPrint']);
    Route::get('ort/{id}/drucken',['as'=>'ort-drucken','uses'=>'IndexController@destinationPrint']);
    Route::get('luoghi/{id}/stampare',['as'=>'ort-stampare','uses'=>'IndexController@destinationPrint']);

    Route::get('destination/{id}/pdf',['as'=>'destination-pdf','uses'=>'IndexController@destinationPdf']);
    Route::get('ort/{id}/pdf',['as'=>'ort-pdf','uses'=>'IndexController@destinationPdf']);
    Route::get('luoghi/{id}/pdf',['as'=>'luoghi-pdf','uses'=>'IndexController@destinationPdf']);

    Route::get('category-property',['as'=>'category-property','uses'=>'IndexController@categoryProperty']);
    Route::get('immobilien_arten',['as'=>'immobilien_arten','uses'=>'IndexController@categoryProperty']);
    Route::get('tipologia',['as'=>'tipologia','uses'=>'IndexController@categoryProperty']);

    Route::get('search/{offer?}/{type?}',['as'=>'search','uses'=>'IndexController@searchFilter']);
    Route::get('suchen/{offer?}/{type?}',['as'=>'suchen','uses'=>'IndexController@searchFilter']);
    Route::get('cerca/{offer?}/{type?}',['as'=>'cerca','uses'=>'IndexController@searchFilter']);
    
    //customized
    Route::any('search','IndexController@searchFilter');
    Route::any('suchen','IndexController@searchFilter');
    Route::any('cerca','IndexController@searchFilter');

     Route::get('owner_services','IndexController@owner_service');
     Route::get('besitzer_services','IndexController@owner_service'); 
     Route::get('servizi_al_proprietario','IndexController@owner_service');
     
     
     Route::get('buyer_services','IndexController@buyer_service');
     Route::get('kaufer_services','IndexController@buyer_service');
     Route::get('servizi_per_compratore','IndexController@buyer_service');

    Route::get('/properties/{id}',['as'=>'single-property','uses'=>'IndexController@findProperty']);
  
    Route::get('/faq/{type?}',['as'=>'faq','uses'=>'IndexController@faq']);

    Route::get('terms_and_conditions','IndexController@terms_and_conditions');
    Route::get('AGB','IndexController@terms_and_conditions');
    Route::get('Termini_condizioni','IndexController@terms_and_conditions');

    Route::get('privacy_policy','IndexController@privacy_policy');
    Route::get('datenschutz','IndexController@privacy_policy');
    Route::get('politica_sulla_riservatezza','IndexController@privacy_policy');
    
    Route::get('legal_notice','IndexController@legal_notice');
    Route::get('impressum','IndexController@legal_notice');
    Route::get('informazioni_legali','IndexController@legal_notice');
    
    Route::get('getpdf','IndexController@getpdf');
});

Route::group(['prefix' => 'admin','middleware' => ['role:superadmin|admin|user']], function () {
    Route::get('terms/index','Admin\AddTerms@index');
    Route::get('terms/create','Admin\AddTerms@create');
    Route::post('terms/store','Admin\AddTerms@store');
    Route::get('terms/edit/{id}','Admin\AddTerms@edit');
    Route::post('terms/update/{id}','Admin\AddTerms@update');

    Route::get('legal_notice/index','Admin\AddLegalNotice@index');
    Route::get('legal_notice/create','Admin\AddLegalNotice@create');
    Route::post('legal_notice/store','Admin\AddLegalNotice@store');
    Route::get('legal_notice/edit/{id}','Admin\AddLegalNotice@edit');
    Route::post('legal_notice/update/{id}','Admin\AddLegalNotice@update');

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
    Route::resource('add-meta-tags', 'Admin\AddMetaTags');

    Route::get('inbox', 'Admin\IndexAdminController@inbox');
    Route::get('mark/read/{id}', 'Admin\IndexAdminController@mark');
    Route::get('mark/delete/{id}', 'Admin\IndexAdminController@delete');

     Route::get('owner', 'Admin\ServicesController@owner_index');
    Route::get('buyer', 'Admin\ServicesController@buyer_index');
     
    Route::get('owner_create', 'Admin\ServicesController@create_owner');
    Route::post('store_owner', 'Admin\ServicesController@ostore');
    Route::get('owner_edit/{id}', 'Admin\ServicesController@edit_owner');
    Route::any('owner_update/{id}', 'Admin\ServicesController@update_owner');
    Route::any('owner_delete/{id}', 'Admin\ServicesController@delete_owner');
    
     Route::get('buyer', 'Admin\ServicesController@buyer_index');
    Route::get('buyer_create', 'Admin\ServicesController@create_buyer');
    Route::post('store_buyer', 'Admin\ServicesController@bstore');
    Route::get('buyer_edit/{id}', 'Admin\ServicesController@edit_buyer');
    Route::any('buyer_update/{id}', 'Admin\ServicesController@update_buyer');
    Route::any('buyer_delete/{id}', 'Admin\ServicesController@delete_buyer');

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

    Route::get('properties_index', 'Admin\IndexAdminController@properties_index');
    Route::get('properties_index/read/{id}', 'Admin\IndexAdminController@property_mark');
    Route::get('properties_index/delete/{id}', 'Admin\IndexAdminController@property_delete'); 
    Route::resource('profile','Users\ProfileController');
});



