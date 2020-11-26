<?php

namespace App\Http\Controllers;

use App\Grandchild;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CucuRequest;

class GrandchildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grandchildren = Grandchild::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $grandchildren
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
    public function store(GrandchildRequest $request)
    {
        $validated = $request->validated();
        $grandchildren = Grandchild::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $grandchildren
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grandchild  $grandchild
     * @return \Illuminate\Http\Response
     */
    public function show(Grandchild $grandchild)
    {
        $grandchildren = Grandchild::findOrFail($grandchild);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $grandchildren
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grandchild  $grandchild
     * @return \Illuminate\Http\Response
     */
    public function edit(Grandchild $grandchild)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grandchild  $grandchild
     * @return \Illuminate\Http\Response
     */
    public function update(GrandchildRequest $request, Grandchild $grandchild)
    {
        $validated = $request->validated();

        $grandchildren = Grandchild::findOrFail($id);
        $grandchildren->update($validated);
        $updatedFields = $grandchildren->getChanges();

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
     * @param  \App\Grandchild  $grandchild
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grandchild $grandchild)
    {
        $grandchildren = Grandchild::findOrFail($grandchild);;

        $grandchildren->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }
}
