<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $people
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $validated = $request->validated();
        $people = Person::create($validated);
        return new JsonResponse(   
            [
                "message" => "Sukses Memasukkan data",
                "data"    => $people
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        $people = Person::findOrFail($person);
        
        return new JsonResponse( 
            [
                "message" => "Sukses Menampilkan data",
                "data"    => $people
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person)
    {
        $validated = $request->validated();

        // $people = Person::findOrFail($person);
        $person->update($validated);
        $updatedFields = $person->getChanges();

        return new JsonResponse(   
            [
                "message" => "Sukses mengupdate data " ,
                "data"    => $updatedFields
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        // $people = Person::findOrFail($person);

        $person->delete();
            return new JsonResponse(   
                [
                    "message" => "Sukses Menghapus data"
                ]
            ); 
    }

    public function relation($param1){

        $descendant = Person::where('name',$param1)
                    ->with('descendants')->get();

        $ancestor = Person::where('name',$param1)
                    ->with('ancestors')->get();

        // $x = Person::where('name',$param1)->first();
        // dd($x->ancestor()->toArray());

        return new JsonResponse([
        //    "ancestor" => $x->ancestor()->toArray(),
           "descendant" => $descendant,
           "ancestor"   => $ancestor

        ]);

    }

    public function find($param1,$param2){
    
        $input1 = Person::where('name',$param1)->first();
        $input2 = Person::where('name', $param2)->first();

        if($input1->id == $input2->parent_id)
        {
            return new JsonResponse([
                'message' => $param1 . " adalah ayah dari " . $param2
            ]);
        } elseif($input2->id == $input1->parent_id)
        {
            return new JsonResponse([
                'message' => $param1 . " adalah anak dari " . $param2
            ]);
        }

        return new JsonResponse([
        //    "ancestor" => $x->ancestor()->toArray(),
           "descendant" => $descendant,
           "ancestor"   => $ancestor

        ]);

    }
}
