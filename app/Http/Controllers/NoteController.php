<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Note;
use App\Repository\NoteRepositery;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Repository\EquipeRepositery;
use App\Repository\MemberjurieRepositery;
use App\Repository\ThemeRepositery;

class NoteController extends Controller
{
    public function __construct(protected NoteRepositery $note_repositery,protected EquipeRepositery $equipe_repositery , protected MemberjurieRepositery $memberjurie_repositery)
{
    $this->note_repositery = $note_repositery;
    $this->equipe_repositery =$equipe_repositery;
    $this->memberjurie_repositery = $memberjurie_repositery;
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
    public function store(StoreNoteRequest $request)
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

            $team = $this->equipe_repositery->findbyid($request->equipe_name);
            $memberjurie = $this->memberjurie_repositery->findbyName($request->membre_name);


            $equipe = $this->note_repositery->register($data,$team,$memberjurie);
            return response()->json(["data" => $equipe]);
    
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);  
        }     }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
