<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\Models\Testimonial;


class TestimonialController extends Controller
{

    public function  testimonial(): JsonResponse
    {
        $data = [
            'testimonial' => Testimonial::all(),
        ];
        return  response()->json([$data]);
    }

    public function index(): View
    {
        $data = [
            'testimonials' => Testimonial::orderBy('id', 'desc')->get(),
        ];

        return view('admin::testimonials.index', $data);
    }


    public function create(): View
    {
        return view('admin::testimonials.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        Testimonial::create($this->requiredRules($request));
        return redirect()->route('testimonials.index')
            ->with('success', ' Testimonial  Successfully.');
    }

    public function edit($id): View
    {
        $data = [
            'testimonial' => Testimonial::findOrFail($id),
        ];

        return view('admin::testimonials.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules());
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update($this->requiredRules($request));
        return redirect()->route('testimonials.index')
            ->with('success', 'testimonial  Updated Successfully');
    }


    public function destroy($id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonials deleted successfully');
    }

    protected function validationRules(): array
    {
        return [
            'title' => 'required',
            'image' =>  'required',
            'name' => 'required',
            'desction' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'content' => [
                'title' => $request->title,
                'image' => $request->image,
                'name' => $request->name,
                'desction' => $request->desction,
            ],
        ];
        return $data;
    }
}
