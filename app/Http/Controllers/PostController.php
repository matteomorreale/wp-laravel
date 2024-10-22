<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:posts,slug',
        ]);
    
        $slug = $request->slug;
    
        // Controlla se lo slug esiste già
        $existingSlug = Post::where('slug', $slug)->exists();
        if ($existingSlug) {
            $counter = 1;
            while (Post::where('slug', "{$slug}-{$counter}")->exists()) {
                $counter++;
            }
            $slug = "{$slug}-{$counter}";
        }
    
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Articolo creato con successo');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Articolo aggiornato con successo');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
    
        if ($post) {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Articolo cancellato con successo.');
        }
    
        return redirect()->route('posts.index')->with('error', 'Articolo non trovato.');
    }    
}