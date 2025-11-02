<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{

    public function  servicesHome(): JsonResponse
    {
        $data = [
            'servicesHome' => Service::orderBy('title', 'asc')->limit(3)->get(),
        ];
        return  response()->json([$data]);
    }
    public function  services(): JsonResponse
    {
        $data = [
            'services' => Service::orderBy('title', 'asc')->get()
        ];
        return  response()->json([$data]);
    }

    public function  service($slug): JsonResponse
    {
        $data = [
            'service' => Service::Where('slug', $slug)->first()
        ];
        return  response()->json([$data]);
    }



    public function index(): View
    {
        $data = [
            'services'  => Service::orderBy('id', 'desc')->get(),
        ];
        return view('admin::services.index', $data);
    }

    public function create(): View
    {
        return view('admin::services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        Service::create($this->requiredRules($request));
        return redirect()->route('services.index')
            ->with('success', 'services created  Successfully.');
    }

    public function edit($id): View
    {
        $data = [
            'service' => Service::findOrFail($id),
        ];
        return view('admin::services.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules($id));
        $service = Service::findOrFail($id);
        $service->update($this->requiredRules($request));
        return redirect()->route('services.index')
            ->with('success', 'Service Updated Successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Our Service deleted successfully');
    }

    protected function validationRules($id = null): array
    {
        return [
            'title' => 'required',
            'slug' => 'required|unique:services,slug' . ($id ? ",$id" : ''),
            'image' => 'required',
            'description' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => [
                'image' => $request->image,
                'description' => $request->description,
            ],
        ];

        return $data;
    }
}
