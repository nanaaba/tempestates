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

Route::get('/', function () {
    return view('login');
});
Route::get('dashboard', 'DashboardController@showdashboard');
Route::get('estates', 'EstatesController@showestates');
Route::get('apartments/facilities', 'ApartmentController@showapartmentsfacilities');
Route::get('apartments', 'ApartmentController@showaparments');
Route::get('facilities', 'FacilityController@showfacility');
Route::get('tenants/new', 'TenantController@showtenants');
Route::get('tenants/all', 'TenantController@showalltenants');
Route::get('tenants/services', 'TenantController@showtenantsservices');
Route::get('tenants/bill', 'TenantController@showtenantsbill');
Route::get('configuration/apartmenttypes', 'ConfigurationController@showapartmenttypes');
Route::get('configuration/rentperiods', 'ConfigurationController@showrentperiods');
Route::get('configuration/identification', 'ConfigurationController@showidentification');


Route::get('account', 'AccountController@showbanks');
Route::get('banks', 'BankController@showbanks');
Route::get('services', 'ServiceController@showservices');


Route::get('/logout', function() {
        //Uncomment to see the logs record
        //\Log::info("Session before: ".print_r($request->session()->all(), true));
         Session::flush();
        //Uncomment to see the logs record
        //\Log::info("Session after: ".print_r($request->session()->all(), true));
        return redirect('/');
    });




//estate apis
Route::get('estates/all', 'EstatesController@getEstates');
Route::delete('estate/{id}', 'EstatesController@deleteEstate');
Route::post('estate', 'EstatesController@saveEstate');
Route::put('estate', 'EstatesController@updateEstate');
//apartment apis
Route::get('apartment/all', 'ApartmentController@getApartments');
Route::get('apartment/{id}', 'ApartmentController@getApartmentDetail');
Route::delete('apartment/{id}', 'ApartmentController@deleteApartment');
Route::post('apartment', 'ApartmentController@saveApartment');
Route::put('apartment', 'ApartmentController@updateApartment');
//facilities apis
Route::get('facility/all', 'FacilityController@getfacilities');
Route::get('getapartmentfacilities/{apartmentid}', 'FacilityController@getApartmentFacilities');
Route::delete('facility/{id}', 'FacilityController@deleteFacility');
Route::post('facility', 'FacilityController@saveFacilty');
Route::post('facility/apartment', 'FacilityController@saveApartmentFacilities');
Route::put('facility', 'FacilityController@updateFacility');

//services apis
Route::get('services/all', 'ServiceController@getservices');
Route::delete('services/{id}', 'ServiceController@deleteService');
Route::post('services', 'ServiceController@saveService');
Route::put('services', 'ServiceController@updateService');

//user management
Route::get('account/getusers', 'AccountController@getUsers');
Route::get('account/user/{id}', 'AccountController@getUserInfo');
Route::delete('account/deleteuser/{id}', 'AccountController@deleteUser');
Route::put('account/user', 'AccountController@updateUserInfo');
Route::post('account/saveuser', 'AccountController@saveUserInfo');
Route::post('login/authenticateuser', 'LoginController@authenticateUser');
Route::post('login/updatepassword', 'LoginController@updatePassword');

//tenant information savetenant
Route::post('tenants/savetenant', 'TenantController@saveTenantInformation');


//configuration
Route::post('configuration/saveapartmentypes', 'ConfigurationController@saveApartmentType');
Route::post('configuration/saveperiod', 'ConfigurationController@saveRentPeriods');
Route::post('configuration/saveidentificationtype', 'ConfigurationController@saveIdentification');
Route::get('configuration/getapartmentypes', 'ConfigurationController@getApartmentTypes');
Route::get('configuration/getrentperiods', 'ConfigurationController@getRentPeriods');
Route::get('configuration/getidentificationcards', 'ConfigurationController@getIdentificationCards');
Route::delete('configuration/deleteapartmentype/{id}', 'ConfigurationController@deleteApartmentType');
Route::delete('configuration/deleteperiod/{id}', 'ConfigurationController@deleteRentPeriod');
Route::delete('configuration/deleteidentificationcard/{id}', 'ConfigurationController@deleteIdentification');



Route::get('posts/{something}', function () {
    //
})->middleware(['down.for.maintenance']);

Route::get('role', [
    'middleware' => 'Role:editor',
    'uses' => 'TestController@index',
]);




