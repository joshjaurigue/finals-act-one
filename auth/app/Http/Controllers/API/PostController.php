<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        $posts =  Post::all();
        return response()->json($posts);  
    }

    public function store(Request $request) 
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    public function show($id) 
    {
        return Post::findOrFail($id); 
    }

    public function update(Request $request, $id) 
    {
        $post = Post::findOrFail($id); 
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy($id) 
    {
        Post::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
