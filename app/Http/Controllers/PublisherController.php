<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\PublisherResource;
use App\Models\Publisher;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PublisherResource::collection(Publisher::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publisher = new Publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();

        return new PublisherResource($publisher);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publisher = Publisher::find($id);

        if($publisher != null) {
            return new PublisherResource($publisher);
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
        $publisher = Publisher::find($id);

        if($publisher != null) {
            $publisher->name = $request->name;
            $publisher->address = $request->address;

            $publisher->save();

            return new PublisherResource($publisher);
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
        $publisher = Publisher::find($id);

        if($publisher != null) {
            $publisher->delete();

            return new PublisherResource($publisher);
        }

        return response()->json(['error' => 'Record not found'], 404);
    }
}
