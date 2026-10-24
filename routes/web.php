<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\NewsPostController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Site\AgendaController as SiteAgendaController;
use App\Http\Controllers\Site\ContactController as SiteContactController;
use App\Http\Controllers\Site\DonationController as SiteDonationController;
use App\Http\Controllers\Site\GalleryController as SiteGalleryController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\NewsController as SiteNewsController;
use App\Http\Controllers\Site\ProgramController as SiteProgramController;
use App\Http\Controllers\Site\SearchController as SiteSearchController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/tentang', 'pages.tentang')->name('tentang');
Route::get('/program', [SiteProgramController::class, 'index'])->name('program');
Route::get('/program/{program:slug}', [SiteProgramController::class, 'show'])->name('program.show');
Route::get('/berita', [SiteNewsController::class, 'index'])->name('berita');
Route::get('/berita/{newsPost:slug}', [SiteNewsController::class, 'show'])->name('berita.show');
Route::get('/galeri', [SiteGalleryController::class, 'index'])->name('galeri');
Route::get('/galeri/{category}', [SiteGalleryController::class, 'show'])->name('galeri.show');
Route::get('/donasi', [SiteDonationController::class, 'index'])->name('donasi');
Route::post('/donasi', [SiteDonationController::class, 'store'])->name('donasi.store');
Route::get('/agenda', [SiteAgendaController::class, 'index'])->name('agenda');
Route::get('/kontak', [SiteContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [SiteContactController::class, 'store'])->name('kontak.store');
Route::get('/pencarian', [SiteSearchController::class, 'index'])->name('pencarian');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
	Route::resource('news-posts', NewsPostController::class);
	Route::resource('programs', ProgramController::class);
	Route::resource('agendas', AgendaController::class);
	Route::resource('gallery-items', GalleryItemController::class);
	Route::resource('donations', DonationController::class);
	Route::resource('contact-messages', ContactMessageController::class);
});
