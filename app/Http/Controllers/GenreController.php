<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\GenreResource;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genre = new Genre();

        $genre->name = $request->name;

        $genre->save();

        return new GenreResource($genre);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::find($id);

        if($genre != null) {
            return new GenreResource($genre);
        }

        return response()->json(['error' => 'Record not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if($genre != null) {
            $genre->name = $request->name;

            $genre->save();

            return new GenreResource($genre);
        }

        return response()->json(['error' => 'Record not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if($genre != null) {
            $genre->delete();

            return new GenreResource($genre);
        }

        return response()->json(['error' => 'Record not found'], 404);
    }
}
