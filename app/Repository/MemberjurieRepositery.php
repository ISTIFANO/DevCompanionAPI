<?php

namespace App\Repository;

use Exception;
use App\Models\Memberjurie;
use App\Repository\interfaces\MemberjurieInterface;

class MemberjurieRepositery implements MemberjurieInterface
{
    protected Memberjurie $Memberjurie;
    public function __construct()
    {
        $this->Memberjurie = new Memberjurie();
    }


    public function register($data, $jurie)
    {
        try {
            $Memberjurie = new Memberjurie();
            $Memberjurie->name = $data["name"];
            $Memberjurie->code = $data["code"];
            $Memberjurie->qr_code = $data["qr_code"];
            $mb_jurie = $Memberjurie->jurie()->associate($jurie);
            $Memberjurie->save();
        } catch (Exception $e) {
            return ["message" => $e->getMessage()];
        }
        return   $mb_jurie;
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
    public function findbyName($name)
    {
        $data =  $this->Memberjurie->where('name', '=', $name)->first();

        return $data;
    }
}
