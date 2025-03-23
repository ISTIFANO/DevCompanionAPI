<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Theme;
use App\Repository\ThemeRepositery;
use Illuminate\Http\Request;


class ThemeController extends Controller
{
    public function __construct(protected ThemeRepositery $theme_repositery)
    {
        $this->theme_repositery = $theme_repositery;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        try {
            $request->validate([ 
                'name' => 'required|string|max:255',
                'cover' => 'required|string|max:255'
            ]);

            $data = [
                'name' => $request->name,
                'cover' => $request->cover
            ];

            $theme = $this->theme_repositery->register($data);

            return ["zdd"=> $theme ];

            return $this->finalResponse($theme);
        } catch (Exception $e) {
            return $this->finalResponse($e);
        }
    }

    public function show()
    {
        $data = $this->theme_repositery->show();

        return $this->finalResponse($data);
    }

    public function edit(Request $request)
    {
        try {
            $request->validate([ 
                'name' => 'required|string|max:255',
                'cover' => 'required|string|max:255'
            ]);
            
            $data = [
                'name' => $request->name,
                'cover' => $request->cover
            ];

            $theme = $this->theme_repositery->update($data, $request->id);

            return $this->finalResponse($theme);
        } catch (Exception $e) {
            return $this->finalResponse($e);
        }
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        $deletedData = $this->theme_repositery->delete($request->id);

        return $this->finalResponse($deletedData);
    }
}
