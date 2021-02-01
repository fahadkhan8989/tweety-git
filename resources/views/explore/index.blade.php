<x-app>
    <h4 style="text-align: center; font-weight:bold">Explore other users</h4>
    @foreach($users as $user)
    <a href="{{route('profile', $user->username)}}">
        <div class="d-flex align-items-center mb-3">
            <img src="{{$user->avatar}}" alt="Avatar" width="60" height="60" class="rounded-circle mr-2">
            <strong class="text-dark" style="font-size: larger">{{'@' . $user->name}}</strong>
        </div>
    </a>
    @endforeach

    {{$users->links()}}
</x-app>