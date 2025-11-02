<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\SettingController;
use Modules\Admin\Http\Controllers\SlideshowController;
use Modules\Admin\Http\Controllers\UserController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\ProductCategoryController;
use Modules\Admin\Http\Controllers\ProductTagController;

use Modules\Admin\Http\Controllers\ServiceController;
use Modules\Admin\Http\Controllers\DownloadController;
use Modules\Admin\Http\Controllers\ProjectController;
use Modules\Admin\Http\Controllers\FaqController;
use Modules\Admin\Http\Controllers\TeamController;
use Modules\Admin\Http\Controllers\VideoController;
use Modules\Admin\Http\Controllers\ProjectCategoryController;
use Modules\Admin\Http\Controllers\TestimonialController;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\ProductCategory;
use Modules\Admin\Models\ProductTag;
use Modules\Admin\Models\Project;
use Modules\Admin\Models\ProjectCategory;
use Modules\Admin\Models\Service;




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

    Route::get('/admin/Manger', function () {
        return view('admin::Manger');
    });

    Route::get('check_slug2', function () {
        $slug = SlugService::createSlug(Service::class, 'slug', request('title'));
        return response()->json(['slug' => $slug]);
    });

    Route::get('Product_slug', function () {
        $slug = SlugService::createSlug(Product::class, 'slug', request('name'));
        return response()->json(['slug' => $slug]);
    });

    Route::get('Project_slug', function () {
        $slug = SlugService::createSlug(Project::class, 'slug', request('title'));
        return response()->json(['slug' => $slug]);
    });

    Route::get('Project_Category_slug', function () {
        $slug = SlugService::createSlug(ProjectCategory::class, 'slug', request('name'));
        return response()->json(['slug' => $slug]);
    });

    Route::get('Category_slug', function () {
        $slug = SlugService::createSlug(ProductCategory::class, 'slug', request('name'));
        return response()->json(['slug' => $slug]);
    });


    Route::get('Tag_slug', function () {
        $slug = SlugService::createSlug(ProductTag::class, 'slug', request('name'));
        return response()->json(['slug' => $slug]);
    });

    Route::resources([
        'admin/settings' => SettingController::class,
        'admin/profiles' => UserController::class,
        'admin/slideshows' => SlideshowController::class,
        'admin/products' => ProductController::class,
        'admin/product_categories' => ProductCategoryController::class,
        'admin/product_tags' => ProductTagController::class,
        'admin/downloads' => DownloadController::class,
        'admin/faqs' => FaqController::class,
        'admin/teams' => TeamController::class,
        'admin/testimonials' => TestimonialController::class,
        'admin/videos' => VideoController::class,
        'admin/services' => ServiceController::class,
        'admin/projects' => ProjectController::class,
        'admin/project_categories' => ProjectCategoryController::class,
    ]);

    Route::post('admin/downloads/{id}/restore', [DownloadController::class, 'restore'])->name('downloads.restore');
});
