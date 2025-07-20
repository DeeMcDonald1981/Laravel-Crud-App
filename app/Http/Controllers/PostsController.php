<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //

    public function show()
    {
        $posts = DB::connection('mysql2')->table('posts')->get();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function index()
    {
        $posts = Posts::paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create', ['posts' => new Posts()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:mysql2.posts,email',
        ]);

        Posts::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post added successfully.');
    }

    public function edit($id)
    {
        $posts = Posts::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }

    public function update(Request $request, $id)
    {
        $posts = Posts::findOrFail($id);
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:mysql2.posts,email,' . $id,
        ]);
        $posts->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        Posts::FindOrFail($id)->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully' );
    }
}
