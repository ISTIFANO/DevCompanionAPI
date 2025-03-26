<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Memberjurie;
use App\Repository\EquipeRepositery;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
    public function generate($code) {
        $qrCodes = [];
        $qrCodes['simple'] = QrCode::size(120)->generate($code);
        $qrCodes['changeColor'] = QrCode::size(120)->color(255, 0, 0)->generate($code);
        $qrCodes['changeBgColor'] = QrCode::size(120)->backgroundColor(255, 0, 0)->generate($code);
         
        $qrCodes['styleDot'] = QrCode::size(120)->style('dot')->generate($code);
        $qrCodes['styleSquare'] = QrCode::size(120)->style('square')->generate($code);
        $qrCodes['styleRound'] = QrCode::size(120)->style('round')->generate($code);
     
        $qrCodes['withImage'] = QrCode::size(200)->format('png')->merge('/public/img/logo.png', .4)->generate($code);
         
        return view('qr-codes', $qrCodes);
 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255']);
// pour generer Le code 
                $code = parent::RandomNb();
            $data = [
                'name' => $request->name,
                'code' => $code,
                'qr_code' => $this->generate($code),
            ];

$jurie = $this->jurie_repositery->findByName($request->jurie);
            $mb_jurie = $this->memberjurie_repositery->register($data,$jurie);

            return  $mb_jurie;
    
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
