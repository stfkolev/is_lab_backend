<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\ReaderResource;
use App\Models\Reader;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReaderResource::collection(Reader::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reader = new Reader();

        $reader->firstName = $request->firstName;
        $reader->lastName = $request->lastName;
        $reader->address = $request->address;
        $reader->UCN = $request->UCN;
        $reader->work = $request->work;

        $reader->save();

        return new ReaderResource($reader);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reader = Reader::find($id);

        if($reader != null) {
            return new ReaderResource($reader);
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
        $reader = Reader::find($id);

        if($reader != null) {
            $reader->firstName = $request->firstName;
            $reader->lastName = $request->lastName;
            $reader->address = $request->address;
            $reader->UCN = $request->UCN;
            $reader->work = $request->work;

            $reader->save();

            return new ReaderResource($reader);
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
        $reader = Reader::find($id);

        if($reader != null) {
            $reader->delete();

            return new ReaderResource($reader);
        }

        return response()->json(['error' => 'Record not found'], 404);
    }
}
