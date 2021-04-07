<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(Book::with(['genre', 'author', 'publisher'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();

        $book->title = $request->title;

        $book->author_id = $request->author_id;
        $book->genre_id = $request->genre_id;
        $book->publisher_id = $request->publisher_id;

        $book->save();

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        if($book != null) {
            return new BookResource($book);
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
        $book = Book::find($id);

        if($book != null) {

            $book->title = $request->title;

            $book->author_id = $request->author_id;
            $book->genre_id = $request->genre_id;
            $book->publisher_id = $request->publisher_id;

            $book->save();

            return new BookResource($book);
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
        $book = Book::find($id);

        if($book != null) {
            $book->delete();

            return new BookResource($book);
        }

        return response()->json(['error' => 'Record not found'], 404);
    }
}
