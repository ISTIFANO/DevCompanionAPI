<?php

namespace App\Repository;

use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use App\Repository\interfaces\Themeinterface;
use Exception;

class ThemeRepositery implements Themeinterface
{

    protected Theme $themeModel;

    public function __construct()
    {
        $this->themeModel = new Theme();
    }

    public function register($data, $hackathon)
    {
        try {
            $theme = new Theme();
            $theme->name = $data["name"];
            $theme->cover = $data["cover"];
            $theme->hackathon()->associate($hackathon);
            $theme->save();

            return   $theme;
        } catch (Exception $e) {

            return ["error" => $e->getMessage()];
        }
    }
    public function store($data)
    {
        $theme = DB::table("themes")->insert([
            'name' => $data['name'],
            'cover' => ""
        ]);

        return   $theme;
    }

    public function show()
    {
        $theme = DB::table("themes")->get();

        return $theme;
    }

    public function delete($id)
    {

        DB::table("themes")->where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        DB::table("themes")->where('id', '=', $id)->update($data);
    }
    public function findbyName($name)
    {

        $theme =  Theme::where('name', '=', $name)->first();

        return $theme;
    }
}
