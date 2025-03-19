<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Hackathon;
use App\Services\HackathonServices;
use App\Repository\HackathonRepositery;
use App\Http\Requests\StoreHackathonRequest;
use App\Http\Requests\UpdateHackathonRequest;
use Symfony\Component\HttpFoundation\Request;

class HackathonController extends Controller
{
    public function __construct(protected HackathonRepositery $hackathon_repositery, protected HackathonServices $hackathon_services)
    {
        $this->hackathon_repositery = $hackathon_repositery;
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
    public function store(Request $request)
    {  
        try {
   
      if($this->hackathon_services->validation("text",$request->description) && !empty($request->theme_id)
       && !empty($request->theme_id) ){
        $data = ['theme_id' =>$request->theme_id,
        'organisateur_id' => $request->organisateur_id,
        'name' => $request->name,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date];
       $hackathon = $this->hackathon_repositery->register($data);

       return $this->finalResponse($hackathon);
    }
    }catch(Exception $e) {
        
        return $this->finalResponse($e);
    }
}
  
    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data =$this->hackathon_repositery->show();

        return $this->finalResponse($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request )
    {
        try{
        if($this->hackathon_services->validation("text",$request->description) && !empty($request->theme_id) && !empty($request->theme_id) ){
            $data = ['theme_id' =>$request->theme_id,
            'organisateur_id' => $request->organisateur_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date];

        $data = $this->hackathon_repositery->update($data,$request->id);

        }}catch(Exception $e){

            return $this->finalResponse($e,"exeption error");
        }
 
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = $this->hackathon_repositery->delete($request->id);

        return $this->finalResponse($data);


    }
}
