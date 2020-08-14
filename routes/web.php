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
// Route::post('*', 'csrf', array('post', 'put', 'delete'));

Route::any('portal', function () { 
    return view('auth/login');
});

Route::any('/', 'WebsiteController@index');
Route::any('homepage', 'WebsiteController@homepage');

Route::any('reservation', 'WebsiteController@reservation');
Route::any('contactus', 'WebsiteController@contactus');
Route::any('blog', 'WebsiteController@blog');
Route::any('reservationdetail', 'WebsiteController@reservationdetail');
Route::any('loginregister', 'WebsiteController@loginregister');
Route::any('add_partner_details', 'WebsiteController@add_partner_details');
Route::any('add_contact_details', 'WebsiteController@add_contact_details');
Route::any('get_searched_vehicle', 'WebsiteController@get_searched_vehicle');
Route::any('get_searched_vehicle_by_date', 'WebsiteController@get_searched_vehicle_by_date');

Route::post('new_customer_register', 'WebsiteController@new_customer_register');
Route::any('customerportal', 'WebsiteController@customerportal');

// Route::any('partner_uilist/{id}', 'AdminController@partner_uilist'); 
Route::get('book_new_reservation/{id}', 'WebsiteController@book_new_reservation');
Route::post('get_vehicle_available_dates', 'WebsiteController@get_vehicle_available_dates');
Route::post('get_vehicle_rent_for_date', 'WebsiteController@get_vehicle_rent_for_date');
Route::post('new_reservation_form_detail', 'WebsiteController@new_reservation_form_detail');


Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');



Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::any('/home', 'AdminController@index')->name('dashboard');
	Route::any('dashboard', 'AdminController@index')->name('dashboard');
    
    Route::get('add-to-log', 'HomeController@myTestAddToLog');
    Route::get('coralogs', 'HomeController@logActivity');
    
//AdminController
    Route::any('partnerprofile', 'AdminController@partnerprofile');
    Route::any('triplist', 'AdminController@triplist');
    Route::any('tripdetails/{id}', 'AdminController@tripdetails');
    Route::any('partnertriplist', 'AdminController@partnertriplist');
    Route::any('customerbookingcancel', 'AdminController@customerbookingcancel');
    Route::any('reservations', 'AdminController@reservations');
    Route::any('reservations_details/{id}', 'AdminController@reservations_details');
    Route::any('viewmessage', 'AdminController@viewmessage');
    Route::any('datepick', 'AdminController@datepick');
    Route::any('bookingcancel', 'AdminController@bookingcancel');
    Route::any('triphistory', 'AdminController@triphistory');
    Route::any('vehicledetails', 'AdminController@vehicledetails');
    Route::any('rateandavailablity', 'AdminController@rateandavailablity');
    Route::any('reservationpay', 'AdminController@reservationpay');
    Route::any('newvehicle', 'AdminController@newvehicle');
    Route::any('partner_list', 'AdminController@partner_list');
    Route::any('partnerlistnew', 'AdminController@partnerlistnew');
    Route::any('partner_uilist/{id}', 'AdminController@partner_uilist'); 
    Route::any('get_all_partner_list', 'AdminController@get_all_partner_list');
    Route::any('status_partner_details', 'AdminController@status_partner_details');
    Route::any('un_delete_partner_list', 'AdminController@un_delete_partner_list');
    Route::any('filter_get_all_partner_list', 'AdminController@filter_get_all_partner_list');
    // Route::any('upload_partner_personal_pic', 'AdminController@upload_partner_personal_pic');
    Route::any('get_all_vehicle_list', 'AdminController@get_all_vehicle_list');
    Route::any('update_auto_approve_status', 'AdminController@update_auto_approve_status');
    Route::any('delete_partner_details', 'AdminController@delete_partner_details'); 
    Route::any('reservationlist', 'AdminController@reservationlist');
    Route::any('upload_setting_images', 'AdminController@upload_setting_images');
    Route::any('get_all_master_image_data', 'AdminController@get_all_master_image_data');
    Route::any('upload_master_img', 'AdminController@upload_master_img');
    Route::any('update_master_image_data', 'AdminController@update_master_image_data');
    Route::any('delete_master_image', 'AdminController@delete_master_image');
    Route::any('reservations1', 'AdminController@reservations1');
    Route::any('cus_insert_message', 'AdminController@cus_insert_message');
    Route::get('pdfview',array('as'=>'pdfview','uses'=>'AdminController@pdfview'));
    Route::any('part_insert_message', 'AdminController@part_insert_message');
    Route::any('admin_update_bank_details', 'AdminController@admin_update_bank_details');
    Route::any('add_reservation_form', 'AdminController@add_reservation_form');
    
    
    Route::any('master_table', 'AdminController@master_table');
    Route::any('get_master_list', 'AdminController@get_master_list');
    Route::any('edit_master_details', 'AdminController@edit_master_details');
    Route::any('add_master_details', 'AdminController@add_master_details');
    Route::any('get_all_master_data', 'AdminController@get_all_master_data');
    Route::any('un_delete_color_list', 'AdminController@un_delete_color_list');
    Route::any('upload_partner_personal_document', 'AdminController@upload_partner_personal_document');
    Route::any('upload_partner_document', 'AdminController@upload_partner_document');
    Route::any('edit_vehicle/{id}', 'AdminController@edit_vehicle');
    Route::any('add_customer_details', 'AdminController@add_customer_details');
    Route::any('add_billing_details', 'AdminController@add_billing_details');
    Route::any('add_reserv_details/{id}', 'AdminController@add_reserv_details');
    Route::get('invoice_pdfview',array('as'=>'invoice_pdfview','uses'=>'AdminController@invoice_pdfview'));
    // Route::any('invoice_pdfview/{id}','AdminController@invoice_pdfview');
    Route::any('partner_get_all_upcoming_reservation', 'AdminController@partner_get_all_upcoming_reservation');
    Route::any('partner_filter_get_all_upcoming_reservation_lists', 'AdminController@partner_filter_get_all_upcoming_reservation_lists');
    
    
    
    Route::any('sample_invoice', 'AdminController@sample_invoice');
    
     Route::any('get_all_trip_details', 'AdminController@get_all_trip_details');
     Route::any('get_all_trip_detail_list', 'AdminController@get_all_trip_detail_list');
     Route::any('filter_get_all_trip_list', 'AdminController@filter_get_all_trip_list');

