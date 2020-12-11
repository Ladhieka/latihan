<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Person extends Model
{
    protected $fillable = ['name','address','parent_id'];
    protected $hidden = ['created_at','updated_at'];

    public static function upName($num)
    {
        $arr = [
            '1' => 'Ayah',
            '2' => 'Kakek',
            '3' => 'Kakek Buyut',
        ];
        return $arr[$num];
    }

    public static function downName($num)
    {
        $arr = [
            '1' => 'Anak',
            '2' => 'Cucu',
            '3' => 'Cicit',
        ];
        return $arr[$num];
    }

    public static function isSibling($person1, $person2)
    {
        if(!$person1 || !$person2) return false;
        
        return $person1->parent_id == $person2->parent_id && $person1->parent_id != '0' && $person2->parent_id != '0';
    }


    

    // public function parent()
    // {
    //     return $this->belongsTo(Person::class,'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Person::class,'parent_id');
    // }

    // public function descendants()
    // {
    //     return $this->children()->with('descendants');
    // }

    // public function ancestors()
    // {
    //     return $this->parent()->with('ancestors');
    // }









    
    // public function ancestor()
    // {
    //     $ancestor = Collect();
    //     $user     = $this;
    //     while($user->parent){
    //         $ancestor->push($user->parent);
    //         if($user->parent){

    //             $user = $user->parent;
    //         }
    //     }
    //     return $ancestor;
    // }





    // public function childrenAccounts()
    // {
    //     return $this->hasMany('Account', 'act_parent', 'act_id');
    // }

    // public function allChildrenAccounts()
    // {
    //     return $this->childrenAccounts()->with('allChildrenAccounts');
    // }
 

    // public function descendant()
    // {
    //     $descendant = Collect();
    //     $user       = $this;
    //     while($user->child){
    //         $descendant->push($user->child);
    //         if($user->child){
                
    //             $user = $user->child;
    //         }
    //     }
    //     return $descendant;
    // }
    


}
