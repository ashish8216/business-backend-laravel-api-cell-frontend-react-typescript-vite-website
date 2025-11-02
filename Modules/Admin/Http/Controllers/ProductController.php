<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Modules\Admin\Models\ProductCategory;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\ProductTag;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{

    public function  shop(): JsonResponse
    {
        $data = [
            'shop' => Product::orderBy('name', 'asc')->paginate(21)
        ];
        return  response()->json([$data]);
    }

    public function  product($slug): JsonResponse
    {
        $data = [
            'product' => Product::Where('slug', $slug)->first()
        ];
        return  response()->json([$data]);
    }


    public function productCategories(string $slug): JsonResponse
    {
        $category = ProductCategory::where('slug', $slug)->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Manually attach products collection to category object
        $products = Product::whereRaw("CONCAT(',', category, ',') LIKE ?", ["%,{$category->name},%"])
            ->orderBy('name', 'asc')
            ->get();

        $data = [
            'category' => $category,
            'shop' => $products,
        ];

        return response()->json($data);
    }

    public function productTags(string $slug): JsonResponse
    {
        $tag = ProductTag::where('slug', $slug)->first();

        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        // Match tag in comma-separated string, avoiding partial matches like "tool" vs "tools"
        $products = Product::whereRaw("CONCAT(',', tag, ',') LIKE ?", ["%,{$tag->name},%"])
            ->orderBy('name', 'asc')
            ->get();

        $data = [
            'tag' => $tag,
            'shop' => $products,
        ];

        return response()->json($data);
    }
    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'search' => 'required|string|min:2',
        ]);

        $search = $request->get('search');

        $products = Product::where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('category', 'like', '%' . $search . '%')
                ->orWhere('tag', 'like', '%' . $search . '%');
        })
            ->orderBy('name', 'asc')
            ->limit(20)
            ->get(); // make sure 'slug' is included in each item

        $data = [
            'search' => $search,
            'products' => $products,
        ];

        return response()->json($data);
    }

    public function index(): View
    {
        $data = [
            'products' => Product::orderBy('id', 'desc')->get(),
        ];
        return view('admin::products.index', $data);
    }

    public function create(): View
    {
        $data = [
            'categories' => ProductCategory::all(),
            'tags' => ProductTag::all(),
        ];
        return view('admin::products.create', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        Product::create($this->requiredRules($request));
        return redirect()->route('products.index')
            ->with('success', ' Product  Successfully.');
    }

    public function edit($id): View
    {

        $data = [
            'product' => Product::findOrFail($id),
            'categories' => ProductCategory::all(),
            'tags' => ProductTag::all(),
        ];
        return view('admin::products.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules($id));
        $product = Product::findOrFail($id);
        $product->update($this->requiredRules($request));
        return redirect()->route('products.index')
            ->with('success', 'Products  Updated Successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product  deleted successfully');
    }
    protected function validationRules($id = null): array
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:products,slug' . ($id ? ",$id" : ''),
            'image' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image,
            'video' => $request->video,
            'description' => $request->description,
        ];


        $tags = $request->input('tag');
        $data['tag'] = $tags ? implode(',', $tags) : '';
        $categories = $request->input('category');
        $data['category'] = $tags ? implode(',', $categories) : '';
        return $data;
    }
}
