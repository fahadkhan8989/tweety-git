<x-app>
    <p style="text-align: center; font-size:large; font-weight:bold; background-color:lightblue" class="p-2 rounded"> Edit your profile </p>
    <form action="/profile/{{$user->username}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <strong>Name:</strong>
        <input class="form-control" type="text" name="name" value="{{$user->name}}" required>
        @error('name')
        <p>{{$message}}</p>
        @enderror

        <strong>Username:</strong>
        <input class="form-control" type="text" name="username" value="{{$user->username}}" required>
        @error('username')
        <p>{{$message}}</p>
        @enderror

        <strong>Email:</strong>
        <input class="form-control" type="email" name="email" value="{{$user->email}}" required>
        @error('email')
        <p>{{$message}}</p>
        @enderror

        <strong>Bio:</strong>
        <input class="form-control" type="text" name="bio" value="{{$user->bio}}" required>
        @error('bio')
        <p>{{$message}}</p>
        @enderror

        <strong>Profile Photo:</strong>
        <div class="d-flex">
            <input class="form-control p-1" type="file" name="avatar" value="">
            <img class="rounded-circle" src="{{$user->avatar}}" alt="Your current Avatar" width="100" height="100">
        </div>

        <strong>Profile Cover:</strong>
        <div class="d-flex">
            <input class="form-control p-1" type="file" name="banner" value="">
            <img class="rounded-circle" src="{{$user->banner}}" alt="{{$user->name}}'s Profile Cover" width="100" height="100">
        </div>

        <!-- <strong>Password:</strong>
        <input class="form-control" type="password" name="password">
        @error('password')
        <p>{{$message}}</p>
        @enderror

        <strong>Confirm Password:</strong>
        <input class="form-control" type="password" name="password_confirmation">
        @error('password_confirmation')
        <p>{{$message}}</p>
        @enderror -->

        <a href="{{route('profile', $user->username)}}" style="font-weight:bold;" class="btn mt-2 float-right border" type="submit">Cancel</a>
        <button style="font-weight:bold;" class="btn btn-primary m-2 float-right" type="submit">Update</button>

    </form>
</x-app>