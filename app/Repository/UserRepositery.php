<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repository\interfaces\UserInterface;

class UserRepositery implements UserInterface
{


    public function register($data, $role)
    {


        $user = new User;
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'];
        $user->image = $data['image'];
        $user->role()->associate($role);
        $user->save();
        return   $user;
    }

    public function FindByName($name)
    {

        $user =  User::where('name', '=', $name)->first();

        return $user;
    }
    public function FindOrganisateur($name)
    {
        $user =User::where('firstname', '=', $name)->whereHas('role', function ($query) {
            $query->where('role_name', 'organisateur');
        })->first();
        return $user;
    }
}
