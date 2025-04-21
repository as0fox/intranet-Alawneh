<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LeaderboardController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\QuickLinkController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\CurrencySettingController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts/search', [ContactUserController::class, 'search'])->name('contacts.search');
Route::get('/contacts', [ContactController::class, 'index1'])->name('contacts.index');
Route::get('/documents', [DocumentController::class, 'publicIndex'])->name('documents.index');
Route::get('/events/{event}', [EventUserController::class, 'show'])->name('events.show');
Route::post('/events/{event}/rsvp', [EventUserController::class, 'rsvp'])->name('events.rsvp');
Route::post('/invitations/{invitation}/decline', [InvitationController::class, 'decline'])->name('invitations.decline');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Site Settings
    Route::get('/settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
    
    // Navigation
    Route::resource('navigations', NavigationController::class)->except(['show']);
    
    // Events
    Route::resource('events', EventController::class)->except(['show']);
    
    // Documents
    Route::resource('documents', DocumentController::class)->except(['show']);
    
    // Contacts
    Route::resource('contacts', ContactController::class)->except(['show']);
    
    // Leaderboard
    Route::resource('leaderboards', LeaderboardController::class)->except(['show']);
    
    // Invitations
    Route::resource('invitations', InvitationController::class)->except(['show']);
    
    // Quick Links
    Route::resource('quick-links', QuickLinkController::class)->except(['show']);
    
    // Announcements
    Route::resource('announcements', AnnouncementController::class)->except(['show']);
    
    // Currency Settings
    Route::resource('currency-settings', CurrencySettingController::class)->except(['show', 'create', 'store', 'destroy']);
});

require __DIR__.'/auth.php';