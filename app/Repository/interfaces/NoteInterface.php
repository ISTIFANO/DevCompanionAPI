<?php 

namespace App\Repository\interfaces;

interface NoteInterface{

    public function register($data,$team,$memberjurie);
    public function show();

    public function delete($data);
    public function update($data,$id);

}













?>