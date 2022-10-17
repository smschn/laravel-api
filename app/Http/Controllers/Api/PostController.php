<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        con il metodo statico ::with()
        ricostruisco la relazione post <-> category <-> tags PRIMA di inviare i dati tramite API.
        */
        $posts = Post::with(['category', 'tags'])->get();

        // faccio una return della collection <posts> che viene trasformata in formato json,
        // affinché sia utilizzabile con le api.
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}