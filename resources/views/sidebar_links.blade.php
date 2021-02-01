<ul id="sidebar" class="p-0" style="list-style:none; font-size: large; max-height:max-content">

    <li class="pb-2">
        <a class=" text-decoration-none text-dark font-weight-bold" href="/tweets">
            Home
        </a>
    </li>

    <li class="py-2">
        <a class="text-decoration-none text-dark font-weight-bold" href="{{ route('developer') }}">
            Developer's Message
        </a>
    </li>

    <li class="py-2">
        <a class="text-decoration-none text-dark font-weight-bold" href="/explore">
            Explore
        </a>
    </li>

    <li class="py-2">
        <a class="text-decoration-none text-dark font-weight-bold" href="{{route('profile', auth()->user()->username)}}">
            Profile
        </a>
    </li>

    <li class="py-2">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-lg p-0 text-decoration-none text-dark font-weight-bold">Logout</button>
        </form>
    </li>

</ul>

<!-- collapsible -->
<!-- <span id="open" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<ul id="mySidenav" class="p-0 ml-2 sidenav" style="list-style:none; font-size: large;">
    <a href="" class="close" onclick="closeNav()">&times;</a>

    <li class="pb-2">
        <a class=" text-decoration-none text-dark font-weight-bold" href="/tweets">
            Home
        </a>
    </li>

    <li class="py-2">
        <a class="text-decoration-none text-dark font-weight-bold" href="#">
            Developer's Profile
        </a>
    </li>

    <li class="py-2">
        <a class="text-decoration-none text-dark font-weight-bold" href="/explore">
            Explore
        </a>
    </li>

    <li class="py-2">
        <a class="text-decoration-none text-dark font-weight-bold" href="{{route('profile', auth()->user()->username)}}">
            Profile
        </a>
    </li>

    <li class="py-2">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-lg text-decoration-none text-dark font-weight-bold">Logout</button>
        </form>
    </li>

</ul>
<!--  -->
<!-- <script>
    if ($(window).width() <= 480) {
        $('#sidebar').hide();

    } else if ($(window).width() >= 480) {
        $('#sidebar').show();
    };

    if ($(window).width() >= 480) {
        $('#open').hide();

    }

    if ($(window).width() <= 480) {
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
    } else if ($(window).width() >= 480) {
        function closeNav() {
            document.getElementById("mySidenav").hide().style.width = "0";
            document.getElementById("main").hide().style.marginLeft = "0";
        }
    };
</script> -->