<?php

namespace App\Repository;

use Exception;
use App\Models\Hackathon;
use Illuminate\Support\Facades\DB;
use App\Repository\interfaces\HackathonInterface;

class HackathonRepositery implements HackathonInterface
{


    public function register($data,$organisateur)
    {
        // return['message'=>$note];
        try {
            
            $hackathon = new Hackathon();
            $hackathon->name = $data["name"];
            $hackathon->description = $data["description"];
            $hackathon->start_date = $data["start_date"];
            $hackathon->end_date = $data["end_date"];
            $hackathon->user()->associate($organisateur);
            // $hackathon->theme()->associate($theme);
            $hackathon->save();
        } catch (Exception $e) {
            return ["message" => $e->getMessage()];
        }
        return  $hackathon ;
    }
    public function registerRoles($roles , $hackathons){
        $rule_id = $roles->id;
        $hackathon_id = $hackathons->id;
        $hackathon_rules = DB::table("hackathon_rules")->insert(['hackathon_id'=>$hackathon_id,'rule_id' =>$rule_id ]);

        return $hackathon_rules;
        
    }

    public function show()
    {
        $Hackathon = Hackathon::all();

        return $Hackathon;
    }

    public function delete($id)
    {

        Hackathon::where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data =  Hackathon::where('id', '=', $id)->update($data);

        return $data;
    }
}
