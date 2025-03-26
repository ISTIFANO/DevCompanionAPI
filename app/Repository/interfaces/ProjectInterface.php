<?php 

namespace App\Repository\interfaces;

interface ProjectInterface{

    public function register($data,$theme);
    public function show();

    public function delete($data);
    public function update($data,$id);
}













?>