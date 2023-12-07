<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class PostController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('created_at', 'DESC')->get();
  
        return view('posts.index', compact('post'));
    }
    
    public function homeIndex()
    {
        $homePost = Post::orderBy('created_at', 'DESC')->get();
  
        return view('home', compact('homePost'));
    }

    public function single(string $id)
    {
        $singlePost = Post::findOrFail($id);
  
        return view('single', compact('singlePost'));
    }

    public function create()
    {
        return view('posts.create');
    }
  
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|min:10|max:255',
            'content' => 'required|min:50|max:5000'
        ])->validate();

        Post::create($request->all());
 
        return redirect()->route('posts')->with('success', 'Post created successfully');
    }
      
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
  
        return view('posts.show', compact('post'));
    }
      
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
  
        return view('posts.edit', compact('post'));
    }
      
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'title' => 'required|min:10|max:255',
            'content' => 'required|min:50|max:5000'
        ])->validate();

        $post = Post::findOrFail($id);
  
        $post->update($request->all());
  
        return redirect()->route('posts')->with('success', 'Post updated successfully');
    }
      
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
  
        $post->delete();
  
        return redirect()->route('posts')->with('success', 'Post deleted successfully');
    }
}