<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal_Information;

class Personal_InformationController extends Controller
{
    public function get() {
        $data = Personal_Information::all();

        return response()->json(
            [
                "message" => "Sukses Menampilkan Semua Data",
                "data"    => $data
            ]
        );
    }

    public function getById($id) {
        $data = Personal_Information::where('id',$id)->get();

        return response()->json(
            [
                "message" => "Sukses Menampilkan Data",
                "data"    => $data
            ]
        );
    }

    public function store(Request $request) 
    {
        auth()->user()->personalInformation()->create([
            "agama" => $request->agama,
        ]);
        
        // $data = new Personal_Information;
        // $data->user_id = $request->user_id;
        // $data->agama = $request->agama;
    
        // $data->save();

        // return response()->json(
        //     [
        //         "message" => "Berhasil Menambahkan data",
        //         "data" => $data
        //     ]
        // );
    }

    public function put($id, Request $request) {
        $data = Personal_Information::where('id',$id)->first();
        if($data){
            $data->user_id = $request->user_id ? $request->user_id : $data->user_id;
            $data->agama = $request->agama ? $request->agama : $data->agama;

            $data->save();

            return response()->json(
                [
                    "message" => "Data berhasil diubah",
                    "data" => $data
                ]
            );
        }
        return response()->json(
            [
                "message" => "Data dengan id " . $id . " tidak ditemukan"
            ], 400
        );
    }

    public function delete($id){
        $data = Personal_Information::where('id',$id)->first();
        if($data){
            $data->delete();
            return response()->json(
                [
                    "message" => "Data dengan " . $id . " berhasil dihapus"
                ]
            );
        }
        return response()->json(
            [
                "message" => "Data dengan " . $id . " tidak ditemukan"
            ], 400
        );
    }

}
