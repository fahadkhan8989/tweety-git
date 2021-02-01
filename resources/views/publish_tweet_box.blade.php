@if(Session::has('message'))
<div class="conatiner alert alert-info alert-dismissible successMessage">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('message')}}
</div>
@endif
<div class="border rounded-lg p-2 mb-2">
    <form action="/tweets" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea id="textbox" onkeyup="charcountupdate(this.value)" class="form-control" rows="4" name="body" id="body" placeholder="What's Happening?" required></textarea>



        <div>
            <input class="form-control p-1 mt-2" type="file" name="image">
            <span class="float-right mt-2" id=charcount>0 / 280</span>
            <br>
        </div>
        @error('body')
        <span style="color: red; font-size:small">{{$message}}</span>
        @enderror
        <hr>


        <footer class="d-flex justify-content-between">
            <a href="{{route('profile', auth()->user()->username)}}">
                <img src="{{auth()->user()->avatar}}" alt="Avatar" class="rounded-circle" width="40" height="40">
            </a>
            <button style="background-color: skyblue; color:white; font-weight:bold;" class="btn rounded-pill shadow px-4" type="submit">Tweet</button>
        </footer>
    </form>
</div>

<script>
    function charcountupdate(str) {
        var lng = str.length;
        document.getElementById("charcount").innerHTML = lng + ' / 280';
    }
</script>