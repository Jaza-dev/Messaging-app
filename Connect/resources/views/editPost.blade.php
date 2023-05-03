@extends('logged_user_template')

@section('title', 'Edit Post')

@section('content')
    <br>
    <div class="row justify-content-center">
        <div class="col-6 mb-3">
            <h3 class="text-white text-center">Edit post</h3>
            <form action="{{route('editPost')}}" method="get">
                <input type="hidden" name="idPost" value="{{$post->idPost}}">
                <input type="hidden" name="idUser" value="{{auth()->user()->idUser}}">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input id="title" class="form-control" type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text</label>
                    <textarea id="text" name="text" class="form-control" cols="23" rows="10">{{$post->text}}</textarea>
                </div>
                <input class="btn btn-success" type="submit" value="Edit">
            </form>
        </div>
    </div class="row">
@endsection