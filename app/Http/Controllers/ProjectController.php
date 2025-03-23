<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Repository\ThemeRepositery;
use App\Repository\ProjectRepositery;


class ProjectController extends Controller
{
    public function __construct(protected ProjectRepositery $project_repositery, protected ThemeRepositery $theme_repositery)
{
    $this->project_repositery = $project_repositery;
    $this->theme_repositery = $theme_repositery;

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
    public function store( Request $request)
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

            $theme = $this->theme_repositery->findbyid($request->theme_id);


            $equipe = $this->project_repositery->register($data,$theme);
            return response()->json(["data" => $equipe]);
    
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);  
        }    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateProjectRequest $request, Project $project)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
