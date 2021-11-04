<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Mon super titre';
        $title2 = 'Deuxiem super titre';

        $posts = Post::all();
        //return view('articles', compact('title'));
        //return view('articles')->with('title', $title);

        /*
        $post = Post::find(1);
        $post->delete();
        */

        return view('articles', [
            'title' => $title,
            'title2' => $title2,
            'posts' => $posts
        ]);
    }

    public function show($id)
    {

        $post = Post::findOrFail($id);

        //$post = Post::where('titre', '=','bblablabla')->firstOrFail();


/*
        $posts = [
            1 => 'Mon titre 1',
            2 => 'Mon titre 2'
        ];*/

        //$post = $posts[$id] ?? 'pas de titre';

        return view('article', [
            'post' => $post
        ]);
    }

    public function contact(){
        return view('contact');
    }

    public function create(){
        return view('form');
    }

    public function store(Request $request){
        /*$post =  new Post();
        $post->title =  $request->title;
        $post->content = $request->content;
        $post->save();*/

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        dd('Post créé !');
    }

    public function register(){
        $post = Post::find(10);
        $video = Video::find(1);

        $comment1 = new Comment(['content' => 'Mon premier commetaire']);
        $comment2 = new Comment(['content' => 'Mon deuxiem commetaire']);

        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);

        $comment3 = new Comment(['content' => 'Mon troisieme commetaire']);

        $video->comments()->save($comment3);
    }
}
