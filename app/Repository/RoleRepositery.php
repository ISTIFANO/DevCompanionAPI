<?php 
namespace App\Repository;

use App\Models\Role;
use App\Repository\interfaces\RoleInterface;
use Illuminate\Support\Facades\Hash;

class RoleRepositery implements RoleInterface {


public function findbyName($data)
{
    $role = Role::where('role_name','=',$data)->first();

    return   $role;
}


}











?>