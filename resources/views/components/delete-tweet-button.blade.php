@if(auth()->user()->id === $tweet->user_id)

<div class="dropleft float-right">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"> </button>
    <div class="dropdown-menu">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
            Delete
        </button>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Are you sure you want to delete this tweet?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form method="POST" action="{{ route('delete-tweet', $tweet->id ) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@endif