// common
    Route::any('delete_document', 'AdminController@delete_document');
    Route::any('update_partner_personal_details', 'AdminController@update_partner_personal_details');
    Route::any('upload_partner_profile_pic', 'PartnerController@upload_partner_profile_pic');
    Route::any('insert_message', 'PartnerController@insert_message');
    Route::any('update_message', 'PartnerController@update_message');
    Route::any('insert_new_vehicle', 'PartnerController@insert_new_vehicle');
    Route::any('load_vehicle_data', 'PartnerController@load_vehicle_data');
    Route::any('upload_vehicle_document', 'PartnerController@upload_vehicle_document');
    Route::any('update_new_vehicle', 'PartnerController@update_new_vehicle');
    Route::any('add_on_info', 'PartnerController@add_on_info');
    Route::any('add_on_details', 'PartnerController@add_on_details');
    Route::any('add_on_service', 'PartnerController@add_on_service');
    Route::any('add_service_details', 'PartnerController@add_service_details');
    Route::any('admin_update_message', 'PartnerController@admin_update_message');
    Route::get('charts', 'ChartController@index')->name('chart.index');
    Route::any('add_new_rent', 'PartnerController@add_new_rent');
    Route::any('add_multidate_rent', 'PartnerController@add_multidate_rent');
    Route::any('update_add_on_details', 'PartnerController@update_add_on_details');
    Route::any('delete_addon_detail', 'PartnerController@delete_addon_detail');
    Route::any('partnerresevationlist', 'PartnerController@partnerresevationlist');
    Route::any('partnerreservationdetail/{id}', 'PartnerController@partnerreservationdetail');
    
    
// PartnerController
    Route::any('my_profile', 'PartnerController@my_profile');
    Route::any('partner_update_personal_details', 'PartnerController@partner_update_personal_details');
    Route::any('vehicle_list', 'PartnerController@vehicle_list');
    Route::any('get_all_upcoming_reservation', 'PartnerController@get_all_upcoming_reservation');
    Route::any('filter_get_all_upcoming_reservation_lists', 'PartnerController@filter_get_all_upcoming_reservation_lists');
    Route::any('get_all_partner_reservation_list', 'PartnerController@get_all_partner_reservation_list');
    Route::any('get_all_partner_filter_reservation_list', 'PartnerController@get_all_partner_filter_reservation_list');
    Route::any('update_bank_details', 'PartnerController@update_bank_details');
    Route::any('partner_send_message', 'PartnerController@partner_send_message');

//ReservationController    
    Route::any('get_all_reservation_list', 'ReservationController@get_all_reservation_list');
    Route::any('change_reservation_details', 'ReservationController@change_reservation_details');
    Route::any('reservationlist', 'ReservationController@reservationlist');
    Route::any('filter_get_all_reservation_list', 'ReservationController@filter_get_all_reservation_list');
    Route::post('get_vehicle_list_asssign', 'ReservationController@get_vehicle_list_asssign');
    Route::post('assign_new_vehicle', 'ReservationController@assign_new_vehicle');
    
    Route::post('add_trip_details', 'ReservationController@add_trip_details');
    Route::post('upload_trip_vehicle_pic', 'ReservationController@upload_trip_vehicle_pic');
    
//CustomerController
    Route::any('update_customer_details', 'CustomerController@update_customer_details');
    Route::any('cus_add_billing_details', 'CustomerController@cus_add_billing_details');
    Route::any('cus_send_message', 'CustomerController@cus_send_message');
    Route::any('customer_reservationlist', 'CustomerController@customer_reservationlist');
    Route::any('get_all_customer_reservation_list', 'CustomerController@get_all_customer_reservation_list');
    Route::any('customer_dashboard/{id}', 'CustomerController@customer_dashboard');
    Route::any('customer_reservation/{id}', 'CustomerController@customer_reservation');
});
Route::any('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 