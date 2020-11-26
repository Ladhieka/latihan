<?php

namespace App\Http\Controllers;

use App\Toy;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ToyRequest;

class ToyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toys = Toy::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $toys
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
    public function store(ToyRequest $request)
    {
        $validated = $request->validated();
        $toys = Toy::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $toys
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Toy  $toy
     * @return \Illuminate\Http\Response
     */
    public function show(Toy $toy)
    {
        $toys = Toy::findOrFail($toy);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $toys
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Toy  $toy
     * @return \Illuminate\Http\Response
     */
    public function edit(Toy $toy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Toy  $toy
     * @return \Illuminate\Http\Response
     */
    public function update(ToyRequest $request, Toy $toy)
    {
        $validated = $request->validated();

        $toys = Toy::findOrFail($toy);
        $toys->update($validated);
        $updatedFields = $toys->getChanges();

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
     * @param  \App\Toy  $toy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toy $toy)
    {
        $toys = Toy::findOrFail($toy);;

        $toys->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }
}
