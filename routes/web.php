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
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SuperAdminBlogController;
use App\Http\Controllers\SuperAdminServiceController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\SuperAdminPortofolioController;
use App\Http\Controllers\SuperAdminAboutController;
use App\Http\Controllers\SuperAdminClientController;
use App\Http\Controllers\SuperAdminSearchController;
use App\Http\Controllers\AdminSearchController;
use App\Http\Controllers\DasaWismaController;

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



Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');


Route::get('/superadmin/services/{id}', [SuperAdminServiceController::class, 'show'])->name('superadmin.service-details');


Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
// Ubah nama rute untuk forgot-password



Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Ubah nama rute untuk password/reset


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

// routes/web.php
Route::get('/', [WelcomeController::class, 'welcome']); // Route untuk welcome page


// routes/web.php
Route::get('/', [WelcomeController::class, 'welcome']); // Pastikan route ini mengarah ke controller yang tepat

// Rute untuk halaman beranda (Home)
// Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Rute untuk halaman About
Route::get('about', [AboutController::class, 'index'])->name('about');

// Rute untuk halaman Services
//Route::get('services', [ServicesController::class, 'index'])->name('services');

// Rute untuk halaman Portfolio
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// Rute untuk halaman Team
Route::get('team', [TeamController::class, 'index'])->name('team');

// Rute untuk halaman Blog
Route::get('blog', [BlogController::class, 'index'])->name('blog');

Route::get('dasawisma', [DasaWismaController::class, 'index'])->name('dasawisma');



// Rute untuk menampilkan formulir kontak
Route::get('contact', [ContactController::class, 'index'])->name('contact');

// Rute untuk mengirim pesan formulir kontak
Route::post('/send-message', [ContactController::class, 'submitContactForm'])->name('send_message');

use App\Models\Service;

Route::get('/service-details/{id}', function ($id) {
    $service = Service::findOrFail($id);
    $services = Service::all(); // Ambil semua layanan
    return view('service-details', compact('service', 'services'));
})->name('service-details');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');
Route::get('/portfolio-details', function () {
    return view('portfolio-details');
})->name('portfolio-details');





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

// Rute untuk Blog yang diakses oleh Superadmin
Route::prefix('superadmin')->middleware('role:superadmin')->group(function () {
    Route::get('/blog', [SuperAdminBlogController::class, 'index'])->name('superadmin.blog.index');
    Route::get('/blog/create', [SuperAdminBlogController::class, 'create'])->name('superadmin.blog.create');
    Route::post('/blog', [SuperAdminBlogController::class, 'store'])->name('superadmin.blog.store');
    Route::get('/blog/{blog}/edit', [SuperAdminBlogController::class, 'edit'])->name('superadmin.blog.edit');
    Route::put('/blog/{blog}', [SuperAdminBlogController::class, 'update'])->name('superadmin.blog.update');
    Route::delete('/blog/{blog}', [SuperAdminBlogController::class, 'destroy'])->name('superadmin.blog.destroy');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{id}', [BlogController::class, 'show'])->name('show');
});

Route::get('/services/{id}', [ServiceController::class, 'show'])->name('service-details');


// routes/web.php
Route::get('/blog/{id}', [SuperAdminBlogController::class, 'show'])->name('blog.show');

Route::get('blog-details/{id}', [BlogController::class, 'show'])->name('blog-details');
Route::get('blog/{id}', [SuperAdminBlogController::class, 'show'])->name('blog.show');
Route::get('blog/{id}', [BlogController::class, 'show'])->name('blog.show');



Route::resource('superadmin/services', SuperAdminServiceController::class)->middleware('auth:superadmin');
Route::get('/superadmin/services/{id}', [SuperAdminServiceController::class, 'show'])->name('superadmin.service-details');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
// Route untuk menampilkan detail layanan

// Route untuk menampilkan detail layanan


Route::middleware('role:superadmin')->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::resource('services', SuperAdminServiceController::class);
});



Route::get('/portofolio-details/{id}', [PortofolioController::class, 'show'])->name('portofolio-details');
Route::get('/portofolio/{id}', [PortofolioController::class, 'show'])->name('portfolio-details');
// SuperAdmin Portofolio Routes
Route::prefix('superadmin')->name('superadmin.')->middleware('auth', 'isSuperAdmin')->group(function () {
    Route::resource('portofolio', SuperAdminPortofolioController::class);
});
Route::prefix('superadmin')->name('superadmin.')->middleware(['auth', 'isSuperAdmin'])->group(function () {
    Route::resource('portofolio', SuperAdminPortofolioController::class);
});
Route::middleware('role:superadmin')->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::resource('portofolio', SuperAdminPortofolioController::class);
});
Route::get('/portfolio', [SuperAdminPortofolioController::class, 'showAllPortfolios'])->name('portfolio');
Route::get('/portfolio/{id}', [PortofolioController::class, 'show'])->name('portfolio.show');
Route::get('/portfolio/{id}', [PortofolioController::class, 'show'])->name('portfolio.show');
Route::resource('portfolios', SuperAdminPortofolioController::class);


