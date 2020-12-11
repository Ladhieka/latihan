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
    
    $person1 = Person::where('name', $param1)->first();
    $person2 = Person::where('name', $param2)->first();

    if(!$person1 || !$person2)
    {
        return new JsonResponse([
            "message" => "data tidak ditemukan"
        ]);
    }
    
    // Ke atas, bapak, kakek, kakek buyut

    $counter = 1;
    $find = $person2;
    while ($find !== null)
    {

        //dd($find->parent_id);
        if ($find->parent_id == $person1->id)
        {
            $relation = Person::upName($counter);
            return new JsonResponse([
                "message" => "$param1 adalah $relation dari $param2"
            ]);
        }
        
        $find = Person::find($find->parent_id);
        $counter++;
    }

    $counter = 1;
    $find = $person1;
    while ($find !== null)
    {
        //dd($find->parent_id);
        if ($find->parent_id == $person2->id)
        {
            $relation = Person::downName($counter);
            return new JsonResponse([
                "message" => "$param1 adalah $relation dari $param2"
            ]);
        }

        $find = Person::find($find->parent_id);
        $counter++;
    }

    //cek apakah punya parent yang sama, jika iya berarti saudaraan
    if (Person::isSibling($person1,$person2))
    {
        return new JsonResponse([
            "message" => "$param1 adalah saudara/saudari dari $param2"
        ]);
    }

    $parent1 = Person::find($person1->parent_id);
    $parent2 = Person::find($person2->parent_id);

    // Keponakan => parent person1 saudaraan sama person2
    if (Person::isSibling($parent1, $person2))
    {
        return new JsonResponse([
            "message" => "$param1 adalah Keponakan dari $param2"
        ]);
    }

    // Paman / Tante => parent person2 saudaraan person1
    if (Person::isSibling($person1, $parent2))
    {
        return new JsonResponse([
            "message" => "$param1 adalah Paman / Bibi dari $param2"
        ]);
    }

    if (Person::isSibling($parent1, $parent2))
    {
        return new JsonResponse([
            "message" => "$param1 adalah Sepupu dari $param2"
        ]);
    }

    return new JsonResponse([
        "message" => "$param1 tidak ada hubungan keluarga dengan $param2"
    ]);




















    
    
        // $input1 = Person::where('name',$param1)->first();
        // $input2 = Person::where('name', $param2)->first();
        // $flag = true;
        // $ct = 1;

        // if($input1->id == $input2->parent_id)
        // {
        //    $message = "$param1 adalah ayah dari $param2";
        //    $flag == false;
        // } elseif($input1->parent_id == $input2->id)
        // {    
        //     $message = "$param1 adalah anak dari $param2";
        //     $flag == false;
        // }

        // $child = $input1->children->first();
        // $child2 = $input2->children->first();
            
        // if($child->id == $input2->parent_id)
        // {
        //     $message = "$param1 adalah kakek dari $param2";
        //     $flag == false;
        // } elseif($child2->id == $input1->parent_id)
        // {
        //     $message = "$param1 adalah cucu dari $param2";
        //     $flag == false;
        // } 

        // return new JsonResponse([
        //     'message' => $message
        // ]);              
    }
}
        // $grand = $child->children->first();
        // $grand2 = $grand->children->first();
        // $grand3 = $grand2->children->first();


        // $grand2 = $child2->children->first();
            
        // if($grand->id == $input2->parent_id)
        // {
        //     $message = "$param1 adalah kakek buyut dari $param2";
        //     $flag == false;
        // } elseif($grand2->id == $input1->parent_id)
        // {
        //     $message = "$param1 adalah cicit dari $param2";
        //     $flag == false;
        // } 
      
        



        // }while($child->id != $input2->parent_id && $input2->parent_id != 0);

        // do {
        //     if($child2->id == $input1->parent_id)
        //     {
        //         $message = "$param1 adalah cucu dari $param2";
        //     }

        //     $child2 = $child2->children->first();

        //     $i2++;
     
        // }while($child2->id != $input1->parent_id && $input1->parent_id != 0);

        // if($child2->id == $input1->parent_id && $i > 0)
        // {
        //     $message = "$param1 adalah cicit dari $param2";
        // }
        // } elseif($i2 > 0)
        // {
        //     $message = "$param1 adalah kakek buyut dari $param2";
        // }
