<?php 
namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Repository\interfaces\RulesInterface;

class RulesRepositery implements RulesInterface {



    public function register($data){
        $rules = DB::table("rules")->insert([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    
        return   $rules;
    }
    
    public function show(){
        $rules = DB::table("rules")->get();
    
        return $rules;
    
    }
    
    public function delete($id){
    
        DB::table("rules")->where('id','=',$id)->delete();
    
        return true;
    }
    public function update($data,$id){
        $rules =      DB::table("rules")->where('id','=',$id)->update($data);

        return $rules;
    
    }
    



}