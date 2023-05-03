<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use App\Models\RatingModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    public function showFeed(){
        $all_posts = PostModel::join('user', 'user.idUser', '=', 'post.idUser')->orderBy('posted_at','desc')->get();
        return view('feed', ['all_posts' => $all_posts]);
    }

    public function showCreateNewPostForm(){
        return view('createNewPostForm');
    }

    public function showEditPostForm($idPost){
        $post = PostModel::where('idPost', $idPost)->first();
        return view('editPost', ['post' => $post]);
    }

    public function createNewPost(Request $request){
        PostModel::insert([
            'title' => $request->title,
            'text' => $request->text,
            'posted_at' => now(),
            'idUser' => $request->idUser,
            'likes' => 0,
            'dislikes' => 0
        ]);
        return redirect()->route('showFeed');
    }

    public function showMyPosts($id){
        $myPosts = PostModel::where('idUser', $id)->orderBy('posted_at', 'desc')->get();
        return view('myPosts', ['myPosts' => $myPosts]);
    }

    public function deletePost($idPost, $idUser){
        PostModel::where('idPost', $idPost)->delete();
        $myPosts = PostModel::where('idUser', $idUser)->orderBy('posted_at', 'desc')->get();
        return redirect()->route('showMyPosts', ['id' => $idUser]);
    }

    public function editPost(Request $request){
        PostModel::where('idPost', $request->idPost)->update([
            'title' => $request->title,
            'text' => $request->text,
            'updated_at' => now()
        ]);
        return redirect()->route('showMyPosts', ['id' => $request->idUser]);
    }

    public function like($idUser, $idPost){
        $rating = RatingModel::where('idUser', $idUser)->where('idPost', $idPost)->first();
        if($rating == null){
            RatingModel::insert([
                'idPost' => $idPost,
                'idUser' => $idUser,
                'created_at' => now(),
                'like' => 1
            ]);
            PostModel::where('idPost', $idPost)->increment('likes');
        }else{
            if($rating->like == -1){
                RatingModel::where('idUser', $idUser)->where('idPost', $idPost)->update([
                    'like' => 1
                ]);
                PostModel::where('idPost', $idPost)->increment('likes');
                PostModel::where('idPost', $idPost)->decrement('dislikes');
            }
        }
        return redirect()->route('showFeed');
    }

    public function dislike($idUser, $idPost){
        $rating = RatingModel::where('idUser', $idUser)->where('idPost', $idPost)->first();
        if($rating == null){
            RatingModel::insert([
                'idPost' => $idPost,
                'idUser' => $idUser,
                'created_at' => now(),
                'like' => -1
            ]);
            PostModel::where('idPost', $idPost)->increment('dislikes');
        }else{
            if($rating->like == 1){
                RatingModel::where('idUser', $idUser)->where('idPost', $idPost)->update([
                    'like' => -1
                ]);
                PostModel::where('idPost', $idPost)->increment('dislikes');
                PostModel::where('idPost', $idPost)->decrement('likes');
            }
        }
        return redirect()->route('showFeed');
    }

    public function search(Request $request){
        $all_posts = PostModel::where('title', 'like', "%$request->title%")->join('user', 'user.idUser', '=', 'post.idUser')->orderBy('posted_at','desc')->get();
        return view('feed', ['all_posts' => $all_posts]);
    }
}
