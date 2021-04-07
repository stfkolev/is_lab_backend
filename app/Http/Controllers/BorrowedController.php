<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Book;
use \App\Models\Reader;

class BorrowedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $readers = Book::with('readers')->get();

        // return $readers;
        $books = Book::with('readers')->all();
        // $books = Book::whereHas('readers', function ($sub) use ($request) {
        //     $sub->where('reader_id', $request->reader_id);
        // })->with('readers')->get();

        return $books;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $book = Book::find($request->book_id);
        $reader = Reader::find($request->reader_id);
        
        if($book != null && $reader != null) {
            $book->readers()->attach($reader->id);

            return $book;
        }

        return response()->json(['error' => 'Record not found'], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id)->with('readers')->first();

        $books = Book::whereHas('readers', function ($sub) use ($request) {
            $sub->where('reader_id', $request->readeR_id);
        })->with('readers')->get();

        return $book->pluck('reader');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::with('readers')->where('id', $id)->get();

        dd($book);
        
        if($book != null) {
            $book->readers()->detach($request->reader_id);

            return $book;
        }

        return response()->json(['error' => 'Record not found'], 404);
    }
}
