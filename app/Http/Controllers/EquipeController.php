<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Repository\EquipeRepositery;


class EquipeController extends Controller
{
    

public function __construct(protected EquipeRepositery $equipe_repositery)
{
    $this->equipe_repositery = $equipe_repositery;
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
    public function store(  Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'required|string|max:255',
                'hackathon_id' =>'required'
            ]);
    
            $data = [
                'name' => $request->name,
                'logo' => $request->logo,
                'hackathon_id' =>$request->hackathon_id
            ];
    
            $equipe = $this->equipe_repositery->register($data);
    
            return response()->json(["data" => $equipe]);
    
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);  
        }    }

    /**
     * Display the specified resource.
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipe $equipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipeRequest $request, Equipe $equipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipe $equipe)
    {
        //
    }
}
