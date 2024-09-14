<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SuperAdminProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RegisterSuperAdminController;
use App\Http\Controllers\SuperAdminActivityLogController;
use App\Http\Controllers\SuperAdminSettingsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
// routes/web.php




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes(); // This includes login, registration, password reset routes, etc.

// Password Reset Routes
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
// Ubah nama rute untuk forgot-password
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request.form');

// Ubah nama rute untuk password/reset
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request.reset');
// Ubah nama rute untuk forgot-password
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email.forgot');

// Ubah nama rute untuk password/email
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email.send');
// Ubah nama rute untuk reset-password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');

// Ubah nama rute untuk reset-password (POST)
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset.update');

// routes/user
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
// Profile user Routes
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::put('/user/profile/update', [UserProfileController::class, 'updateDetails'])->name('user.profile.updateDetails');
    Route::put('/user/profile/update-image', [UserProfileController::class, 'updateImage'])->name('user.profile.updateImage');
    Route::put('/user/profile', [UserProfileController::class, 'update'])->name('user.profile.update');
    Route::put('/user/profile/picture', [UserProfileController::class, 'updatePicture'])->name('user.profile.picture.update');
    Route::put('/user/profile/photo', [UserProfileController::class, 'updatePhoto'])->name('user.profile.photo.update');
});

// routes/superadmin
Route::get('/superadmin/profile', [SuperAdminProfileController::class, 'index'])->name('superadmin.profile');
Route::get('/superadmin/about', [SuperAdminController::class, 'about'])->name('superadmin.about');

// Profile superadmin Routes
Route::middleware('auth')->group(function () {
    Route::get('/superadmin/profile', [SuperAdminProfileController::class, 'index'])->name('superadmin.profile');
    Route::put('/superadmin/profile/update', [SuperAdminProfileController::class, 'updateDetails'])->name('superadmin.profile.updateDetails');
    Route::put('/superadmin/profile/update-image', [SuperAdminProfileController::class, 'updateImage'])->name('superadmin.profile.updateImage');
    Route::put('/superadmin/profile', [SuperAdminProfileController::class, 'update'])->name('superadmin.profile.update');
    Route::put('/superadmin/profile/photo', [SuperAdminProfileController::class, 'updatePhoto'])->name('superadmin.profile.photo.update');
});


Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->group(function () {
    // Route untuk Administrator
    Route::get('/admins', [SuperAdminController::class, 'index'])->name('superadmin.admins.index');
    Route::get('/admins/create', [SuperAdminController::class, 'create'])->name('superadmin.admins.create');
    Route::post('/admins', [SuperAdminController::class, 'store'])->name('superadmin.admins.store');
    Route::get('/admins/{admin}/edit', [SuperAdminController::class, 'edit'])->name('superadmin.admins.edit');
    Route::put('/admins/{admin}', [SuperAdminController::class, 'update'])->name('superadmin.admins.update');
    Route::delete('/admins/{admin}', [SuperAdminController::class, 'destroy'])->name('superadmin.admins.destroy');

    // Route untuk User
    Route::get('/users', [SuperAdminController::class, 'userIndex'])->name('superadmin.users.index');
    Route::get('/users/create', [SuperAdminController::class, 'userCreate'])->name('superadmin.users.create');
    Route::post('/users', [SuperAdminController::class, 'userStore'])->name('superadmin.users.store');
    Route::get('/users/{user}/edit', [SuperAdminController::class, 'userEdit'])->name('superadmin.users.edit');
    Route::put('/users/{user}', [SuperAdminController::class, 'userUpdate'])->name('superadmin.users.update');
    Route::delete('/users/{user}', [SuperAdminController::class, 'userDestroy'])->name('superadmin.users.destroy');
});

Route::middleware(['auth', 'role:administrator'])->prefix('admin')->group(function () {
    // Route untuk User
    Route::get('/users', [AdminController::class, 'Index'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'userStore'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'userEdit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
});



Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->group(function () {
    Route::get('superadmin/settings', [SuperAdminSettingsController::class, 'index'])->name('superadmin.settings');
    Route::put('/settings', [SuperAdminSettingsController::class, 'update'])->name('superadmin.settings.update');
    Route::get('superadmin/activitylog', [SuperAdminActivityLogController::class, 'index'])->name('superadmin.activitylog');
});
// Route untuk halaman Settings
Route::get('superadmin/settings', [SuperAdminSettingsController::class, 'index'])->name('settings');

// Route untuk halaman Activity Log
Route::get('superadmin/activitylog', [SuperAdminActivityLogController::class, 'index'])->name('activitylog');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('superadmin.admins/index', AdminController::class);
});


Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('admins', AdminController::class);
});





// routes/user
Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
// Profile superadmin Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::put('/admin/profile/update', [AdminProfileController::class, 'updateDetails'])->name('admin.profile.updateDetails');
    Route::put('/admin/profile/update-image', [AdminProfileController::class, 'updateImage'])->name('admin.profile.updateImage');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::put('/admin/profile/photo', [AdminProfileController::class, 'updatePhoto'])->name('admin.profile.photo.update');
});
// Home Route with Role-Based Redirection
Route::get('/home', function () {
    $user = Auth::user();

    if ($user->role === 'superadmin') {
        return redirect()->route('superadmin.dashboard');
    } elseif ($user->role === 'administrator') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute untuk halaman beranda (Home)
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Rute untuk halaman About
Route::get('about', [AboutController::class, 'index'])->name('about');

// Rute untuk halaman Services
Route::get('services', [ServicesController::class, 'index'])->name('services');

// Rute untuk halaman Portfolio
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// Rute untuk halaman Team
Route::get('team', [TeamController::class, 'index'])->name('team');

// Rute untuk halaman Blog
Route::get('blog', [BlogController::class, 'index'])->name('blog');



// Rute untuk menampilkan formulir kontak
Route::get('contact', [ContactController::class, 'index'])->name('contact');

// Rute untuk mengirim pesan formulir kontak
Route::post('/send-message', [ContactController::class, 'submitContactForm'])->name('send_message');

Route::get('/service-details', function () {
    return view('service-details');
})->name('service-details');
Route::get('/service-details', function () {
    return view('service-details');
})->name('service-details');

Route::post('/send-message', [ContactController::class, 'submitContactForm']);

Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send_message');


Route::post('/send-message', [ContactController::class, 'sendMessage'])->name('send_message');
Route::get('/superadmin/notifications', [SuperAdminController::class, 'getNotifications'])->name('superadmin.notifications');

Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
Route::post('/send-message', [SuperAdminDashboardController::class, 'sendMessage'])->name('send.message');



// Dashboard Routes for Different Roles
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');
    Route::get('/superadmin/dashboard', [SuperAdminDashboardController::class, 'index'])->name('superadmin.dashboard')->middleware('role:superadmin');
});
Route::get('/admin', function () {
    // Admin panel logic
})->middleware('role:administrator');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminDashboardController::class, 'index'])->name('superadmin.dashboard');
});
Route::get('/status', function () {
    return view('status');
});
Route::get('/offline', function () {
    return view('offline');
});


Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->group(function () {
    // Route untuk dashboard
    Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('superadmin.dashboard');

    // Route untuk pesan
    Route::get('/messages', [SuperAdminDashboardController::class, 'getMessages'])->name('superadmin.messages');

    // Route untuk notifikasi
    Route::get('/notifications', [SuperAdminDashboardController::class, 'getNotifications'])->name('superadmin.notifications');
});

Route::post('/contact', [ContactController::class, 'sendContactForm'])->name('contact.send');


Route::post('/send-message', [ContactController::class, 'sendMessage'])->name('send_message');
