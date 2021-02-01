<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follow($user);

        \Session::flash('follow_alert', 'You are now following this user');

        return back();
    }

    public function destroy(User $user)
    {
        auth()->user()->unfollow($user);

        \Session::flash('follow_alert', 'You have unfolloweded this user');

        return back();
    }
}
