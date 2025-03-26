<?php

namespace App\Http\Controllers;

use App\Models\Jurie;
use App\Services\JurieService;
use Exception;
use Illuminate\Http\Request;


class JurieController extends Controller
{

    protected $jurie_service;


    public function __construct(

        JurieService $jurie_service
    ) {
        $this->jurie_service = $jurie_service;
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
        try{
        if($this->jurie_service->Validation("text",$request->name) &&  $this->jurie_service->Validation("text",$request->team) ){

       
        $data  = ["name" => $request->name ,"team" => $request->team];
       $Jurie =  $this->jurie_service->register($data);
       return $Jurie;
    }
    return $this->finalResponse(null, 'Validation failed', 422);

}catch( Exception $e){

        return ["message" => $e];

    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Jurie $jurie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurie $jurie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateJurieRequest $request, Jurie $jurie)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurie $jurie)
    {
        //
    }
}
