<?php

namespace App\Repository;

use App\Models\Memberjurie;
use App\Repository\interfaces\MemberjurieInterface;

class MemberjurieRepositery implements MemberjurieInterface
{
    protected Memberjurie $Memberjurie;
    public function __construct()
    {
        $this->Memberjurie = new Memberjurie();

        
    }


    public function register($data)
    {
        $Memberjurie = $this->Memberjurie->create([
            'name' => $data['name'],
            'code' => $data['code'],
        ]);

        return   $Memberjurie;
    }

    public function show()
    {
        $Memberjurie = $this->Memberjurie->all();

        return $Memberjurie;
    }

    public function delete($id)
    {

        $this->Memberjurie->where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data =  $this->Memberjurie->where('id', '=', $id)->update($data);

        return $data;
    }
}
