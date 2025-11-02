<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class TeamController extends Controller
{
    public function  team(): JsonResponse
    {
        $data = [
            'team' => Team::all(),
        ];
        return  response()->json([$data]);
    }
    public function index(): View
    {
        $data = [
            'teams' => Team::orderBy('id', 'desc')->get(),
        ];
        return view('admin::teams.index', $data);
    }

    public function create(): View
    {
        return view('admin::teams.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules());
        Team::create($this->requiredRules($request));
        return redirect()->route('teams.index')
            ->with('success', 'Team created  Successfully.');
    }

    public function edit($id): View
    {
        $data = [
            'team' => Team::findOrFail($id),
        ];
        return view('admin::teams.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules());
        $team = Team::findOrFail($id);
        $team->update($this->requiredRules($request));
        return redirect()->route('teams.index')
            ->with('success', 'Team Updated Successfully');
    }


    public function destroy($id): RedirectResponse
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('teams.index')
            ->with('success', 'Our Team Deleted successfully');
    }
    protected function validationRules(): array
    {
        return [
            'name' => 'required',
            'post' => 'required',
            'image' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'name' => $request->name,
            'content' => [
                'image' =>  $request->image,
                'post' => $request->post,
            ],
        ];

        return $data;
    }
}
