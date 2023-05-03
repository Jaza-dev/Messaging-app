@extends('template')

@section('title', 'Register')

@section('content')
    <br>
    <h1 class="display-6 text-white text-center">Welcome to Connect</h1><br>
    <div class="row justify-content-center">
        <div class="col-4">
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}" placeholder="Enter username" required>
                    @error('username')
                        <div style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter email" required>
                    <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
                    @error('email')
                        <div style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                    @error('password')
                        <div style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="repeat_password" class="form-label text-white">Repeat password</label>
                    <input type="password" name="repeat_password" class="form-control" id="repeat_password" placeholder="Repeat password" required>
                    @error('password_repeat')
                      <div style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label text-white">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter name" required>
                    @error('name')
                      <div style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label text-white">Surname</label>
                    <input type="text" name="surname" class="form-control" id="surname" value="{{old('surname')}}" placeholder="Enter surname" required>
                    @error('surname')
                      <div style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <a href="{{route('showLoginForm')}}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Already have an account?</a><br><br>
                <input type="submit" class="btn btn-secondary" value="Register">
              </form>
        </div>
    </div><br><br>
@endsection