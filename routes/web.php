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
 


 

Auth::routes();

Route::get('/user/logout', 'Auth\LoginController@userlogout')->name('user.logout');
Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//======== start  admin login ===============
Route::prefix('admin')->group(function () {
	
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::resource('/admins' , 'AdminController');
    Route::get('/resetpassword/{admin}/edit' , 'AdminController@passwordForm')->name('admin.passwordform');
    Route::patch('/password/{admin}' , 'AdminController@passwordupdate');
    Route::resource('/clients', 'ClientController');
     
    Route::get('/staff/workingtime/{admin}' , 'admin\StaffController@workingtime')->name('staff.workingtime');
    Route::post('/staff/addworkingtime/{admin}' , 'admin\StaffController@addworkingtime');
    Route::delete('/staff/deleteworktime/{id}/{staffID}' , 'admin\StaffController@deleteworktime');
    Route::get('/salary/getsalaries/{id}', 'admin\HrSalaryController@GetSalaries');
    Route::get('/Dedication/getDedications/{id}/{from}/{to}', 'admin\HrDeductionController@GetDedication');
  
    Route::resource('/staffSalary','admin\StaffSalaryController');
    Route::resource('/payrolls','admin\PayrollController');
    Route::resource('/branch_admins','admin\BranchAdminsController');

    Route::get('/adminprofile' , 'AdminController@adminProfile')->name('admin.profile');
    Route::resource('/rooms','admin\RoomController');
    Route::resource('/countries','admin\CountryController');
    Route::resource('/areas','admin\AreaController');
    Route::resource('/cities','admin\CityController');
    Route::resource('/patients','admin\PatientController');
    
    Route::get('/cities/getcities/{id}', 'admin\CityController@GetCities');
    Route::get('/areas/getareas/{id}', 'admin\AreaController@GetAreas');
    Route::resource('/branches','admin\BranchController');
    Route::resource('/departments' , 'admin\DepartmentsController');
    Route::resource('/jobs' , 'admin\JobsController') ;
    Route::resource('/staff' , 'admin\StaffController');
    Route::get('/staff/getstaffs/{id}', 'admin\StaffController@GetAdmins');
    Route::get('/staff/getloanstaffs/{id}', 'admin\StaffController@GetLoanStaffs');

    Route::resource('/settings' , 'admin\SettingController');
    Route::get('/branches/getbranches/{id}', 'admin\BranchController@GetBranches');

    Route::get('/reservations/get_patient_name/{phone}', 'admin\ReservationsController@GetpatientName');
    Route::get('/reservations/get_doctorworktime/{doctorID}', 'admin\ReservationsController@GetDoctorsWorkingTime');
    Route::get('/reservations/get_schedul/{fkDoctorID}/{fldDate}', 'admin\ReservationsController@GetDoctorSchedul');
    Route::get('/reservations/calendar', 'admin\ReservationsController@calendar')->name('admin.reservations.calendar');
    Route::get('/reservations/modal_form', 'admin\ReservationsController@modal_form');
    Route::get('/reservations/calendar_reservations', 'admin\ReservationsController@CalendarReservations');
    Route::get('/reservations/view', 'admin\ReservationsController@ViewReservation');

    Route::get('/reservationspayment/getall', 'admin\ReservationsPaymentController@getall');
    Route::get('/reservationspayment/pay/{id}', 'admin\ReservationsPaymentController@PayReservation');
    Route::post('/reservationspayment/savepayment/{id}', 'admin\ReservationsPaymentController@SavePayReservation');

    Route::get('/jobs/getjobs/{id}', 'admin\JobsController@GetJobs');
    Route::get('/insurances/getinsurances/{id}', 'admin\HrInsuranceController@GetInsurances');
    
    Route::get('/jobs/getjobs/{id}', 'admin\JobsController@GetJobs');
    Route::get('/hr_loans/search_preview' , 'admin\HrLoanController@showStaffLoan');
    Route::get('/hr_loans/show/{id}' , 'admin\HrLoanController@show');

    Route::get('/hr_loans_payments/create/{id}' , 'admin\HrLoanPaymentController@create');
    Route::post('/hr_loans_payments/create/{id}' , 'admin\HrLoanPaymentController@store');

    Route::resource('/items' , 'admin\ItemsController');
    Route::resource('/incomes' , 'admin\IncomesController');
    Route::resource('/outcomes' , 'admin\OutcomesController');
    Route::resource('/hr_salaries' , 'admin\HrSalaryController');
    Route::resource('/hr_allowances' , 'admin\HrAllowanceController');
    Route::resource('/reservations' , 'admin\ReservationsController');
    Route::resource('/hr_deductions' , 'admin\HrDeductionController');
    Route::resource('/hr_insurances' , 'admin\HrInsuranceController');
    Route::resource('/hr_loans' , 'admin\HrLoanController');
    Route::resource('/hr_loans_payments' , 'admin\HrLoanPaymentController');
    Route::resource('/staffs_insurances' , 'admin\StaffInsuranceController');
    Route::resource('/reservationspayment' , 'admin\ReservationsPaymentController');
    Route::resource('/services' , 'admin\ServicesController');
}) ;

//======== end admin login ===============

Route::post('/admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');



Route::get('/testnotify', 'HomeController@testnotify')->name('testnotify'); 

Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});
