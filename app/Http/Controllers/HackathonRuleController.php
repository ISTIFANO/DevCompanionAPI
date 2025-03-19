<?php

namespace App\Http\Controllers;

use App\Models\Hackathon_rule;
use App\Http\Requests\StoreHackathon_ruleRequest;
use App\Http\Requests\UpdateHackathon_ruleRequest;
use App\Repository\HackathonRepositery;
use GuzzleHttp\Psr7\Request;

class HackathonRuleController extends Controller
{

    public function __construct(protected HackathonRepositery $hackathon_repositery)
    {
        $this->hackathon_repositery = $hackathon_repositery;
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
      $data =    $request->validate([
        'theme_id' => 'required',
        'organisateur_id' => 'required',
        'name' => 'required|string|email',
        'description' => 'required|string',
        'start_date' => 'required',
        'end_date' => 'required']);

        $this->hackathon_repositery->register($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hackathon_rule $hackathon_rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hackathon_rule $hackathon_rule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHackathon_ruleRequest $request, Hackathon_rule $hackathon_rule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hackathon_rule $hackathon_rule)
    {
        //
    }
}
