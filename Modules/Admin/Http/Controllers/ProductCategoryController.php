<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Modules\Admin\Models\Product;

class ProductCategoryController extends Controller
{
    public function categories(): JsonResponse
    {
        $categories = ProductCategory::all()->map(function ($category) {
            $category->item = Product::whereRaw("CONCAT(',', category, ',') LIKE ?", ["%,{$category->name},%"])->count();
            return $category;
        });
        $data = [
            'categories' => $categories
        ];
        return response()->json($data);
    }

    public function index(): View
    {
        $data = [
            'product_categories' => ProductCategory::orderBy('id', 'desc')->get(),
        ];
        return view('admin::product_categories.index', $data);
    }

    public function create(): View
    {
        $data = [
            'categories' => ProductCategory::orderBy('name')->get(),
        ];
        return view('admin::product_categories.create', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        ProductCategory::create($this->requiredRules($request));
        return redirect()->route('product_categories.index')
            ->with('success', 'Product Category  Successfully.');
    }

    public function edit($id): View
    {
        $data = [
            'product_categories' => ProductCategory::findOrFail($id),
            'categories' => ProductCategory::orderBy('name')->get(),
        ];
        return view('admin::product_categories.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules($id));
        $product_categories = ProductCategory::findOrFail($id);
        $product_categories->update($this->requiredRules($request));
        return redirect()->route('product_categories.index')
            ->with('success', 'Products Category Updated Successfully');
    }

    protected function validationRules($id = null): array
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:product_categories,slug' . ($id ? ",$id" : ''),
            'image' => 'required',
            'parentId' => 'nullable|exists:product_categories,id',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        return [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image,
            'parentId' => $request->parentId,
        ];
    }
}
