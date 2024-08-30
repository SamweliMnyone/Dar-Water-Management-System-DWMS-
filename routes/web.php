<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\AdmiministratorController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('frontend.HomeTemplate.index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


// public routes
Route::middleware(['redirect.if.authenticated'])->group(function () {
    Route::get('/', [Authentication::class, 'index'])->name('home');
    Route::get('/register', [Authentication::class, 'register_view'])->name('register_view');
    Route::post('/register', [Authentication::class, 'registersubmit'])->name('registersubmit');
    Route::get('/login', [Authentication::class, 'login_view'])->name('login_view');
    Route::post('/login', [Authentication::class, 'loginsubmit'])->name('logins');
    Route::get('/forgot_password', [Authentication::class, 'forgotpassword_view'])->name('forgotpassword_view');
});


// GROUP ROUTES FOR ADMINISTRATOR

Route::group([
    'middleware' => ['check.role:administrator'],
    'controller' => AdmiministratorController::class,
    'prefix' => 'administrator'
], function () {
    Route::get('/dashboard', 'index')->name('index');
    Route::get('/profile', 'AdministratorProfile')->name('AdministratorProfile');
    Route::post('/profile', 'AdministratorProfileUpdate')->name('AdministratorProfileUpdate');
    Route::get('/updatepassword', 'PasswordUpdate')->name('PasswordUpdate');
    Route::post('/updatepassword', 'AdministratorPasswordUpdate')->name('AdministratorPasswordUpdate');


    Route::delete('/delete/{id}', 'destroy')->name('tech_delete');
    Route::match(['get', 'post'], '/view_tech', 'view_tech')->name('view_tech');
    Route::match(['get', 'post'], '/view_eng', 'view_eng')->name('view_eng');
    Route::match(['get', 'post'], '/view_admin', 'view_admin')->name('view_admin');
    Route::match(['put','post'], '/update/{id}', 'tech_update')->name('tech_update');
    Route::post('/add_technitian', 'add_tech')->name('add_tech');
    Route::post('/add_administrator', 'add_admin')->name('add_admin');
    Route::post('/add_engineer', 'add_eng')->name('add_eng');

    Route::get('/schedule', 'admin_schedule')->name('admin_schedule');
    Route::get('/logout', 'logout')->name('administrator.logout');

    Route::get('/events', 'AD_index')->name('events.index');
    // Route::post('/events', 'AD_store')->name('events.store');
    Route::put('/events/{id}', 'AD_update')->name('events.update');
    Route::delete('/events/{id}', 'AD_destroy')->name('events.destroy');


});

Route::post('/events', [AdmiministratorController::class, 'AD_store'])->name('events.store');

// GROUP ROUTES FOR TECHNICIANS

Route::group([
    'middleware' => ['check.role:technician'],
    'controller' => TechnicianController::class,
    'prefix' => 'technician'
], function () {
    Route::get('/dashboard', 'techDashboard')->name('techDashboard');
    Route::get('/profile', 'techProfile')->name('techProfile');
    Route::post('/profile', 'techProfileUpdate')->name('techProfileUpdate');
    Route::get('/updatepassword', 'techPasswordUpdate_view')->name('techPasswordUpdate_view');
    Route::post('/updatepassword', 'techPasswordUpdate')->name('techPasswordUpdate');
    Route::get('/schedule', 'schedule')->name('schedule');
    Route::get('/report', 'report_view')->name('report_view');
    Route::post('/technician/report', 'submit')->name('technician.report.submit');
    Route::get('/technician/reports', 'viewReports')->name('reports.index');
    Route::get('/reports/{id}', 'rep_show')->name('report.show');
    // Route::post('/apply_attachment/store', 'apply_attachment')->name('apply_attachment');
    Route::get('/logout', 'logout')->name('techlogout');
});



// GROUP ROUTES FOR ENGINEER

Route::group([
    'middleware' => ['check.role:engineer'],
    'controller' => EngineerController::class,
    'prefix' => 'engineer'
], function () {
    Route::get('/dashboard', 'engineerDashboard')->name('engineerDashboard');
    Route::get('/profile', 'engineerProfile')->name('engineerProfile');
    Route::post('/profile', 'engineerProfileUpdate')->name('engineerProfileUpdate');
    Route::get('/updatepassword', 'PasswordUpdate_view')->name('PasswordUpdate_view');
    Route::post('/updatepassword', 'engPasswordUpdate')->name('engPasswordUpdate');
    Route::get('/schedule', 'eng_schedule')->name('eng_schedule');
    Route::get('/approve_reports','engineerIndex')->name('engineer.reports');
    Route::patch('/report/{id}/update-status', 'updateStatus')->name('report.update.status');
    Route::get('/reports/{id}', 'show')->name('report.shows');

 

    // Route::get('/apply_attachment', 'view_attachment')->name('view_attachment');
    // Route::post('/apply_attachment/store', 'apply_attachment')->name('apply_attachment');
    Route::get('/logout', 'logout')->name('englogout');
});



