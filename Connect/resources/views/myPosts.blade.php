@extends('logged_user_template')

@section('title', 'My Posts')

@section('content')
    <br>
    <div class="row justify-content-center">
        <div class="col-6">
            <ul type="none">
                <h3 class="text-white text-center">My posts</h3><br>
                @foreach ($myPosts as $post)
                    <li class="p-3 bg-opacity-10 border border-secondary border-start-4 rounded">
                        <h2 class="text-white">{{$post->title}}</h2>
                        <span class="text-white">Posted by: {{auth()->user()->username}}</span><br>
                        <span class="text-white">Posted at: {{$post->posted_at}}</span><br><hr>
                        <p class="text-white">{{wordwrap($post->text , 20, "\n", true)}}</p><hr class="text-white">
                        <span class="text-white">Likes:</span> <span class="text-white">{{$post->likes}}</span><br>
                        <span class="text-white">Dislikes:</span> <span class="text-white">{{$post->dislikes}}</span><br><br>
                        <a href="{{route('showEditPostForm', ['idPost' => $post->idPost])}}" class="btn btn-warning"><i class="bi bi-gear"></i> Edit</a>
                        <a href="{{route('deletePost', ['idPost' => $post->idPost, 'idUser' => $post->idUser])}}" class="btn btn-danger position-relative"><i class="bi bi-trash"></i></a>
                    </li><br>
                @endforeach
            </ul>
        </div>
    </div>
@endsection