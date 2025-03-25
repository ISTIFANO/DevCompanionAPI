<?php

namespace App\Repository;

use App\Models\Equipe;
use App\Repository\Interfaces\EquipeInterface;

class EquipeRepositery implements EquipeInterface
{
    protected Equipe $equipe;

    public function __construct()
    {
        $this->equipe = new Equipe();
    }

    public function register($data)
    {
        $equipe = $this->equipe->create([
            'name' => $data['name'],
            'logo' => $data['logo'],
            'hackathon_id' => $data['hackathon_id'],
        ]);

        return $equipe;
    }



    public function show()
    {
        $Equipe = $this->equipe->all();

        return $Equipe;
    }

    public function delete($id)
    {

        $this->equipe->where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data =  $this->equipe->where('id', '=', $id)->update($data);

        return $data;
    }
    public function findById($id){
        $data =  $this->equipe->where('id', '=', $id)->first();

        return $data;

    }
}
