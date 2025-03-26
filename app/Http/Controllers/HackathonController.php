<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\HackathonServices;
use App\Repository\HackathonRepositery;
use App\Repository\RulesRepositery;
use App\Repository\ThemeRepositery;
use App\Repository\UserRepositery;

class HackathonController extends Controller
{
    protected $hackathon_services;


    public function __construct(
        HackathonRepositery $hackathon_repository, 
        RulesRepositery $rule__repositery, 
        UserRepositery $user_repositery, 
        HackathonServices $hackathon_services, 
        ThemeRepositery $theme_repositery)
    {
        $this->hackathon_services = $hackathon_services;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if (
                $this->hackathon_services->validation("text", $request->description)
                && !empty($request->organisateur)
                && !empty($request->theme)
            ) {

                $data = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ];
                $organisateurRequest = $request->organisateur;
                $themeRequest = $request->theme;
                $ruleRequest = $request->rules;

                $hackathon = $this->hackathon_services->store($organisateurRequest, $data, $themeRequest, $ruleRequest);
                return $hackathon;
                return response()->json(["hackathon" => [
                    "rules" => $hackathon
                ]]);
            }

            return $this->finalResponse(null, 'Validation failed', 422);
        } catch (Exception $e) {
            return $this->finalResponse($e->getMessage(), 'Exception error', 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data =  $this->hackathon_services->show();
        if (!empty($data)) {

            return $this->finalResponse($data);
        } else {
            return response()->json([
                'message' => 'data not found '
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            if (
                $this->hackathon_services->validation("text", $request->description)
                && !empty($request->theme_id)
                && !empty($request->organisateur_id)
            ) {

                $data = [
                    'theme_id' => $request->theme_id,
                    'organisateur_id' => $request->organisateur_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ];
                $result = $this->hackathon_services->update($data, $request->id);
                return $this->finalResponse($result);
            }

            return $this->finalResponse(null, 'Validation failed', 422);
        } catch (Exception $e) {
            return $this->finalResponse($e,"Exception error", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data =  $this->hackathon_services->delete($request->id);

        return $this->finalResponse($data);
    }
}
