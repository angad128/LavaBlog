<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    
    public function index()
    {
        // create a variable and store all the blog posts in it from database
        $posts = Post::orderBy('id','desc')->paginate(5);

        // return a view and pass in the above variable
        return view('posts.index')->with(array('posts'=>$posts));
    }

    public function create()
    {
        return view('posts.create');
    }

    
    public function store(Request $request)
    {

        // validate the data
        $this->validate($request, array(
                'title' => 'required|max:60',
                'body' => 'required|max:255',
            ));


        // store in the database
        $post = new Post; 

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        // redirect to another page
        Session::flash('success', 'Post is succesfully saved.');
        return redirect()->route('post.show', $post->id);
    }

    
    public function show($id)
    {   
        $post = Post::find($id);
        return view('posts.show')->with(array('post' => $post));
    }

   
    public function edit($id)
    {
           
        // find the post in the database amd save it into variable
        $post = Post::find($id);

        //return the view to edit the post
        return view('posts.edit')->withPost($post);
    }

    
    public function update(Request $request, $id)
    {
        // validate the data
        $this->validate($request, array(
                'title' => 'required|max:60',
                'body' => 'required|max:255',
            ));

        // store in the database
        $post = Post::find($id); 

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        // redirect to another page
        Session::flash('success', 'Post is succesfully Updated.');
        return redirect()->route('post.index');

    }

    
    public function destroy($id)
    {   
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('post.index');
    }
}
