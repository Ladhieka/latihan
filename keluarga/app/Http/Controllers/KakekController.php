<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kakek;
use Validator;
use App\Http\Requests\KakekRequest;

class KakekController extends Controller
{
    function index()
    {
        $data = Kakek::all();
        
        return response()->json( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $data
            ]
        );
    }

    function show($id)
    {
        $data = Kakek::findOrFail($id);
        
        return response()->json( 
            [
                "message" => "Sukses Menampilkan data dengan id " . $id,
                "data"    => $data
            ]
        );
    }

    function store(KakekRequest $request)
    {   
        $validated = $request->validated();
        $kakek = Kakek::create($validated);
        return response()->json(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $kakek
            ]
        );
    }

    function update(KakekRequest $request, $id)
    {

        $data = Kakek::where('id',$id)->first();
        $data->name = $request->name ? $request->name : $data->name;

        $data->save();
        if($data){
            return response()->json(   
                [
                    "message" => "Sukses mengupdate data " . $id,
                    "data"    => $data
                ]
            );
        }
        return response()->json(   
            [
                "message" => "Kakek dengan " . $id . " tidak ditemukan"
            ], 400
        );     
    }

    function destroy($id)
    {
        $data = Kakek::where('id',$id)->first();

        if($data){
            $data->delete();
            return response()->json(   
                [
                    "message" => "Sukses Menghapus data dengan id " . $id
                ]
            );
        }
        return response()->json(   
            [
                "message" => "Kakek dengan " . $id . " tidak ditemukan"
            ], 400
        ); 
    }
}
