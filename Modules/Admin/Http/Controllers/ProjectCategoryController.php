<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Models\ProjectCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Modules\Admin\Models\project;

class ProjectCategoryController extends Controller
{
  public function categories(): JsonResponse
  {
    $categories = ProjectCategory::all()->map(function ($category) {
      $category->item = project::whereRaw("CONCAT(',', category, ',') LIKE ?", ["%,{$category->name},%"])->count();
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
      'project_categories' => ProjectCategory::orderBy('id', 'desc')->get(),
    ];
    return view('admin::project_categories.index', $data);
  }

  public function create(): View
  {
    $data = [
      'categories' => ProjectCategory::orderBy('name')->get(),
    ];
    return view('admin::project_categories.create', $data);
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate($this->validationRules());
    ProjectCategory::create($this->requiredRules($request));
    return redirect()->route('project_categories.index')
      ->with('success', 'project Category  Successfully.');
  }

  public function edit($id): View
  {
    $data = [
      'project_category' => ProjectCategory::findOrFail($id),
    ];
    return view('admin::project_categories.edit', $data);
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $request->validate($this->validationRules($id));
    $project_category = ProjectCategory::findOrFail($id);
    $project_category->update($this->requiredRules($request));
    return redirect()->route('project_categories.index')
      ->with('success', 'projects Category Updated Successfully');
  }

  protected function validationRules($id = null): array
  {
    return [
      'name' => 'required',
      'slug' => 'required|unique:project_categories,slug' . ($id ? ",$id" : ''),
    ];
  }

  protected function requiredRules(Request $request): array
  {
    return [
      'name' => $request->name,
      'slug' => $request->slug,
    ];
  }
}
