<?php 
namespace App\Repository;

use App\Models\Rule;
use Illuminate\Support\Facades\DB;
use App\Repository\interfaces\RulesInterface;

class RulesRepositery implements RulesInterface {

    protected Rule $ruleModel;
public function __construct()
{
    $this->ruleModel = new Rule();
}

    public function register($data){
        $rules = $this->ruleModel->insert([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    
        
        return   $rules;
    }
    
    public function show(){
        $rules = $this->ruleModel->all();
    
        return $rules;
    
    }
    
    public function delete($id){
    
        $this->ruleModel->where('id','=',$id)->delete();
    
        return true;
    }
    public function update($data,$id){
        $rules =      $this->ruleModel->where('id','=',$id)->update($data);

        return $rules;
    
    }
    

    public function findByName($name){
        $data =  $this->ruleModel->where('name', '=', $name)->first();

        return $data;

    }

}