// Rute untuk resource About
Route::prefix('superadmin')->middleware(['auth', 'is_superadmin'])->group(function () {
    Route::resource('about', SuperAdminAboutController::class);
});
Route::middleware(['auth', 'is_superadmin'])->prefix('superadmin')->group(function () {
    Route::resource('about', SuperAdminAboutController::class);
});
Route::middleware('role:superadmin')->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::resource('about', SuperAdminAboutController::class);
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::put('/portofolio/{id}', [SuperAdminPortofolioController::class, 'update'])->name('superadmin.portofolio.update');
//Route::resource('clients', SuperAdminClientController::class)->middleware('auth', 'role:superadmin');
//Route::middleware('role:superadmin')->prefix('superadmin')->name('superadmin.')->group(function () {
//Route::resource('/clients', SuperAdminClientController::class);
//});
//Route::middleware(['auth', 'role:superadmin'])->group(function () {
//Route::get('/superadmin/clients', [SuperAdminClientController::class, 'index'])->name('superadmin.client.index');
//});

Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('clients', SuperAdminClientController::class);
});
// Rute untuk Client yang diakses oleh Superadmin
Route::prefix('superadmin')->middleware('role:superadmin')->group(function () {
    Route::get('/clients', [SuperAdminClientController::class, 'index'])->name('superadmin.clients.index');
    Route::get('/clients/create', [SuperAdminClientController::class, 'create'])->name('superadmin.clients.create');
    Route::post('/clients', [SuperAdminClientController::class, 'store'])->name('superadmin.clients.store');
    Route::get('/clients/{client}/edit', [SuperAdminClientController::class, 'edit'])->name('superadmin.clients.edit');
    Route::put('/clients/{client}', [SuperAdminClientController::class, 'update'])->name('superadmin.clients.update');
    Route::delete('/clients/{client}', [SuperAdminClientController::class, 'destroy'])->name('superadmin.clients.destroy');
});

// Rute untuk Superadmin
Route::get('/superadmin/search', [SuperAdminSearchController::class, 'search'])->name('superadmin.search');

// Rute untuk Admin
Route::get('/admin/search', [AdminSearchController::class, 'search'])->name('admin.search');


Route::get('/download/pdf', [DasaWismaController::class, 'downloadPDF'])->name('download.pdf');
Route::get('/download/excel', [DasaWismaController::class, 'downloadExcel'])->name('download.excel');

use App\Http\Controllers\ImageController;

Route::get('/download-image', [ImageController::class, 'downloadImage'])->name('download.image');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services-details');

use App\Http\Controllers\Superadmin\ProvinsiController;
use App\Http\Controllers\PropController;

Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('provinsi', [PropController::class, 'index'])->name('superadmin.provinsi.index'); // Halaman list provinsi
    Route::get('provinsi/create', [PropController::class, 'create'])->name('superadmin.provinsi.create'); // Halaman form tambah
    Route::post('provinsi', [PropController::class, 'store'])->name('superadmin.provinsi.store'); // Menyimpan data provinsi
    Route::get('provinsi/{provinsi}', [PropController::class, 'show'])->name('superadmin.provinsi.show'); // Detail provinsi
    Route::get('provinsi/{provinsi}/edit', [PropController::class, 'edit'])->name('superadmin.provinsi.edit'); // Form edit
    Route::put('provinsi/{provinsi}', [PropController::class, 'update'])->name('superadmin.provinsi.update'); // Update provinsi
    Route::delete('provinsi/{provinsi}', [PropController::class, 'destroy'])->name('superadmin.provinsi.destroy'); // Hapus provinsi
    Route::get('provinsi/search', [PropController::class, 'search'])->name('superadmin.provinsi.search'); // Pencarian
});

use App\Http\Controllers\KabController;

Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->as('superadmin.')->group(function () {
    // Rute untuk Kabupaten
    Route::resource('kabupaten', KabController::class);
});

use App\Http\Controllers\KecController;

Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->as('superadmin.')->group(function () {
    // Rute untuk Kabupaten
    Route::resource('kecamatan', KecController::class);
});

use App\Http\Controllers\KelController;

Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->as('superadmin.')->group(function () {
    // Rute untuk Kabupaten
    Route::resource('kelurahan', KelController::class);
});



use App\Http\Controllers\UserPropController;

// Rute untuk pengguna
Route::prefix('user')->group(function () {
    Route::resource('provinsi', UserPropController::class)->except(['edit', 'update', 'destroy']);
});



// Route untuk menampilkan halaman pemilihan Dasa Wisma


// Route untuk meng-handle form submission
//Route::post('/user/dasawisma/submit', [UserDasaWismaController::class, 'submit'])->name('user.dasawisma.submit');

