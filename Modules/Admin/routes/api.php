<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\ProductCategoryController;
use Modules\Admin\Http\Controllers\ProductTagController;
use Modules\Admin\Http\Controllers\SettingController;
use Modules\Admin\Http\Controllers\SlideshowController;
use Modules\Admin\Http\Controllers\DownloadController;
use Modules\Admin\Http\Controllers\FaqController;
use Modules\Admin\Http\Controllers\TeamController;
use Modules\Admin\Http\Controllers\VideoController;
use Modules\Admin\Http\Controllers\TestimonialController;
use Modules\Admin\Http\Controllers\ServiceController;


Route::get('setting', [SettingController::class, 'setting'])->name('setting');
Route::get('download', [DownloadController::class, 'download'])->name('download');
Route::get('slideshow', [SlideshowController::class, 'slideshow'])->name('slideshow');
Route::get('categories', [ProductCategoryController::class, 'categories'])->name('categories');
Route::get('tag', [ProductTagController::class, 'tag'])->name('tag');
Route::get('shop', [ProductController::class, 'shop'])->name('shop');
Route::get('product/{slug}', [ProductController::class, 'product'])->name('product');
Route::get('productCategories/{slug}', [ProductController::class, 'productCategories'])->name('productCategories');
Route::get('productTags/{slug}', [ProductController::class, 'productTags'])->name('productTags');
Route::get('search', [ProductController::class, 'search'])->name('search.q');
Route::get('faq', [FaqController::class, 'faq'])->name('faq');
Route::get('team', [TeamController::class, 'team'])->name('team');
Route::get('video', [VideoController::class, 'video'])->name('video');
Route::get('testimonial', [TestimonialController::class, 'testimonial'])->name('testimonial');
Route::get('services', [ServiceController::class, 'services'])->name('services');
Route::get('servicesHome', [ServiceController::class, 'servicesHome'])->name('servicesHome');
Route::get('service/{slug}', [ServiceController::class, 'service'])->name('service');
Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('admins', AdminController::class)->names('admin');
});
