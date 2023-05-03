<?php

namespace App\Providers;

use App\Models\UserModel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class UserModelProvider implements UserProvider{
    public function retrieveById($identifier){
        return UserModel::where('idUser', $identifier)->first(); 
    }
    public function retrieveByToken($identifier, $token){}
    public function updateRememberToken(Authenticatable $user, $token){}
    public function retrieveByCredentials(array $credentials){
        return UserModel::where('email', $credentials['email'])->first();
    }
    public function validateCredentials(Authenticatable $user, array $credentials){
        return $user->getAuthPassword() == $credentials['password'];
    }
}