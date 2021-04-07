<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuthorResource::collection(Author::with('books')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author();

        $author->firstName = $request->firstName;
        $author->lastName = $request->lastName;

        $author->save();
        
        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::with('books')->find($id);

        if($author != null) {
            return new AuthorResource($author);
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
        $author = Author::find($id);

        if($author != null) {
            $author->firstName = $request->firstName;
            $author->lastName = $request->lastName;

            $author->save();

            return new AuthorResource($author);
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
        $author = Author::find($id);

        if($author != null) {
            $author->delete();

            return new AuthorResource($author);
        }

        return response()->json(['error' => 'Record not found'], 404);
    }
}
