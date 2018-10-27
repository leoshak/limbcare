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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'administrator'], function () {
    
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::post('storereport', 'StoreController@displayReport');
    
    Route::post('financial/searchinvoice','FinancialController@searchinvoice');
    
    Route::post('financial/searchbillin','FinancialController@searchbillin');
    Route::post('financial/searchbill','FinancialController@searchbill');
    Route::post('financial/add_salary/addsalary','FinancialController@salary');
    //Employee
    Route::get('employees', 'EmployeeController@index')->name('employees');
    Route::get('employees/add', 'EmployeeController@create')->name('employees.add');
    Route::post('employees/store', 'EmployeeController@store')->name('employees.store');
    Route::get('employees/report', 'EmployeeController@gotoReport')->name('employees.report');
    Route::post('employees/rep', 'EmployeeController@generateReport')->name('employees.rep');
    Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show');
    Route::get('employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
    Route::put('employees/{employee}', 'EmployeeController@update')->name('employees.update');
    // Route::delete('employees/delete', 'EmployeeController@delete')->name('employees.delete');
    Route::delete('employees/{employee}/delete', 'EmployeeController@destroy')->name('employees.delete');
    

    //Appointment
    Route::get('appointments', 'AppointmentController@index')->name('appointments');
    Route::get('appointments/add', 'AppointmentController@create')->name('appointments.add');
    Route::post('appointments/checkDate', 'AppointmentController@checkDate')->name('appointments.checkDate');
    Route::post('appointments/checkDate/store', 'AppointmentController@store')->name('appointments.checkDate.store');
    Route::get('appointments/report', 'AppointmentController@gotoReport')->name('appointments.report');
    Route::post('appointments/rep', 'AppointmentController@generateReport')->name('appointments.rep');
    Route::get('appointments/{appointment}', 'AppointmentController@show')->name('appointments.show');
    Route::get('appointments/{appointment}/edit', 'AppointmentController@edit')->name('appointments.edit');
    Route::put('appointments/{appointment}', 'AppointmentController@update')->name('appointments.update');
    // Route::delete('appointments/{appointment}/delete', 'AppointmentController@destroy')->name('appointments.delete');
    Route::get('appointments/{appointment}/delete', ['as' => 'appointments.delete', 'uses' => 'AppointmentController@destroy']);
    
    //Diagnosis
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis');
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis.index');
    Route::get('diagnosis/indexadd', 'DiagnosisController@indexad')->name('diagnosis.indexadd');
    Route::get('diagnosis/edit/{diagnosis}', 'DiagnosisController@edit')->name('diagnosis.edit');
    Route::get('diagnosis/add/{patient}', 'DiagnosisController@create')->name('diagnosis.add');
    Route::get('diagnosis/delete/{diagnosis}', 'DiagnosisController@destroy')->name('diagnosis.delete');
    Route::get('diagnosis/{diagnosis}', 'DiagnosisController@show')->name('diagnosis.show');
   
    Route::post('diagnosis/searchpationdiagnosis','DiagnosisController@searchpationdiagnosis');
    Route::post('diagnosis/add/adddiagnosis','DiagnosisController@store');
    Route::post('diagnosis/edit/updatediagnosis','DiagnosisController@update');
    
    Route::post('searchdiagnosis','DiagnosisController@search');
    Route::post('diagnosis/delete/deletediagnosis','DiagnosisController@padelete');
    
    //Doctor
    Route::get('doctors', 'DoctorController@index')->name('doctors');
    Route::any('doctorsearch','DoctorController@search');
    Route::get('doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
    Route::get('doctors/report','DoctorController@report')->name('doctors.report');

    Route::get('doctors/add', 'DoctorController@add')->name('doctors.add');
    Route::get('doctors/{doctor}', 'DoctorController@show')->name('doctors.show');
    Route::post('doctors/{doctor}/editdoc','doctorController@update');

    Route::put('doctors/update' , 'DoctorController@update')->name('doctors.update');
    //Route::delete('doctors/{user}', 'DoctorController@destroy')->name('doctors.destroy');
//    Route::get('doctors/del', 'DoctorController@delete')->name('doctors.delete');
    Route::delete('doctors/{doctor}/delete', 'DoctorController@destroy')->name('doctor.delete');
    //Route::get('doctors/report', 'DoctorController@add')->name('doctors.report');
    Route::post('doctors/cal','DoctorController@create');
    Route::post('doctors/edit','DoctorController@update');
    Route::post('doctors/report', 'DoctorController@displayReport');

    //Financial
    Route::get('financial', 'FinancialController@index')->name('financial');
    Route::get('financial/index_bill', 'FinancialController@indexbill')->name('financial.index_bill');
    Route::get('financial/index_salary', 'FinancialController@indexsalary')->name('financial.index_salary');
    Route::get('financial/index_other', 'FinancialController@indexother')->name('financial.index_other');
    Route::get('financial/{financialBill}/edit', 'FinancialController@edit')->name('financial.edit');
    Route::get('financial/index_invoice/{Invoice}', 'FinancialController@showinvoce')->name('financial.showinvoice');
    Route::get('financial/bill/{financialBill}', 'FinancialController@show')->name('financial.showBill');
    Route::get('financial/salary/{financialSalaryPayment}', 'FinancialController@showSalaryPayment')->name('financial.showSalary');
    Route::get('financial/otherpay/{financialOtherPayment}', 'FinancialController@showOtherPayment')->name('financial.showOtherPay');
    
    Route::get('financial/add_bill', 'FinancialController@addbill')->name('financial.add_bill');
    Route::get('financial/add_salary/{emp}', 'FinancialController@addsalary')->name('financial.add_salary');
    Route::get('financial/add_salaryindex', 'FinancialController@addsalaryindex')->name('financial.add_salaryindex');
    
    Route::get('financial/add_other', 'FinancialController@addother')->name('financial.add_other');
    Route::get('financial/add', 'FinancialController@create')->name('financial.add');

    //invoice newinvoice addninvoice
    Route::get('financial/newinvoice/{patient}', 'FinancialController@newinvoice')->name('financial.newinvoice');
    Route::get('financial/index_invoice', 'FinancialController@invoice')->name('financial.index_invoice');
    Route::get('financial/add_invoice', 'FinancialController@addinvoice')->name('financial.add_invoice');
    //financial bill edit
    Route::post('financial/{financialBill}/update', 'FinancialController@update');
    //financial salary edit
    Route::get('financial/{financialSalary}/edit_salary', 'FinancialController@editSalary')->name('financial.edit_salary');
     //financial otherpay edit
    Route::get('financial/{financialOtherPay}/edit_otherpay', 'FinancialController@editOtherPay')->name('financial.edit_otherpay');
    
    //financial salary delete
    Route::get('financial/delete/{financialSalary}', 'FinancialController@destroyRequest')->name('financial.delete');
    //financial bill delete
    Route::get('financial/deleteBill/{financialBill}', 'FinancialController@destroyBillRequest')->name('financial.deleteBill');
    //financial otherpay delete
    Route::get('financial/deleteOtherPay/{financialOtherPay}', 'FinancialController@destroyOtherpayRequest')->name('financial.deleteOtherPay');
    Route::post('financial/deleteOtherPay/destroy','FinancialController@destroyOtherPay');
    Route::post('financial/{financialSalary}/updateSalary', 'FinancialController@updateSalary');
    Route::post('financial/deleteBill/destroy','FinancialController@destroyBill');
    Route::post('financial/{financialOtherPay}/updateOtherPay', 'FinancialController@updateOtherPay');
    Route::post('financial/delete/destroy','FinancialController@destroy');
    Route::post('financial/newinvoice/addninvoice', 'FinancialController@newTinvoice');
    Route::post('financial/add_bill/addbillinvoice/addbill','FinancialController@stor');
    Route::post('financial/addsalary','FinancialController@salary');
    Route::post('financial/addother','FinancialController@other');
    Route::get('financial/add_bill/addbillinvoice/{invoice}','FinancialController@billinvoicew')->name('financial.addbillinvoice');
    // Route::get('financial/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
    // Route::put('financial/{employee}', 'EmployeeController@update')->name('employees.update');

    //Patient
     Route::any('patientsearch','PatientController@search');
    Route::post('patientsreport', 'PatientController@displayReport');

    Route::get('patient', 'PatientController@index')->name('patients');
    Route::get('patient/add', 'PatientController@create')->name('patient.add');
    //Route::post('patient/store', 'PatientController@store')->name('patient.store');
    Route::get('patient/{patient}', 'PatientController@show')->name('patient.show');
    Route::get('patient/{patient}/edit', 'PatientController@edit')->name('patient.edit');
    Route::put('patient/{employee}', 'PatientController@update')->name('patient.update');
    Route::delete('patient/{patient}/delete', 'PatientController@destroy')->name('patient.delete');
    Route::post('patient/patient','PatientController@store');

    Route::post('patient/{patient}/editpat','PatientController@update');
    Route::get('/laravel_google_chart', 'LaravelGoogleGraph@index');
    Route::get('chartView','PatientController@re')->name('patient.chartView');
    
        //Services
    Route::get('services', 'ServiceController@index')->name('services');
    Route::get('services/add', 'ServiceController@create')->name('services.add');
    Route::get('services/{service}', 'ServiceController@show')->name('services.show');
    Route::get('services/edit/{service}', 'ServiceController@edit')->name('services.edit');
    Route::get('services/delete/{service}', 'ServiceController@destroy')->name('services.delete');
    Route::post('services/addservice','ServiceController@store');
    Route::post('services/edit/updateservices','ServiceController@update');
    Route::post('searchservice','ServiceController@search');
    Route::post('services/delete/deleteservices','ServiceController@sedelete');
    
    //Store
    Route::get('store', 'StoreController@index')->name('store');
    Route::get('store/edit/{store}', 'StoreController@edit')->name('store.edit');
    Route::get('store/add', 'StoreController@create')->name('store.add');
    Route::get('store/delete/{store}', 'StoreController@destroy')->name('store.delete');
    Route::get('store/{store}', 'StoreController@show')->name('store.show');
    Route::get('store/plus/{store}', 'StoreController@plus')->name('store.plus');
    Route::get('store/minus/{store}', 'StoreController@min')->name('store.minus');
    
    Route::get('/report', 'StoreController@reportS')->name('store.report');
    Route::post('store/edit/updatestore','StoreController@update');
    Route::post('store/plus/addstore','StoreController@UPplus');
    Route::post('store/minus/minstore','StoreController@minitem');
    Route::post('store/delete/deletestores','StoreController@sedelete');
    Route::post('searchstore','StoreController@search');
    Route::post('store/additem','StoreController@store');
    
    //question
    Route::get('question_forum', 'QuestionsForumController@index')->name('question_forum');
    Route::get('question_forum/edit/{replye}', 'QuestionsForumController@edit')->name('question_forum.edit');
    Route::get('question_forum/add', 'QuestionsForumController@create')->name('question_forum.add');
    Route::get('question_forum/delete/{questionsforum}', 'QuestionsForumController@destroy')->name('question_forum.delete');
    Route::get('question_forum/{questionsforum}', 'QuestionsForumController@show')->name('question_forum.show');
    Route::get('question_forum/reply/{questionsforum}', 'QuestionsForumController@reply')->name('question_forum.reply');
    Route::post('searchquestion','QuestionsForumController@search');
    Route::post('question_forum/reply/addreply','QuestionsForumController@addreplye');
    Route::post('question_forum/edit/updatereply','QuestionsForumController@update');
    Route::post('question_forum/delete/deletequestions','QuestionsForumController@qdelete');
    Route::post('question_forum/addques','QuestionsForumController@store');
   
    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});

Route::group(['prefix' => 'director', 'as' => 'director.', 'namespace' => 'employee\director', 'middleware' => 'director'], function () {
    // Dashboard
    Route::get('/', 'DirectorDashboardController@index')->name('dashboard');
    
    Route::get('employees', 'EmployeeController@index')->name('employees');
    Route::get('employees/add', 'EmployeeController@create')->name('employees.add');
    Route::post('employees/store', 'EmployeeController@store')->name('employees.store');
    Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show');
    Route::get('employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
    Route::put('employees/{employee}', 'EmployeeController@update')->name('employees.update');
    Route::delete('employees/{employee}/delete', 'EmployeeController@destroy')->name('employees.delete');
    
    // Route::delete('employees/delete', 'EmployeeController@delete')->name('employees.delete');
    Route::delete('employees/{employee}/delete', 'EmployeeController@destroy')->name('employees.delete');
    //Appointment
    Route::get('appointments', 'AppointmentController@index')->name('appointments');
    Route::get('appointments/add', 'AppointmentController@create')->name('appointments.add');
    Route::post('appointments/store', 'AppointmentController@store')->name('appointments.store');
    Route::get('appointments/{appointment}', 'AppointmentController@show')->name('appointments.show');
    Route::get('appointments/{appointment}/edit', 'AppointmentController@edit')->name('appointments.edit');
    Route::put('appointments/{appointment}', 'AppointmentController@update')->name('appointments.update');
    // Route::delete('appointments/{appointment}/delete', 'AppointmentController@destroy')->name('appointments.delete');
    Route::get('appointments/{appointment}/delete', ['as' => 'appointments.delete', 'uses' => 'AppointmentController@destroy']);
    //Diagnosis
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis');
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis.index');
    Route::get('diagnosis/edit/{diagnosis}', 'DiagnosisController@edit')->name('diagnosis.edit');
    Route::get('diagnosis/add', 'DiagnosisController@create')->name('diagnosis.add');
    Route::get('diagnosis/delete/{diagnosis}', 'DiagnosisController@destroy')->name('diagnosis.delete');
    Route::get('diagnosis/{diagnosis}', 'DiagnosisController@show')->name('diagnosis.show');
    
    Route::post('diagnosis/adddiagnosis','DiagnosisController@store');
    Route::post('diagnosis/edit/updatediagnosis','DiagnosisController@update');
    
    Route::post('diagnosis/delete/deletediagnosis','DiagnosisController@padelete');
    //Doctor
    Route::get('doctors', 'DoctorController@index')->name('doctors');
    //Financial
    Route::get('financial', 'FinancialController@index')->name('financial');
    Route::get('financial', 'FinancialController@index')->name('financial');
    Route::get('financial/add', 'FinancialController@create')->name('financial.add');
    //financial bill edit
    Route::get('financial/{financialBill}/edit', 'FinancialController@edit')->name('financial.edit');
    Route::post('financial/{financialBill}/update', 'FinancialController@update');
    //financial salary edit
    Route::get('financial/{financialSalary}/edit_salary', 'FinancialController@editSalary')->name('financial.edit_salary');
    Route::post('financial/{financialSalary}/updateSalary', 'FinancialController@updateSalary');
    //financial otherpay edit
    Route::get('financial/{financialOtherPay}/edit_otherpay', 'FinancialController@editOtherPay')->name('financial.edit_otherpay');
    Route::post('financial/{financialOtherPay}/updateOtherPay', 'FinancialController@updateOtherPay');
    
    //financial salary delete
    Route::get('financial/delete/{financialSalary}', 'FinancialController@destroyRequest')->name('financial.delete');
    Route::post('financial/delete/destroy','FinancialController@destroy');
    //financial bill delete
    Route::get('financial/deleteBill/{financialBill}', 'FinancialController@destroyBillRequest')->name('financial.deleteBill');
    Route::post('financial/deleteBill/destroy','FinancialController@destroyBill');
    //financial otherpay delete
    Route::get('financial/deleteOtherPay/{financialOtherPay}', 'FinancialController@destroyOtherpayRequest')->name('financial.deleteOtherPay');
    Route::post('financial/deleteOtherPay/destroy','FinancialController@destroyOtherPay');
    Route::post('financial/addbill','FinancialController@stor');
    Route::post('financial/addother','FinancialController@other');
    Route::get('financial/bill/{financialBill}', 'FinancialController@show')->name('financial.showBill');
    Route::get('financial/salary/{financialSalaryPayment}', 'FinancialController@showSalaryPayment')->name('financial.showSalary');
    Route::get('financial/otherpay//{financialOtherPayment}', 'FinancialController@showOtherPayment')->name('financial.showOtherPay');
    // Route::get('financial/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
    // Route::put('financial/{employee}', 'EmployeeController@update')->name('employees.update');
    //Patient
    Route::get('patient', 'PatientController@index')->name('patients');
    //Services
    Route::get('services', 'ServiceController@index')->name('services');
    //Store
    

    Route::get('store', 'StoreController@index')->name('store');
    
    Route::get('store/edit/{store}', 'StoreController@edit')->name('store.edit');
    Route::get('store/add', 'StoreController@create')->name('store.add');
    Route::get('store/delete/{store}', 'StoreController@destroy')->name('store.delete');
    Route::get('store/{store}', 'StoreController@show')->name('store.show');

    
    Route::post('store/edit/updatestore','StoreController@update');
    Route::post('store/delete/deletestores','StoreController@sedelete');
    Route::post('store/additem','StoreController@store');
    //question
    Route::get('question_forum', 'QuestionsForumController@index')->name('question_forum');
    Route::get('question_forum/edit/{questionsforum}', 'QuestionsForumController@edit')->name('question_forum.edit');
    Route::get('question_forum/add', 'QuestionsForumController@create')->name('question_forum.add');
    Route::get('question_forum/delete/{questionsforum}', 'QuestionsForumController@destroy')->name('question_forum.delete');
    Route::get('question_forum/{questionsforum}', 'QuestionsForumController@show')->name('question_forum.show');
    Route::post('question_forum/edit/updatequestion','QuestionsForumController@update');
    Route::post('question_forum/delete/deletequestions','QuestionsForumController@qdelete');
    Route::post('question_forum/addques','QuestionsForumController@store');
    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});

Route::group(['prefix' => 'receptionist', 'as' => 'receptionist.', 'namespace' => 'employee\receptionist', 'middleware' => 'receptionist'], function () {
    // Dashboard
    Route::get('/', 'RecepDashboardController@index')->name('dashboard');

    //editprofile
    Route::get('editprofile', 'RecepDashboardController@editprofile')->name('editprofile');
    Route::put('editprofile/{employee}', 'RecepDashboardController@updateProfile')->name('editprofile.update');

    //Employee
    Route::get('employees', 'EmployeeController@index')->name('employees');
    Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show');
    
    //appointment
    Route::get('appointments', 'AppointmentController@index')->name('appointments');
    Route::get('appointments/add', 'AppointmentController@create')->name('appointments.add');
    Route::post('appointments/store', 'AppointmentController@store')->name('appointments.store');
    
    //question
    Route::get('question_forum', 'QuestionsForumController@index')->name('question_forum');
    Route::get('question_forum/add', 'QuestionsForumController@create')->name('question_forum.add');
    
    //store
    Route::get('store', 'StoreController@index')->name('store');
    Route::get('store/add', 'StoreController@create')->name('store.add');
    
    //Patient
    Route::get('patient', 'PatientController@index')->name('patients');
    //Services
    Route::get('services', 'ServiceController@index')->name('services');
    //doctor
    Route::get('doctors', 'DoctorController@index')->name('doctors');
    
    //Diagnosis
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis');
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis.index');
    Route::get('diagnosis/add', 'DiagnosisController@create')->name('diagnosis.add');
    
});
Route::group(['prefix' => 'pno', 'as' => 'pno.', 'namespace' => 'employee\pno', 'middleware' => 'pno'], function () {
    // Dashboard
    Route::get('/', 'PnDashboardController@index')->name('dashboard');
    
    //Employee
    Route::get('employees', 'EmployeeController@index')->name('employees');
    Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show');
    
    //appointment
    Route::get('appointments', 'AppointmentController@index')->name('appointments');
    Route::get('appointments/add', 'AppointmentController@create')->name('appointments.add');
    
    //question
    Route::get('question_forum', 'QuestionsForumController@index')->name('question_forum');
    Route::get('question_forum/add', 'QuestionsForumController@create')->name('question_forum.add');
    
    //store
    Route::get('store', 'StoreController@index')->name('store');
    Route::get('store/add', 'StoreController@create')->name('store.add');
    
    //Patient
    Route::get('patient', 'PatientController@index')->name('patients');
    //Services
    Route::get('services', 'ServiceController@index')->name('services');
    //doctor
    Route::get('doctors', 'DoctorController@index')->name('doctors');
    
    //Diagnosis
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis');
    Route::get('diagnosis', 'DiagnosisController@index')->name('diagnosis.index');
    Route::get('diagnosis/add', 'DiagnosisController@create')->name('diagnosis.add');
    
});
Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'patient', 'middleware' => 'patient'], function () {
    // Dashboard
    Route::get('diagnosis', 'PatientController@patientint')->name('diagnosis.index');

    Route::get('/', 'PatientDashboardController@index')->name('dashboard');
    
    //Employee
    Route::get('employees', 'EmployeeController@index')->name('employees');
    Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.index');
    
    //appointment
    Route::get('appointments', 'AppointmentController@index')->name('appointments');
    Route::get('appointments/add', 'AppointmentController@create')->name('appointments.add');
    
    //question
    Route::get('question_forum', 'PatientController@quindex')->name('question_forum');
    Route::get('question_forum/add', 'QuestionsForumController@create')->name('question_forum.add');
    Route::get('question_forum/show/{questionsforum}', 'QuestionsForumController@showa')->name('question_forum.show');
    
    Route::post('question_forum/addques', 'QuestionsForumController@addques');
    Route::post('searchservice', 'PatientController@searchservice');
    
    //store
    Route::get('store', 'StoreController@index')->name('store');
    Route::get('store/add', 'StoreController@create')->name('store.add');
    
    //Patient
    Route::get('patient', 'PatientController@index')->name('patients');
    //Services
    Route::get('services', 'PatientController@servicesi')->name('services');
    //doctor
    Route::get('doctors', 'PatientController@doctors')->name('doctors');
    
    //Diagnosis
  
});
Route::group(['prefix' => 'doctor', 'as' => 'doctor.', 'namespace' => 'doctor', 'middleware' => 'doctor'], function () {
    // Dashboard
    Route::get('/', 'DoctorDashboardController@index')->name('dashboard');
    Route::get('question_forum/show/{questionsforum}', 'DoctorDashboardController@questionforumshow')->name('question_forum.show');
   
    //Employee
    Route::get('employees', 'EmployeeController@index')->name('employees');
    Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show');
    Route::get('employees/store', 'EmployeeController@store')->name('employees.store');
    Route::put('employees/{employee}', 'EmployeeController@update')->name('employees.update');
    
    //appointment director.employees.store
    Route::get('appointments', 'AppointmentController@index')->name('appointments');
    Route::get('appointments/add', 'AppointmentController@create')->name('appointments.add');
    

    Route::get('question_forum', 'DoctorDashboardController@questionforum')->name('question_forum');
    
    Route::get('question_forum/add', 'DoctorDashboardController@questionforumadd')->name('question_forum.add');
    Route::post('question_forum/addquesw', 'DoctorDashboardController@addquesw');
    
    //store
    Route::get('store', 'StoreController@index')->name('store');
    Route::get('store/add', 'StoreController@create')->name('store.add');
    
    //Patient
    Route::get('patient', 'DoctorDashboardController@sentindex')->name('patients');
    //Services
    Route::get('services', 'DoctorDashboardController@servicesi')->name('services');
    //doctor
    Route::get('doctors', 'DoctorDashboardController@sentindexsd')->name('doctors');
    
    //Diagnosis
    Route::get('diagnosis', 'DoctorDashboardController@indexdais')->name('diagnosis.index');
    
    Route::get('diagnosis/{diagnosise}', 'DoctorDashboardController@diagnosisindexss')->name('diagnosis.show');

    
});

Route::get('/', 'HomeController@index');
Route::get('/aboutus', 'AboutUsController@aboutus');
Route::get('/services', 'ServicesController@services');
Route::get('/contact', 'ContactController@contact');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

