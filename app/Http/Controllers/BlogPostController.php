<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()  ////Fetch all blog posts and displaying them
    {
        $posts = BlogPost::all();
        return view('blog.index', compact('posts'));
    }

    public function create() //create a new post.
    {
        return view('blog.create');
    }

    public function store(Request $request)  //Validating the input and save a new post to the database.
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
        ]);

        BlogPost::create($request->all());
        return redirect('/blog')->with('success', 'Post created successfully!');
    }

    public function edit($id)   //Fetch a specific post for editing.
    {
        $post = BlogPost::findOrFail($id);
        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, $id) //Validate and update the post based on user input.
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
        ]);

        $post = BlogPost::findOrFail($id);
        $post->update($request->all());
        return redirect('/blog')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)  //Delete a post from the database.
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();
        return redirect('/blog')->with('success', 'Post deleted successfully!');
    }

    public function togglePublish($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->published = !$post->published; // Toggle published status
        $post->save();
        return redirect('/blog')->with('success', 'Post publish status updated!');
    }
}
