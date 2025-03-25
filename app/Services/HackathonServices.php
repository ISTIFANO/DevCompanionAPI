<?php

namespace App\Services;

use Exception;
use App\Repository\UserRepositery;
use Illuminate\Support\Facades\DB;
use App\Repository\RulesRepositery;
use App\Repository\ThemeRepositery;
use App\Repository\HackathonRepositery;
use App\Services\interfaces\HackathonInterfaces;

class HackathonServices implements HackathonInterfaces
{
    protected $hackathon_repository;
    protected $hackathon_services;
    protected $theme_repositery;
    protected $rule__repositery;
    protected $user_repositery;
    public function __construct(HackathonRepositery $hackathon_repository, UserRepositery $user_repositery, RulesRepositery $rule__repositery,  ThemeRepositery $theme_repositery)
    {
        $this->hackathon_repository = $hackathon_repository;
        $this->theme_repositery = $theme_repositery;
        $this->rule__repositery = $rule__repositery;
        $this->user_repositery = $user_repositery;
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




    public function store($organisateurRequest, $data, $themeRequest, $ruleRequest)
    {
        try {
            DB::beginTransaction();

            $organisateur = $this->user_repositery->FindOrganisateur($organisateurRequest);
            $hackathon = $this->hackathon_repository->register($data, $organisateur);
    

            foreach ($ruleRequest as $rules) {
                $HackathonRules = $this->rule__repositery->findByName($rules);
                if (empty($HackathonRules)) {

                    $this->rule__repositery->store($HackathonRules);
                }
                $this->hackathon_repository->registerRoles($hackathon,$HackathonRules);
            }
            foreach ($themeRequest as $theme) {
                $theme = $this->theme_repositery->findbyName($theme);
                if (empty($theme)) {
                    $this->theme_repositery->store($data);
                }
                $this->theme_repositery->register($theme, $hackathon);
                DB::commit();
                return $hackathon;
            }
        } catch (Exception $e) {
            DB::rollBack();
            return ["message " => $e->getMessage()];
        }
    }

    public function show()
    {

        return $this->hackathon_repository->show();
    }

    public function update($data, $id)
    {

        return $this->hackathon_repository->update($data, $id);
    }

    public function delete($id)
    {
        $data = $this->hackathon_repository->delete($id);

        return $data;
    }
}
