<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use Modules\Admin\Models\ProductCategory;
use Modules\Admin\Models\Product;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', function () {
    return view('livewire.auth.login');
})->name('home');

Route::get('dashboard', function () {
    $productCategory = ProductCategory::all();

    // Prepare chart data
    $chartData = $productCategory->map(function ($category) {
        return [
            'y' => Product::where('category', $category->slug)->count(),
            'label' => $category->name,
        ];
    });

    $data = [
        'productCategory' => $productCategory,
        'productCount' => Product::count(),
        'chartData' => $chartData,
    ];

    return view('dashboard', $data);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
