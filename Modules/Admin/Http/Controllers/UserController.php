<?php

namespace Modules\Admin\Http\Controllers;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): View
    {
        $data = [
            'users' => User::all(),
        ];
        return view('admin::profiles.index', $data);
    }

    public function edit($id): View
    {
        $data = [
            'user' => User::findOrFail($id),
        ];
        return view('admin::profiles.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules($id));

        $user = User::findOrFail($id);
        $user->update($this->requiredRules($request));

        return redirect()->route('dashboard')
            ->with('success', 'Profile updated and logged in.');
    }

    protected function validationRules($id = null): array
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ];

        if (request()->filled('password')) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        return $rules;
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        return $data;
    }
}
