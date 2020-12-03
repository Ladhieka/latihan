<?php

namespace App\Http\Controllers;

use App\Cucu;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CucuRequest;


class CucuController extends Controller
{
    function index()
    {
        $cucu = Cucu::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $cucu
            ]
        );
    }

    function show($id)
    {
        $cucu = Cucu::findOrFail($id);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $cucu
            ]
        );
    }

    function store(CucuRequest $request)
    {
        $validated = $request->validated();
        $cucu = Cucu::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $cucu
            ]
        );
    }

    function update(CucuRequest $request, $id)
    {
        $validated = $request->validated();

        $cucu = Cucu::findOrFail($id);
        $cucu->update($validated);
        $updatedFields = $cucu->getChanges();

        return new JsonResponse(   
            [
                "message" => "Sukses mengupdate data " ,
                "data"    => $updatedFields
            ]
        );
    }

    function destroy($id)
    {
        $cucu = Cucu::findOrFail($id);;

        $cucu->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }

}
