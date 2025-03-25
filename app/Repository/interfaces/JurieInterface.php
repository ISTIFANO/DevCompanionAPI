<?php 

namespace App\Repository\interfaces;

interface JurieInterface{

    public function register($data,$team);
    public function show();

    public function delete($data);
    public function update($data,$id);



}













?>