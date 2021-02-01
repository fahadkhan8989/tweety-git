<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;

class TweetController extends Controller
{
    public function index(User $user)
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
            'user' => $user,
        ]);
    }
    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255',
            'image' => 'sometimes|nullable|file'
        ]);

        if (request('image')) {
            $attributes['image'] = request('image')->store('tweet-images');
        }

        $attributes['user_id'] = auth()->id();

        Tweet::create($attributes);

        // \Session::flash('tweet_posted', 'Tweet has been posted');

        return redirect('/tweets')->with('message', 'Tweet has been posted');
    }

    public function destroy(Tweet $tweet, User $user)
    {
        if (auth()->user()->id != $tweet->user_id) {
            abort('403');
        }
        $tweet->body = request('body');
        $tweet->image = request('image');

        $tweet->delete();

        return back();
    }
}
