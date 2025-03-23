<?php 

namespace App\Repository\interfaces;

interface MemberjurieInterface{

    public function register($data);
    public function show();

    public function delete($data);
    public function update($data,$id);



}













?>