<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function get() {
        $data = User::all();

        return response()->json(
            [
                "message" => "Sukses",
                "data"    => $data
            ]
            );
    }

    public function getById($id) {
        $data = User::where('id',$id)->get();

        return response()->json(
            [
                "message" => "Sukses",
                "data"    => $data
            ]
        );
    }

    public function post(Request $request) {
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);

        $User->save();

        return response()->json([
            "message" => "Berhasil Memasukkan data Baru",
            "data"    => $User
        ]);
    }

    public function put($id, Request $request) {
        $User = User::where('id', $id)->first();

        if($User){
            $User->name = $request->name ? $request->name : $User->name;
            $User->email = $request->email ? $request->email : $User->email;
            $User->password = $request->password ? $request->password : $User->password;
        
        $User->save();
        return response()->json([
            "message" => "Berhasil Mengubah data",
            "data"    => $User
        ]);
        }
        return response()->json([
            "message" => "User dengan id " . $id . " tidak ditemukan!"
        ], 400    );
    }

    public function delete($id){
        $User = User::where('id',$id)->first();
        if($User){
            $User->delete();
            return response()->json(
                [
                    "message" => "User dengan id " . $id . " Berhasil dihapus!"
                ]
            );
        }
        return response()->json(
            [
            "message" => "User dengan id " . $id . " Tidak ditemukan!"
            ], 400
        );
    }

}
