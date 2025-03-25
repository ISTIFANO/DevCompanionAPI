<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Memberjurie;
use App\Repository\EquipeRepositery;
use App\Repository\JurieRepositery;
use Illuminate\Http\Request;
use App\Repository\MemberjurieRepositery;

class MemberjurieController extends Controller
{

    public function __construct(protected MemberjurieRepositery $memberjurie_repositery,protected JurieRepositery $jurie_repositery)
    {
        $this->memberjurie_repositery = $memberjurie_repositery;
        $this->jurie_repositery = $jurie_repositery;
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
                'code' => 'required'            ]);
    
            $data = [
                'name' => $request->name,
                'code' => $request->code,
            ];

$jurie = $this->jurie_repositery->findByName($request->jurie);
            $mb_jurie = $this->memberjurie_repositery->register($data,$jurie);

            return response()->json(["memberjurie" => $mb_jurie]);
    
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);  
        }     }

    /**
     * Display the specified resource.
     */
    public function show(Memberjurie $memberjurie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memberjurie $memberjurie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberjurieRequest $request, Memberjurie $memberjurie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memberjurie $memberjurie)
    {
        //
    }
}
