<?php 

namespace App\Repository\interfaces;

interface UserInterface{

    public function register($data,$role);
    public function FindByName($data);

}













?>