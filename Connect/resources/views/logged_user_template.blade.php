@extends('template')

@section('header')
    <div class="row sticky-top">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('showFeed')}}">
                    <i class="bi bi-c-square"></i>
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="{{route('showFeed')}}" class="nav-link active">Feed</a></li>
                    <li class="nav-item"><a href="{{route('showCreateNewPostForm')}}" class="nav-link active">Create new post</a></li>
                    <li class="nav-item"><a href="{{route('showMyPosts', ['id' => auth()->user()->idUser])}}" class="nav-link active">My posts</a></li>
                </ul>
                
                <span class="text-white dropdown form-inline my-2 my-lg-0">
                    <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ auth()->user()->name }} {{ auth()->user()->surname }}&emsp;
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('myProfile')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </span>
            </div>
        </nav>
        
    </div>
@endsection