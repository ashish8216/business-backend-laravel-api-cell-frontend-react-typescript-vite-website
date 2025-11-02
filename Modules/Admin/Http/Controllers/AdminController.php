<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Admin\Models\ProductCategory;
use Modules\Admin\Models\Product;

class AdminController extends Controller
{
    public function dashboard(): View
    {
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

        return view('admin::dashboard', $data);
    }
}
