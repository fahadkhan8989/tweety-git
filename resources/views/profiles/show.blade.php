<x-app>
    <!-- Profile Page -->
    @if(Session::has('profile_updated'))
    <div class="conatiner alert alert-info alert-dismissible successMessage">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session::get('profile_updated')}}
    </div>
    @endif
    @if(Session::has('follow_alert'))
    <div class="conatiner alert alert-info alert-dismissible successMessage">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session::get('follow_alert')}}
    </div>
    @endif

    <header class="mb-4 position-relative">
        <img class="w-100 rounded-lg" src="{{$user->banner}}" alt="profile banner" height="240">
        <a href="{{$user->avatar}}">
            <img id="dp" src="{{$user->avatar}}" alt="Your Avatar" class="rounded-circle">
        </a>

        <div class="d-flex justify-content-between my-3">

            <div style="max-width: 270px;">
                <h3 class="mb-0" style="font-weight:bold;">{{$user->name}}</h3>
                <span>Joined {{$user->created_at->diffForHumans()}}</span>
            </div>

            <div class="d-flex">
                @if(auth()->user()->is($user))
                <div>
                    <a href="/profile/{{$user->username}}/edit" style="background-color:white; color:black; font-weight:bold" class="btn rounded-pill shadow border">Edit Profile</a>
                </div>
                @endif

                <!-- Follow and Unfollow Form -->
                <x-follow-form :user="$user"></x-follow-form>
                <!--  -->

            </div>
        </div>


        @if($user->bio === null && auth()->user()->is($user))
        <p style="text-align: center; font-size:larger; font-weight:bold">Go to Edit Profile to add your bio here!</p>
        @else
        <p style="font-size:small">{{$user->bio}}</p>
        @endif

    </header>

    @include('view_tweet_box',[
    'tweets' => $tweets
    ])

</x-app>