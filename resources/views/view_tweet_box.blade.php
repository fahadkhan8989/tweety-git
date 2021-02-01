<div class="border rounded-lg">

    @forelse($tweets as $tweet)

    <!-- delete-tweet-component -->
    <x-delete-tweet-button :tweet="$tweet" />
    <!--  -->

    <div class="d-flex border-bottom p-2">
        <div class="">
            <a href="{{route('profile', $tweet->user->username)}}">
                <img src="{{$tweet->user->avatar}}" alt="Avatar" class="rounded-circle" width="50" height="50">
            </a>
        </div>
        <div class="ml-3">
            <a class="text-dark" href="{{route('profile', $tweet->user->username)}}">
                <span style="font-weight: bold;">{{$tweet->user->name}} </span>
            </a>
            <p>{{$tweet->body}}</p>

            @if ($tweet->image)
            <a href="{{$tweet->image}}">
                <img class="w-100" src="{{$tweet->image}}">
            </a>
            @endif
            <!-- like-dislike-component -->
            <x-like-dislike :tweet="$tweet" />
            <!--  -->

        </div>
    </div>
    @empty
    <p class="m-2" style="font-weight: bold; text-align:center; font-size:large">No Tweets Yet!</p>
    @endforelse

    {{$tweets->links()}}
</div>