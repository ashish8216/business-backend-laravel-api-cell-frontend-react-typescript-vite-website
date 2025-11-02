<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\Models\Faq;

class FaqController extends Controller
{
    public function  faq(): JsonResponse
    {
        $data = [
            'faq' => faq::all(),
        ];
        return  response()->json([$data]);
    }

    public function index(): View
    {
        $data = [
            'faqs' => Faq::orderBy('id', 'desc')->get(),
        ];
        return view('admin::faqs.index', $data);
    }

    public function create(): View
    {
        return view('admin::faqs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        Faq::create($this->requiredRules($request));
        return redirect()->route('faqs.index')
            ->with('success', 'FAQ Created  Successfully.');
    }

    public function edit($id): View
    {
        $data = [
            'faq' => Faq::findOrFail($id),
        ];
        return view('admin::faqs.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules());
        $faq = Faq::findOrFail($id);
        $faq->update($this->requiredRules($request));
        return redirect()->route('faqs.index')
            ->with('success', 'FAQ Updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faqs.index')
            ->with('success', 'FAQ Deleted successfully');
    }
    protected function validationRules(): array
    {
        return [
            'questions' => 'required',
            'answers' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'content' => [
                'questions' => $request->questions,
                'answers' => $request->answers,
            ],
        ];

        return $data;
    }
}
