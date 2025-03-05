<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;
use Illuminate\View\View;

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
            'index'          => 'membership',
            'create'         => 'membership.create',
            'edit'           => 'membership.edit',
            'destroy'        => 'membership.destroy',
        ]);

    Route::post('membership/reset-password/{id}', [MembershipController::class, 'reset_password'])->name('membership.reset-password');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
