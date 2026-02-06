<?php

namespace App\services;

use App\Events\UserLoggedIn;
use App\Jobs\SendWelcomeEmailJob;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data){
        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        $token = $user->createToken('token')->plainTextToken;
        event(new UserLoggedIn($user));
        SendWelcomeEmailJob::dispatch($user);
        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(array $data){
        $user = User::query()->where('email' , $data['email'])->first();

        if($user && Hash::check($data['password'] , $user->password)){
            $token = $user->createToken('token')->plainTextToken;
            event(new UserLoggedIn($user));
            return [
                'user' => $user,
                'token' => $token
            ];
        }

        throw new AuthenticationException();
    }

    public function logout(){
        auth()->user()->currentAccessToken()->delete();
    }
}
