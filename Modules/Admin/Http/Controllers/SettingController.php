<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Admin\Models\Setting;



class SettingController extends Controller
{
    public function  setting(): JsonResponse
    {
        $data = [
            'setting' => Setting::all()
        ];
        return  response()->json([$data]);
    }

    public function edit($id): View
    {
        $data = [
            'setting' => Setting::findOrFail($id),
        ];
        return view('admin::settings.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate($this->validationRules());
        $setting = Setting::findOrFail($id);
        $setting->update($this->requiredRules($request));
        return redirect()->back()->with('success', 'Setting updated successfully');
    }

    protected function validationRules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'mobile_number' => 'required',
            'working_hour' => 'required',
            'google_maps' => 'required',
            'address' => 'required',
        ];
    }

    protected function requiredRules(Request $request): array
    {
        $data = [
            'content' => [
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $request->logo,
                'mobile_number' => $request->mobile_number,
                'working_hour' => $request->working_hour,
                'google_maps' => $request->google_maps,
                'address' => $request->address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
            ],
        ];

        return $data;
    }
}
