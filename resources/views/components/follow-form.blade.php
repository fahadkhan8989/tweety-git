@if(auth()->user()->isNot($user))
<div>
    @if(auth()->user()->following($user))
    <form action="/profile/{{$user->username}}/unfollow" method="POST">
        @csrf
        @method('DELETE')
        <button href="#" style="background-color: skyblue; color:white; font-weight:bold" class="btn rounded-pill shadow border">
            Unfollow
        </button>
    </form>
    @else
    <form action="/profile/{{$user->username}}/follow" method="POST">
        @csrf
        <button href="#" style="background-color: skyblue; color:white; font-weight:bold" class="btn rounded-pill shadow border">
            Follow
        </button>
    </form>
    @endif
</div>
@endif