<?php

namespace App\Services;

use Exception;
use App\Utils\Responsefinal;
use App\Services\EquipeService;
use App\Repository\JurieRepositery;
use App\Services\interfaces\EJurieInterface;


class JurieService implements EJurieInterface
{

    protected EquipeService $equipe_service;
    protected JurieRepositery $jurie_repositery;

    public function __construct(EquipeService $equipe_service, JurieRepositery $jurie_repositery)
    {
        $this->equipe_service = $equipe_service;
        $this->jurie_repositery = $jurie_repositery;
    }
    public function Validation($type, $value)
    {
        switch ($type) {
            case 'email':
                if (preg_match("/^[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/", $value)) {
                    return true;
                } else {
                    throw new Exception("Invalid email ");
                }
                break;

            case 'numero':
                if (preg_match("/^[0-9]+$/", $value)) {
                    return true;
                } else {
                    throw new Exception("invalid number format");
                }
                break;
            case 'numero&text':
                if (preg_match("/^[a-zA-Z0-9]+$/", $value)) {
                    return true;
                } else {
                    throw new Exception("message invalide");
                }
                break;

            case 'text':
                if (preg_match("/^[a-zA-Z]+$/", $value)) {
                    return true;
                } else {
                    throw new Exception("invalid text");
                }
                break;

            default:
                throw new Exception("type not correct : " . $type);
                break;
        }
    }

    public function register($data)
    {
        if ($data) {
            $equipe = $this->equipe_service->findByName($data["team"]);

            $jurie = $this->jurie_repositery->register($data["team"], $equipe);

            return $jurie;
        }

        return Responsefinal::finalResponse(null, 'Validation failed', 422);
    }
}
