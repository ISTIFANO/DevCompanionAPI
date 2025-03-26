<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Activite;
use App\Repository\ActiviteRepositery;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function __construct(protected ActiviteRepositery $activite_repositery)
    {
        $this->activite_repositery = $activite_repositery;
    
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
            $request->validate([
                'name' => 'required|string|max:255',
                'date' => 'required',
                'description' =>'required'
            ]);
    
            $data = [
                'name' => $request->name,
                'date' => $request->date,
                'description' =>$request->description
            ];



            $activite = $this->activite_repositery->register($data);

            return response()->json(["data" => $activite]);
    
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);  
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Activite $activite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activite $activite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActiviteRequest $request, Activite $activite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activite $activite)
    {
        //
    }
}
