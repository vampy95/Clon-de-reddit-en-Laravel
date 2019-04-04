<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{

	public function index(){

		$posts = Post::with('user')->orderBy('id', 'desc')->paginate(10);

		return view('posts.index')->with(['posts' => $posts]);

	}

	public function show(Post $post){

		return view('posts.show')->with(['post' => $post]);

	}

	public function create(){

		$post = new Post;

		return view('posts.create')->with(['post' => $post]);
	}

	public function store(Request $request){

		$this->validate($request, [
			'title' => 'required',
			'url' => 'required'
		]);

		$post = new Post;

		$post->fill($request->only('title', 'description', 'url'));

		$post->user_id = $request->user()->id;

		$post->save();

		session()->flash('menssage', 'Post Created!');

		return redirect()->route('posts_path');

	}

	public function edit(Post $post){

		return view('posts.edit')->with(['post' => $post]);

	}

	public function update(Post $post, Request $request)
	{

		if($post->user_id != \Auth::id()){
			return redirect()->route('posts_path');
		}

		$this->validate($request, [
			'title' => 'required',
			'url' => 'required'
		]);

		$post->update($request->only('title', 'description', 'url'));

		return redirect()->route('post_path', ['post' => $post->id]);
	}	

	public function delete(Post $post)
	{

		if($post->user_id != \Auth::id()){

			return redirect()->route('posts_path');

		}

		$post->delete();

		return redirect()->route('posts_path');
	}
}
