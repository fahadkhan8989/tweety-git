<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->profile_timeline(),
        ]);
    }

    public function edit(User $user)
    {
        if (auth()->user()->isNot($user)) {
            abort('403');
        }
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        if (auth()->user()->isNot($user)) {
            abort('403');
        }

        $validated = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'bio' => ['string', 'max:255'],
            'avatar' => ['file'],
            'banner' => ['file'],
            'email' => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user)],
            // 'password' => ['string', 'required', 'max:255', 'min:8', 'confirmed'],
        ]);

        if (request('avatar')) {
            $validated['avatar'] = request('avatar')->store('avatars');
        }
        if (request('banner')) {
            $validated['banner'] = request('banner')->store('banners');
        }

        $user->update($validated);

        \Session::flash('profile_updated', 'Your profile has been successfully updated.');


        return redirect(route('profile', $user->username));
    }
}
