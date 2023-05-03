@extends('template')

@section('title', 'Login')

@section('content')
<br><h1 class="display-6 text-center text-white">Welcome to Connect</h1><br>
<div class="row justify-content-center">
    <div class="col-4">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required  value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
            <a href="{{route('showRegisterForm')}}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Don't have an account yet?</a><br><br>
            @if (session('status'))
                <p style="color:red">{{session('status')}}</p>
            @endif
            <input type="submit" class="btn btn-secondary" value="Login">
          </form>
    </div>
</div><br><br>
@endsection