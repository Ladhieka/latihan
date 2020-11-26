<?php

namespace App\Http\Controllers;

use App\Grandfather;
use Illuminate\Http\Request;
use Illuminate\HTtp\JsonResponse;
use App\Http\Requests\GrandfatherRequest;

class GrandfatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grandfathers = Grandfather::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $grandfathers
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrandfatherRequest $request)
    {
        $validated = $request->validated();
        $grandfathers = Grandfather::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $grandfathers
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grandfather  $grandfather
     * @return \Illuminate\Http\Response
     */
    public function show(Grandfather $grandfather)
    {
        $grandfathers = Grandfather::findOrFail($grandfather);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $grandfathers
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grandfather  $grandfather
     * @return \Illuminate\Http\Response
     */
    public function edit(Grandfather $grandfather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grandfather  $grandfather
     * @return \Illuminate\Http\Response
     */
    public function update(GrandfatherRequest $request, Grandfather $grandfather)
    {
        $validated = $request->validated();

        $grandfathers = Grandfather::findOrFail($grandfather);
        $grandfathers->update($validated);
        $updatedFields = $grandfathers->getChanges();

        return new JsonResponse(   
            [
                "message" => "Sukses mengupdate data " ,
                "data"    => $updatedFields
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grandfather  $grandfather
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grandfather $grandfather)
    {
        $grandfathers = Grandfather::findOrFail($grandfather);

        $grandfathers->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }

    function grandfather_grandchild (Granfather $grandfather)
    {
        //eager loading
        $grandfathers = Grandfather::with('grandchildren')->where('id', $grandfather)->first();
        return $grandfathers;
    }
}
