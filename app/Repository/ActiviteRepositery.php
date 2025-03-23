<?php 

namespace App\Repository;

use App\Models\Activite;

class ActiviteRepositery{

    protected Activite $Activite;
    public function __construct()
    {
        $this->Activite = new Activite();

        
    }

    public function register($data){
        $Activites = $this->Activite->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'date'=>$data["date"]
        ]);
    
        return  $Activites;
    }
    
    public function show(){
        $Activites = $this->Activite->get();
    
        return $Activites;
    
    }
    
    public function delete($id){
    
        $this->Activite->where('id','=',$id)->delete();
    
        return true;
    }
    public function update($data,$id){
        $Activites = $this->Activite->where('id','=',$id)->update($data);

        return $Activites;
    
    }
}