<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    public function  video(): JsonResponse
    {
        $data = [
            'video' => Video::orderBy('title', 'desc')->get(),
        ];
        return  response()->json([$data]);
    }
    public function index(): View
    {
        $data = [
            'videos' => Video::orderBy('id', 'desc')->get(),
        ];
        return view('admin::videos.index', $data);
    }

    public function create(): View
    {
        return view('admin::videos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        Video::create($this->requiredRules($request));
        return redirect()->route('videos.index')
            ->with('success', 'Video created  Successfully.');
    }

    public function edit($id): View
    {
        $data = [
            'videos' => Video::findOrFail($id),
        ];
        return view('admin::videos.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules());
        $video = Video::findOrFail($id);
        $video->update($this->requiredRules($request));
        return redirect()->route('videos.index')
            ->with('success', 'Video Updated Successfully');
    }


    public function destroy($id): RedirectResponse
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('videos.index')
            ->with('success', 'Our Video Deleted successfully');
    }
    protected function validationRules(): array
    {
        return [
            'title' => 'required',
            'video' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'title' => $request->title,
            'video' => $request->video,

        ];

        return $data;
    }
}
