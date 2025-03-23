<?php 
namespace App\Repository;

use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use App\Repository\interfaces\Themeinterface;

class ThemeRepositery implements Themeinterface{


public function register($data){
    $theme = DB::table("themes")->insert([
        'name' => $data['name'],
        'cover' => $data['cover'],
    ]);

    return   $theme;
}

public function show(){
    $theme = DB::table("themes")->get();

    return $theme;

}

public function delete($id){

    DB::table("themes")->where('id','=',$id)->delete();

    return true;
}
public function update($data,$id){
    DB::table("themes")->where('id','=',$id)->update($data);

}
public function findbyid($id){

$theme =    DB::table("themes")->where('id','=',$id)->first();

return $theme;
}


}











?>