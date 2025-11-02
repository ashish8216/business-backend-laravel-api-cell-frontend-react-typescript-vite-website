<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Models\ProductTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ProductTagController extends Controller
{

    public function tag(): JsonResponse
    {
        $data = [
            'tag' => ProductTag::all(),
        ];
        return response()->json($data);
    }

    public function index(): View
    {
        $data = [
            'product_tags' => ProductTag::orderBy('id', 'desc')->get(),
        ];
        return view('admin::product_tags.index', $data);
    }

    public function create(): View
    {
        return view('admin::product_tags.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        ProductTag::create($this->requiredRules($request));
        return redirect()->route('product_tags.index')
            ->with('success', ' Product Tag Successfully.');
    }

    public function edit($id): View
    {
        $data = [
            'product_tag' => ProductTag::findOrFail($id),
        ];
        return view('admin::product_tags.edit', $data);
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules($id));
        $product_tag = ProductTag::findOrFail($id);
        $product_tag->update($this->requiredRules($request));
        return redirect()->route('product_tags.index')
            ->with('success', 'Products tag Updated Successfully');
    }

    protected function validationRules($id = null): array
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:product_tags,slug' . ($id ? ",$id" : ''),
            'image' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        return [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image,
        ];
    }
}
