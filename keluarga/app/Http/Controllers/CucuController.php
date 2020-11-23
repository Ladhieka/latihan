<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cucu;

class CucuController extends Controller
{
    function index()
    {
        $data = Cucu::all();

        return response()->json( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $data
            ]
        );
    }

    function show($id)
    {
        $data = Cucu::findOrFail($id);
        
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

        $cucu = new Cucu;
        $cucu->anak_id = $request->anak_id;
        $cucu->name = $request->name;

        $cucu->save();
        return response()->json(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $cucu
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

        $data = Cucu::where('id',$id)->first();
        $data->anak_id = $request->anak_id ? $request->anak_id : $data->anak_id;
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
                "message" => "Cucu dengan " . $id . " tidak ditemukan"
            ], 400
        );     
    }

    function destroy($id)
    {
        $data = Cucu::where('id',$id)->first();

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
