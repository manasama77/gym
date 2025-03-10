<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\ManageAdminController;
use Illuminate\View\View;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GymPackageController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\LogMembershipController;

Route::get('/', function (): View {
    return view('welcome');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('membership', MembershipController::class)
        ->only([
            'index',
            'create',
            'edit',
            'destroy',
        ])
        ->names([
            'index' => 'membership',
            'create' => 'membership.create',
            'edit' => 'membership.edit',
            'destroy' => 'membership.destroy',
        ]);
    Route::post('membership/reset-password/{id}', [MembershipController::class, 'reset_password'])->name('membership.reset-password');

    Route::resource('extend-membership', LogMembershipController::class)
        ->only([
            'index',
            'create',
            'store',
        ])
        ->names([
            'index' => 'extend-membership',
            'create' => 'extend-membership.create',
            'store' => 'extend-membership.store',
        ]);
    Route::post('extend-membership/proses_approve_reject/{id}/{type}', [LogMembershipController::class, 'proses_approve_reject'])->name('membership.proses_approve_reject');

    Route::get('manage-admin', [ManageAdminController::class, 'index'])->name('manage-admin');
    Route::get('manage-admin/create', [ManageAdminController::class, 'create'])->name('manage-admin.create');
    Route::get('manage-admin/edit/{user}', [ManageAdminController::class, 'edit'])->name('manage-admin.edit');
    Route::delete('manage-admin/destroy/{user}', [ManageAdminController::class, 'destroy'])->name('manage-admin.destroy');

    Route::get('manage-paket', [GymPackageController::class, 'index'])->name('manage-paket');
    Route::get('manage-paket/create', [GymPackageController::class, 'create'])->name('manage-paket.create');
    Route::get('manage-paket/edit/{gym_package}', [GymPackageController::class, 'edit'])->name('manage-paket.edit');
    Route::delete('manage-paket/destroy/{gym_package}', [GymPackageController::class, 'destroy'])->name('manage-paket.destroy');

    Route::get('manage-carousel', [CarouselController::class, 'index'])->name('manage-carousel');
    Route::get('manage-carousel/create', [CarouselController::class, 'create'])->name('manage-carousel.create');
    Route::get('manage-carousel/edit/{carousel}', [CarouselController::class, 'edit'])->name('manage-carousel.edit');
    Route::delete('manage-carousel/destroy/{carousel}', [CarouselController::class, 'destroy'])->name('manage-carousel.destroy');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
