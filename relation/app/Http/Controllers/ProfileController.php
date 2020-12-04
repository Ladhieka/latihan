<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    function index()
    {
        $profiles = Profile::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $profiles
            ]
        );
    }

    function show($id)
    {
        $profiles = Profile::findOrFail($id);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $profiles
            ]
        );
    }

    function store(ProfileRequest $request)
    {
        $validated = $request->validated();
        $profiles = Profile::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $profiles
            ]
        );
    }

    function update(ProfileRequest $request, $id)
    {
        $validated = $request->validated();

        $profiles = Profile::findOrFail($id);
        $profiles->update($validated);
        $updatedFields = $profiles->getChanges();

        return new JsonResponse(   
            [
                "message" => "Sukses mengupdate data " ,
                "data"    => $updatedFields
            ]
        );
    }

    function destroy($id)
    {
        $profiles = Profile::findOrFail($id);

        $profiles->delete();
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
