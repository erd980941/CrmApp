<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->update($request->validated());
        return redirect()->route('profile.edit');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Eski şifre yanlış.']);
        }

        $user->password = $request->new_password;
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Password changed successfully.');
    }
}
