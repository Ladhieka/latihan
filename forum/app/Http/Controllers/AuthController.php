<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function Register(){

        return view ('register');
    }

    public function Welcome_post(Request $request){

        $fName = $request["fName"];
        $lName = $request["lName"];
        
        // return "$fName $lName";
        return view ('welcome2', compact("fName","lName"));
    }
}
