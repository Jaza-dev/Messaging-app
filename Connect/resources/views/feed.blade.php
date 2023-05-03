@extends('logged_user_template')

@section('title', 'Connect')

@section('content')
    <br>
    <div class="row justify-content-center">
        <div class="col-6">
            <ul type="none">
                <form action="{{route('search')}}" method="get">
                    <div class="input-group">
                        <input type="text" name="title" class="form-control" placeholder="Search title">
                        <div class="input-group-append">
                            <input class="btn btn-secondary" type="submit" value="Search">
                        </div>
                    </div>
                </form>
                <br>
                @foreach ($all_posts as $post)
                    <li class="p-3  bg-opacity-10 border border-secondary border-start-4 rounded">
                        <h2 class="text-white">{{$post->title}}</h2>
                        <span class="text-white">Posted by: {{$post->username}}</span><br>
                        <span class="text-white">Posted at: {{$post->posted_at}}</span><br><hr class="text-white">
                        <p class="text-white">{{wordwrap($post->text , 20, "\n", true)}}</p>
                        <a href="{{route('like', ['idUser' => auth()->user()->idUser, 'idPost' => $post->idPost])}}" type="button" class="btn btn-success">
                            <span>{{$post->likes}}</span> <i class="bi bi-hand-thumbs-up"></i>
                        </a>
                        <a href="{{route('dislike', ['idUser' => auth()->user()->idUser, 'idPost' => $post->idPost])}}" type="button" class="btn btn-danger">
                            <span>{{$post->dislikes}}</span> <i class="bi bi-hand-thumbs-down"></i>
                        </a>
                    </li><br>
                @endforeach
            </ul>
        </div>
    </div>
@endsection