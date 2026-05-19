<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $categorias = Categoria::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pega todas as categorias no banco de dados
        $categorias = Categoria::all(); 
        
        // Envia a variável $categorias para a tela
        return view('post.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'text' => 'required|string',
        'categorias_id' => 'required|exists:categorias,id', // Garante que a categoria realmente existe no banco
        ]);

        Post::create([
            'title' => $request->input('title'), 'text' => $request->input('text'), 'categorias_id' => $request->input('categorias_id')
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categorias = Categoria::all();
        return view('post.edit', compact('post', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'text' => 'required|string',
        'categorias_id' => 'required|exists:categorias,id',
        ]);

        $post->update([
        'title' => $request->input('title'), 'text' => $request->input('text'), 'categorias_id' => $request->input('categorias_id')
        ]);
        
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