// Grup routes untuk Dasa Wisma

use App\Http\Controllers\UserDasaWismaController;

//Route::prefix('user/dasawisma')->middleware(['auth'])->name('user.dasawisma.')->group(function () {
//  Route::get('/', [UserDasaWismaController::class, 'index'])->name('index');
//Route::get('/create', [UserDasaWismaController::class, 'create'])->name('create');
//Route::post('/', [UserDasaWismaController::class, 'store'])->name('store');
//Route::get('/{nama_dawis}', [UserDasaWismaController::class, 'show'])->name('show');
//Route::get('/{nama_dawis}/edit', [UserDasaWismaController::class, 'edit'])->name('edit');
//Route::put('/{nama_dawis}', [UserDasaWismaController::class, 'update'])->name('update');
//Route::delete('/{nama_dawis}', [UserDasaWismaController::class, 'destroy'])->name('destroy');
//});


Route::middleware(['auth'])->group(function () {
    Route::resource('dasawisma', UserDasaWismaController::class)->names('user.dasawisma');
});

Route::prefix('user/dasawisma')->group(function () {
    Route::get('/', [UserDasaWismaController::class, 'index'])->name('user.dasawisma.index'); // Menampilkan daftar Dasa Wisma
    Route::get('/create', [UserDasaWismaController::class, 'create'])->name('user.dasawisma.create'); // Menampilkan form untuk membuat Dasa Wisma baru
    Route::post('/', [UserDasaWismaController::class, 'store'])->name('user.dasawisma.store'); // Menyimpan Dasa Wisma baru
    Route::get('/{id}', [UserDasaWismaController::class, 'show'])->name('user.dasawisma.show'); // Menampilkan detail Dasa Wisma
    Route::get('/{id}/edit', [UserDasaWismaController::class, 'edit'])->name('user.dasawisma.edit'); // Menampilkan form untuk mengedit Dasa Wisma
    Route::put('/{id}', [UserDasaWismaController::class, 'update'])->name('user.dasawisma.update'); // Memperbarui Dasa Wisma
    Route::delete('/{id}', [UserDasaWismaController::class, 'destroy'])->name('user.dasawisma.destroy'); // Menghapus Dasa Wisma
});

Route::resource('dasawisma', UserDasaWismaController::class)->middleware('auth');


//Route::post('/dasawisma/submit', [UserDasaWismaController::class, 'store'])->name('user.dasawisma.submit');

Route::get('/api/kabupaten/{provinsi}', [UserDasaWismaController::class, 'getKabupaten']);
Route::get('/api/kecamatan/{kabupaten}', [UserDasaWismaController::class, 'getKecamatan']);
Route::get('/api/kelurahan/{kecamatan}', [UserDasaWismaController::class, 'getKelurahan']);


// Jika Anda tidak menggunakan AJAX untuk mengambil data kabupaten, kecamatan, dan kelurahan, hapus route berikut
// Route::get('/user/dasawisma/kabupaten/{no_prop}', [UserDasaWismaController::class, 'getKabupaten'])->name('user.dasawisma.kabupaten');
// Route::get('/user/dasawisma/kecamatan/{no_kab}', [UserDasaWismaController::class, 'getKecamatan'])->name('user.dasawisma.kecamatan');
// Route::get('/user/dasawisma/kelurahan/{no_kec}', [UserDasaWismaController::class, 'getKelurahan'])->name('user.dasawisma.kelurahan');

// Route untuk mengambil kabupaten berdasarkan provinsi (jika menggunakan AJAX, tetapi tidak diperlukan dalam permintaan saat ini)
// Route::get('/kabupaten/{no_prop}', [UserDasaWismaController::class, 'getKabupaten']);

// Route untuk mengambil kecamatan berdasarkan kabupaten (jika menggunakan AJAX)
// Route::get('/kecamatan/{no_kab}', [UserDasaWismaController::class, 'getKecamatan']);

// Route untuk mengambil kelurahan berdasarkan kecamatan (jika menggunakan AJAX)
// Route::get('/kelurahan/{no_kec}', [UserDasaWismaController::class, 'getKelurahan']);



use App\Http\Controllers\DawisController;

Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->group(function () {
    // Route untuk CRUD Dawis
    Route::resource('dawis', DawisController::class);
});
Route::resource('dawis', DawisController::class)->names([
    'index' => 'superadmin.dawis.index',
    'create' => 'superadmin.dawis.create',
    'store' => 'superadmin.dawis.store',
    'show' => 'superadmin.dawis.show',
    'edit' => 'superadmin.dawis.edit',
    'update' => 'superadmin.dawis.update',
    'destroy' => 'superadmin.dawis.destroy',
]);




// routes/web.php


Route::get('/welcome', function () {
    return view('welcome'); // Pastikan Anda memiliki view bernama 'welcome.blade.php'
})->name('welcome');
