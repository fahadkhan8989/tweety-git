<x-master>
    <main class="container">
        <!-- index.blade.php -->
        <div class="row position-relative">

            <!-- sidebar_links -->
            <div class="col-3 col-md-2 h-25">
                @include('sidebar_links')
            </div>

            <!-- timeline -->
            <div class="col-9 col-md-8">
                {{$slot}}
            </div>

            <!-- following_list -->
            <div id="side" class="col-3 col-md-2 p-0">
                @include('following_list')
            </div>
        </div>
    </main>
</x-master>