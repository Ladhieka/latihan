<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\HTtp\JsonResponse;
use App\Kakek;
use App\Http\Requests\KakekRequest;

class KakekController extends Controller
{
    function index()
    {
        $kakek = Kakek::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $kakek
            ]
        );
    }

    function show($id)
    {
        $kakek = Kakek::findOrFail($id);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $kakek
            ]
        );
    }

    function store(KakekRequest $request)
    {
        $validated = $request->validated();
        $kakek = Kakek::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $kakek
            ]
        );
    }

    function update(KakekRequest $request, $id)
    {
        $validated = $request->validated();

        $kakek = Kakek::findOrFail($id);
        $kakek->update($validated);
        $updatedFields = $kakek->getChanges();

        return new JsonResponse(   
            [
                "message" => "Sukses mengupdate data " ,
                "data"    => $updatedFields
            ]
        );
    }

    function destroy($id)
    {
        $kakek = Kakek::findOrFail($id);

        $kakek->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }

    function kakek_cucu ($id)
    {
        //eager loading
        $kakeks = Kakek::with('cucus')->findOrFail($id);
        return $kakeks;
    }

    function kakek_anak ($id)
    {
        //eager loading
        $kakeks = Kakek::with('anaks')->findOrFail($id);
        return $kakeks;
    }
}
