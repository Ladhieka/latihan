<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\User as UserResource;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return new JsonResponse([
            'message'  => 'Registrasi Berhasil',
            'data'     => $user 
        ]);

        // $credentials = $request->only('email','password');

        // $token = auth()->attempt($credentials);

        // return (new UserResource($request->user()))
        //         ->additional(['meta' => [
        //             'token' => $token,
        //         ]]);
    }
}
