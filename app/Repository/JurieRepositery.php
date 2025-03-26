<?php 
namespace App\Repository;

use App\Models\Jurie;
use App\Repository\interfaces\JurieInterface;
use Exception;

class JurieRepositery implements JurieInterface{




    protected Jurie $Jurie;

    public function __construct()
    {
        $this->Jurie = new Jurie();
    }

    public function register($data,$team)
    {

        try{

        $Jurie = new Jurie();
        $Jurie->name = $data; 
        $Jurie->equipe()->associate($team);

        $Jurie->save();
        return $Jurie;
        }catch( Exception $e){
            return ["message" =>$e->getMessage()];
        }
    }



    public function show()
    {
        $Jurie = $this->Jurie->all();

        return $Jurie;
    }

    public function delete($id)
    {

        $this->Jurie->where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data =  $this->Jurie->where('id', '=', $id)->update($data);

        return $data;
    }
    public function findByName($name){
        $data =  $this->Jurie->where('name', '=', $name)->first();

        return $data;

    }











}