<div class="d-flex m-2">
    <form action="/tweets/{{$tweet->id}}/like" method="POST">
        @csrf
        <button class="btn btn-link" type="submit">
            <span class="{{$tweet->isLikedBy(auth()->user()) ? 'fas' : 'far'}} fa-thumbs-up">
                {{$tweet ->likes ?: 0}}
            </span>
        </button>
    </form>
    <form action="/tweets/{{$tweet->id}}/like" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-link" type="submit">
            <span class="{{$tweet->isDisLikedBy(auth()->user()) ? 'fas' : 'far'}} fa-thumbs-down">
                {{$tweet ->dislikes ?: 0}}
            </span>
        </button>
    </form>
</div>