<?php 

namespace App\Repository\interfaces;

interface HackathonInterface{

    public function register($data,$organisateur);
    public function show();

    public function delete($data);
    public function update($data,$id);



}













?>