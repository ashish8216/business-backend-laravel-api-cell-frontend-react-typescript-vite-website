<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\Models\Slideshow;
use Illuminate\Http\JsonResponse;

class SlideshowController extends Controller
{
    public function  slideshow(): JsonResponse
    {
        $data = [
            'slideshow' => Slideshow::all()
        ];
        return  response()->json([$data]);
    }

    public function index(): View
    {
        $data = [
            'slideshows' => Slideshow::all(),
        ];
        return view('admin::slideshows.index', $data);
    }

    public function edit($id): View
    {
        $data = [
            'slideshow' => Slideshow::findOrFail($id),
        ];
        return view('admin::slideshows.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules());
        $slideshow = Slideshow::findOrFail($id);
        $slideshow->update($this->requiredRules($request));
        return redirect()->route('slideshows.index')
            ->with('success', 'Slideshow Updated Successfully');
    }

    protected function validationRules(): array
    {
        return [
            'image' => 'required',
            'title' => 'required',
            'p' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        return [
            'content' => [
                'image' => $request->image,
                'title' => $request->title,
                'p' => $request->p,
            ],
        ];
    }
}
