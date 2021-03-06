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
Route::get('/encrypt', function () {
    return md5('123456');
});
Route::get('blank', function () {
    return view('chartjs_charts');
});

Route::get('/', function () {
    return view('login');
});

Route::get('logout', function() {
    Session::flush();

    return redirect('/');
});
Route::post('login/authenticateuser', 'LoginController@authenticateUser');


Route::group(['middleware' => 'check-userauth'], function () {

    Route::get('testsms', 'NotificationsController@testsms');

    Route::get('dashboard', 'DashboardController@showdashboard');
    Route::get('estates', 'EstatesController@showestates');
    Route::get('services', 'ServiceController@showservices');
    Route::get('auditlogs', 'AuditLogsController@showlogs');

    Route::get('apartments/facilities', 'ApartmentController@showapartmentsfacilities');
    Route::get('apartments', 'ApartmentController@showaparments');
    Route::get('facilities', 'FacilityController@showfacility');
    Route::get('tenants/new', 'TenantController@showtenants');
    Route::get('tenants/showall', 'TenantController@showalltenants');
    Route::get('tenants/current', 'TenantController@showcurrenttenants');
    Route::get('tenants/previous', 'TenantController@showprevioustenants');
    Route::get('tenants/makepayments', 'BankController@showrentpayments');
    Route::get('tenants/payments', 'BankController@showpayments');

    
    Route::get('tenants/information/{id}', 'TenantController@showtenantinformation');
    Route::get('tenants/services', 'TenantController@showtenantsservices');
    Route::get('tenants/bill', 'TenantController@showtenantsbill');
    Route::get('configuration/apartmenttypes', 'ConfigurationController@showapartmenttypes');
    Route::get('configuration/rentperiods', 'ConfigurationController@showrentperiods');
    Route::get('configuration/identification', 'ConfigurationController@showidentification');
    Route::get('account', 'AccountController@showbanks');
    Route::get('banking/banks', 'BankController@showbanks');
    Route::get('banking/clearpayments', 'BankController@showclearpayments');
    Route::get('banking/clearedpayments', 'BankController@showclearedpayments');
    Route::get('account/users', 'AccountController@showusers');
//reports
    Route::get('reports/bills', 'ReportController@showbills');
    Route::get('reports/payments', 'ReportController@showpayments');
    Route::get('reports/rents', 'ReportController@showrents');
    Route::get('reports/expiringrent', 'ReportController@showexpiryrent');
    Route::get('reports/availableapartments', 'ReportController@showavailableapartments');
    Route::get('reports/clearedpayments', 'ReportController@showclearedpayments');
    Route::get('reports/tenantsowing', 'ReportController@showtenantsowing');
    Route::get('reports/tenants/info/{id}', 'ReportController@showtenantinfo');







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
    Route::get('apartment/all', 'ApartmentController@getAvailableApartments');
    Route::get('apartment/{id}', 'ApartmentController@getApartmentDetail');
    Route::delete('apartment/{id}', 'ApartmentController@deleteApartment');
    Route::get('apartments/getall', 'ApartmentController@getAllApartments');

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
    Route::get('services/{id}', 'ServiceController@getServiceDetail');
    Route::delete('services/{id}', 'ServiceController@deleteService');
    Route::post('services', 'ServiceController@saveService');
    Route::put('services', 'ServiceController@updateService');

//user management
    Route::get('account/getusers', 'AccountController@getUsers');
    Route::get('account/user/{id}', 'AccountController@getUserInfo');
    Route::delete('account/deleteuser/{id}', 'AccountController@deleteUser');
    Route::put('account/user', 'AccountController@updateUserInfo');
    Route::post('account/saveuser', 'AccountController@saveUserInfo');
    Route::post('updatepassword', 'LoginController@updatePassword');
    Route::get('account/changepassword', 'AccountController@showpassword');

    //changepassword
//tenant information savetenant
    Route::post('tenants/savetenant', 'TenantController@saveTenantInformation');
    Route::post('tenants/service', 'TenantController@saveTenantService');
    Route::get('tenants/all', 'TenantController@getTenants');
    Route::get('tenants/getcurrents', 'TenantController@getCurrentTenants');
    Route::get('tenants/getprevious', 'TenantController@getPreviousTenants');

    Route::post('retreivetenantbills', 'TenantController@retreiveTenantBill');
    Route::delete('tenants/{id}', 'TenantController@deleteTenantInformation');
    Route::get('tenant/{id}', 'TenantController@getTenantDetail');
    Route::get('tenants/{id}', 'TenantController@getTenantInformation');
    Route::get('tenantbills/all', 'TenantController@getAllTenantsBills');
    Route::get('bills/{id}', 'TenantController@getBillInfo');
    Route::put('tenants/updatebill', 'TenantController@updateBillInformation');
    Route::delete('tenants/deletebill/{id}', 'TenantController@deleteBillInformation');
    Route::get('getallrents', 'TenantController@getRents');
    Route::get('getexpiringrents', 'TenantController@getExpiringRents');
        Route::get('getexpiredrents', 'TenantController@getExpiredRents');

    Route::get('tenant/rent/{id}', 'TenantController@getTenantRentInformation');
    Route::post('tenantaccumulatedbill', 'TenantController@getTenantTotalBill');

//


    Route::post('tenants/update', 'TenantController@updateTenantInformation');


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

    Route::get('banks/all', 'BankController@getBanks');
    Route::post('banking/saverentpayments', 'BankController@saveRentPayment');
    Route::post('banking/savebank', 'BankController@saveBank');
    Route::get('banking/getunclearedpayments', 'BankController@getUnClearedpayments');
    Route::get('banking/getclearedpayments', 'BankController@getClearedpayments');
    Route::post('clearpayments', 'BankController@markpaymentsascleared');
    Route::delete('banking/{id}', 'BankController@deletebank');
    Route::get('banking/{id}', 'BankController@getBankDetail');
    Route::put('banking/updatebank', 'BankController@updateBank');
    Route::get('banking/payments/all', 'BankController@getRentpayments');
    Route::get('banking/payments/{id}', 'BankController@getPaymentInfo');
    Route::delete('deletepayment/{id}', 'BankController@deletePaymentInfo');
    Route::post('banking/updaterentpayments', 'BankController@updateRentPayment');
    Route::post('banking/paymentswithinperiod', 'BankController@getRentpaymentsPeriod');
    Route::get('computedate/{month}/{date}', 'ConfigurationController@computeDate');
    Route::get('validaterent/{tenant_id}/{date}', 'BankController@validaterentDate');
    Route::get('validatebill/{tenant_id}/{date}', 'BankController@validateBillDate');

//reports
    Route::get('reports/paymentstrend', 'ReportController@getPaymentsTrend');
    Route::get('reports/rentowingtenant', 'ReportController@getRentOwingTenants');
    Route::get('reports/billowingtenant', 'ReportController@getBillOwingTenants');

//audit logs
    Route::get('auditlogs/all', 'AuditLogsController@getLogs');
});

Route::get('posts/{something}', function () {
    //
})->middleware(['down.for.maintenance']);

Route::get('role', [
    'middleware' => 'Role:editor',
    'uses' => 'TestController@index',
]);
