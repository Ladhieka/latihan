<?php

namespace App\Http\Controllers;

use App\Mainan;
use Illuminate\Http\Request;
use Illuminate\HTtp\JsonResponse;
use App\Http\Requests\MainanRequest;
// use Illuminate\Eloquent\Database\Collection;

class MainanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainans = Mainan::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $mainans
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
    public function store(MainanRequest $request)
    {
        $validated = $request->validated();
        $mainans = Mainan::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $mainans
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mainan  $mainan
     * @return \Illuminate\Http\Response
     */
    public function show(Mainan $mainan)
    {
        $mainans = Mainan::findOrFail($mainan);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $mainans
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mainan  $mainan
     * @return \Illuminate\Http\Response
     */
    public function edit(Mainan $mainan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mainan  $mainan
     * @return \Illuminate\Http\Response
     */
    public function update(MainanRequest $request, Mainan $mainan)
    {
        $validated = $request->validated();

        $mainans = Mainan::findOrFail($mainan);
        $mainans->update($validated);
        $updatedFields = $mainans->getChanges();

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
     * @param  \App\Mainan  $mainan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mainan $mainan)
    {
        $mainans = Mainan::findOrFail($mainan);;

        $mainans->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }
}
