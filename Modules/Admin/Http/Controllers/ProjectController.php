<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Modules\Admin\Models\ProjectCategory;

class ProjectController extends Controller
{

  public function  Projects(): JsonResponse
  {
    $data = [
      'projects' => Project::orderBy('title', 'asc')->get(),
    ];
    return  response()->json([$data]);
  }

  public function  Project($slug): JsonResponse
  {
    $data = [
      'project' => Project::Where('slug', $slug)->first()
    ];
    return  response()->json([$data]);
  }


  public function index(): View
  {
    $data = [
      'projects'  => Project::orderBy('id', 'desc')->get(),
    ];
    return view('admin::projects.index', $data);
  }

  public function create(): View
  {
    $data = [
      'categories' => ProjectCategory::all(),
    ];
    return view('admin::projects.create', $data);
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate($this->validationRules());
    Project::create($this->requiredRules($request));
    return redirect()->route('projects.index')
      ->with('success', 'Projects created  Successfully.');
  }

  public function edit($id): View
  {
    $data = [
      'project' => Project::findOrFail($id),
      'categories' => ProjectCategory::all(),
    ];
    return view('admin::projects.edit', $data);
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $request->validate($this->validationRules($id));
    $project = Project::findOrFail($id);
    $project->update($this->requiredRules($request));
    return redirect()->route('projects.index')
      ->with('success', 'Project Updated Successfully');
  }

  public function destroy($id): RedirectResponse
  {
    $project = Project::findOrFail($id);
    $project->delete();

    return redirect()->route('projects.index')
      ->with('success', 'Our Project deleted successfully');
  }

  protected function validationRules($id = null): array
  {
    return [
      'title' => 'required',
      'slug' => 'required|unique:projects,slug' . ($id ? ",$id" : ''),
      'category' => 'required',
      'image' => 'required',
      'description' => 'required',
    ];
  }

  protected function requiredRules(Request $request): array
  {
    $data = [
      'title' => $request->title,
      'slug' => $request->slug,
      'category' => $request->category,
      'content' => [
        'image' => $request->image,
        'image1' => $request->image1,
        'image2' => $request->image2,
        'image3' => $request->image3,
        'description' => $request->description,
        'area' => $request->area,
        'location' => $request->location,
        'year' => $request->year,
      ],
    ];

    return $data;
  }
}
