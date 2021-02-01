<hr>
<div class="p-2 rounded-lg">
    <ul class="p-0" style="list-style:none;">
        <p class="pl-2" style="font-size:large; text-align:center;font-weight: bold;">Following</p>
        @forelse(auth()->user()->follows as $user)
        <li>
            <div class="d-flex align-items-center {{$loop->last ? '' : 'mb-4'}} text-decoration-none">
                <a href="{{route('profile', $user->username)}}">
                    <img src="{{$user->avatar}}" alt="Avatar" class="rounded-circle mr-2" width="40" height="40">
                </a>
                <a href="{{route('profile', $user->username)}}">
                    <span class="text-dark"> {{$user->name}} </span>
                </a>
            </div>
        </li>
        @empty
        <p class="mt-2" style="font-weight: bold; text-align:center">You are not following anyone!</p>
        @endforelse
    </ul>
</div>