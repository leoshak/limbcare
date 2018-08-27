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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Employee
    Route::get('employees', 'EmployeeController@index')->name('employees');
    Route::get('employees/add', 'EmployeeController@create')->name('employees.add');
    Route::post('employees/store', 'EmployeeController@store')->name('employees.store');
    Route::get('employees/{employee}', 'EmployeeController@show')->name('employees.show');
    Route::get('employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
    Route::put('employees/{employee}', 'EmployeeController@update')->name('employees.update');
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
    Route::get('financial/edit', 'FinancialController@update')->name('financial.edit');
    Route::get('financial/add', 'FinancialController@create')->name('financial.add');
    Route::get('financial/delete', 'FinancialController@destroy')->name('financial.delete');
    Route::get('financial/show', 'FinancialController@show')->name('financial.show');

    
    Route::post('financial/addbill','FinancialController@stor');
    Route::post('financial/addsalary','FinancialController@salary');
    Route::post('financial/addother','FinancialController@other');
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

