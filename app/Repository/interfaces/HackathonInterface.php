<?php 

namespace App\Repository\interfaces;

interface HackathonInterface{

    public function register($data,$organisateur,$roles,$themes);
    public function show();

    public function delete($data);
    public function update($data,$id);



}













?>