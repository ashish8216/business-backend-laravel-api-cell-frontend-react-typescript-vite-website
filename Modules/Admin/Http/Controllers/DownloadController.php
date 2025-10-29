<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\Models\Download;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class DownloadController extends Controller
{
    public function  Download(): JsonResponse
    {
        $data = [
            'download' => Download::all()
        ];
        return  response()->json([$data]);
    }


    public function index(): View
    {
        $data = [
            'downloads' => Download::orderBy('id', 'desc')->get(),
        ];
        return view('admin::downloads.index', $data);
    }

    public function create(): View
    {
        return view('admin::downloads.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        Download::create($this->requiredRules($request));
        return redirect()->route('downloads.index')
            ->with('success', ' Download  Successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $download = Download::findOrFail($id);
        $download->delete();
        return redirect()->route('downloads.index')
            ->with('success', ' Download Deleted Successfully.');
    }

    public function restore($id): RedirectResponse
    {
        $download = Download::onlyTrashed()->findOrFail($id);
        $download->restore();
        return redirect()->route('downloads.index.index')
            ->with('success', 'Download Restored Successfully');
    }


    protected function validationRules(): array
    {
        return [
            'title' => 'required',
            'pdf' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        return [
            'content' => [
                'title' => $request->title,
                'pdf' => $request->pdf,
            ],
        ];
    }
}
