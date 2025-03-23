<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\HackathonServices;
use App\Repository\HackathonRepositery;
use Symfony\Component\HttpFoundation\Request;

class HackathonController extends Controller
{
    protected $hackathon_repository;
    protected $hackathon_services;

    public function __construct( HackathonRepositery $hackathon_repository, HackathonServices $hackathon_services)
    {
        $this->hackathon_repository = $hackathon_repository;
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
            if ($this->hackathon_services->validation("text", $request->description) 
                && !empty($request->theme_id) 
                && !empty($request->organisateur_id)) {
                
                $data = [
                    'theme_id' => $request->theme_id,
                    'organisateur_id' => $request->organisateur_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ];
                
                $hackathon = $this->hackathon_repository->register($data);
                
                return $this->finalResponse($hackathon);
            }
            
            return $this->finalResponse(null, 'Validation failed', 422);
        } catch (Exception $e) {
            return $this->finalResponse($e, 'Exception error', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = $this->hackathon_repository->show();
        return $this->finalResponse($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            if ($this->hackathon_services->validation("text", $request->description) 
                && !empty($request->theme_id) 
                && !empty($request->organisateur_id)) {
                
                $data = [
                    'theme_id' => $request->theme_id,
                    'organisateur_id' => $request->organisateur_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ];

                $result = $this->hackathon_repository->update($data, $request->id);
                return $this->finalResponse($result);
            }
            
            return $this->finalResponse(null, 'Validation failed', 422);
        } catch (Exception $e) {
            return $this->finalResponse($e, "Exception error", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = $this->hackathon_repository->delete($request->id);
        return $this->finalResponse($data);
    }
}