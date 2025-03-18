<?php 
namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repository\interfaces\UserInterface;

class UserRepositery implements UserInterface {


public function register($data)
{
    $user = User::create([
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'phone' => $data['phone'],
        'image' => $data['image']

    ]);

    return   $user;
}


}











?>