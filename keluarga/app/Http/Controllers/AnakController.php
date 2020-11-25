<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\HTtp\JsonResponse;
use App\Anak;
use App\Http\Requests\AnakRequest;

class AnakController extends Controller
{
    function index()
    {
        $anak = Anak::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $anak
            ]
        );
    }

    function show($id)
    {
        $anak = Anak::findOrFail($id);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $anak
            ]
        );
    }

    function store(AnakRequest $request)
    {
        $validated = $request->validated();
        $anak = Anak::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $anak
            ]
        );
    }

    function update(AnakRequest $request, $id)
    {
        $validated = $request->validated();

        $anak = Anak::findOrFail($id);
        $anak->update($validated);
        $updatedFields = $anak->getChanges();

        return new JsonResponse(   
            [
                "message" => "Sukses mengupdate data " ,
                "data"    => $updatedFields
            ]
        );
    }

    function destroy($id)
    {
        $anak = Anak::findOrFail($id);

        $anak->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }
}
