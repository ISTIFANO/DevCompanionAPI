<?php 
namespace App\Repository;

use App\Models\Theme;
use App\Repository\interfaces\Themeinterface;

class ThemeRepositery implements Themeinterface{


public function register($data){
    $theme = Theme::create([
        'name' => $data['name'],
        'cover' => $data['cover'],
    ]);

    return   $theme;
}

public function show(){
    $theme = Theme::all();

    return $theme;

}

public function delete($id){

    Theme::where('id','=',$id)->delete();

    return true;
}
public function update($data,$id){
    Theme::where('id','=',$id)->update($data);

}


}











?>