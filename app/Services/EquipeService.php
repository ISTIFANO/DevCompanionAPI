<?php 
namespace App\Services;

use App\Repository\EquipeRepositery;

class EquipeService{

    protected EquipeRepositery $equipe_repositery;
    public function __construct( EquipeRepositery $equipe_repositery)
    {
        $this->equipe_repositery = $equipe_repositery;
    }



    public function findByName($name){

      $name =  $this->equipe_repositery->findByName($name);

      return $name;
    }

}