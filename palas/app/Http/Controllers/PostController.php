<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::with('comentarios', 'user')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->input('titulo');
        $post->descripcion = $request->input('descripcion');
        $post->user_id = Auth::user()->id;
        $post->save();
        $nombre = 'post_'. $post->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $post->imagen = asset("storage/imagenes/$nombre");
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->titulo = $request->input('titulo');
        $post->descripcion = $request->input('descripcion');
        $post->user_id = Auth::user()->id;
        $nombre = 'post_' . $post->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $post->imagen = asset("storage/imagenes/$nombre");
        } else{
            $post->imagen = asset("storage/imagenes/default.jpg");
        }
        $post->save();

        return redirect()->route('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->comentarios()->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
