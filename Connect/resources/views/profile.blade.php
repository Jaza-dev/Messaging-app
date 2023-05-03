@extends('logged_user_template')

@section('title', 'My Profile')

@section('content')
    <br>
    <div class="row justify-content-center">
        <div class="col-6 ">
            <h3 class="text-white text-center">My profile</h3><br>
            <form action="{{route('updateProfile')}}" method="post">
            @csrf
                <table class="table table-bordered align-middle">
                    <tr>
                        <td class="text-white">Username:</td>
                        <td><input type="text" name="username" value="{{ auth()->user()->username }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Email:</td>
                        <td><input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Name:</td>
                        <td><input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Surname:</td>
                        <td><input type="text" name="surname" value="{{ auth()->user()->surname }}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Password:</td>
                        <td><input type="password" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-white">Repeat password:</td>
                        <td><input type="password" name="repeat_password" class="form-control"></td>
                    </tr>
                </table>
                @if (session('profileUpdateSuccess') == 1)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Profile has been successfully updated.
                        {{session(['profileUpdateSuccess' => 0])}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('profileUpdateSuccess') == 2)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error updating password.
                        {{session(['profileUpdateSuccess' => 0])}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <input type="submit" class="btn btn-success" value="Update">
            </form>
        </div>
    </div><br>
@endsection