<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\User;
use App\Http\Requests\UserRequest;
use Validator;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $users
            ]
        );
    }

    function show($id)
    {
        $users = User::findOrFail($id);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $users
            ]
        );
    }

    function store(UserRequest $request)
    {
        $validated = $request->validated();
        $users = User::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $users
            ]
        );
    }

    function update(UserRequest $request, $id)
    {
        $validated = $request->validated();

        $users = User::findOrFail($id);
        $users->update($validated);
        $updatedFields = $users->getChanges();

        return new JsonResponse(   
            [
                "message" => "Sukses mengupdate data " ,
                "data"    => $updatedFields
            ]
        );
    }

    function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }

    // function kakek_cucu ($id)
    // {
    //     //eager loading
    //     $data = Kakek::with('cucus')->where('id', $id)->first();
    //     return $data;
    // }
}
