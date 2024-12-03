<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $this->authorize('edit', Setting::class);
        $settings = Setting::all();
        return view('settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->authorize('edit',  Setting::class);
        foreach ($request->except('_token') as $key => $value) {
            Setting::setValue($key, $value);
        }

        return redirect()->route('settings.edit')->with('success', 'Settings updated successfully.');
    }
}
