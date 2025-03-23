<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Rule;
use Illuminate\Http\Request;
use App\Repository\RulesRepositery;

class RuleController extends Controller
{

    public function __construct(protected RulesRepositery $rules_repositery)
    {
        $this->rules_repositery = $rules_repositery;
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
            'description' => 'required|string|max:255'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $rules = $this->rules_repositery->register($data);

        return response()->json(["data" => $rules]);

    } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);  
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        //
    }
}
