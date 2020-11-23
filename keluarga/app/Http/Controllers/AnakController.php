<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;

class AnakController extends Controller
{
    function index()
    {
        $data = Anak::all();
        
        return response()->json( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $data
            ]
        );
    }

    function show($id)
    {
        $data = Anak::findOrFail($id);
        
        return response()->json( 
            [
                "message" => "Sukses Menampilkan data dengan id " . $id,
                "data"    => $data
            ]
        );
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $anak = new Anak;
        $anak->kakek_id = $request->kakek_id;
        $anak->name = $request->name;

        $anak->save();
        return response()->json(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $anak
            ]
        );
    }

    function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $data = Anak::where('id',$id)->first();
        $data->kakek_id = $request->kakek_id ? $request->kakek_id : $data->kakek_id;
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
                "message" => "Anak dengan " . $id . " tidak ditemukan"
            ], 400
        );     
    }

    function destroy($id)
    {
        $data = Anak::where('id',$id)->first();

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
