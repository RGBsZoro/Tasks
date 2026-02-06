<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Listeners\UpdateLastLogin;
use App\services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthService $auth){}
    public function register(RegisterRequest $request){
        $user = $this->auth->register($request->validated());

        return $this->success($user);
    }

    public function login(LoginRequest $request){
        $user = $this->auth->login($request->validated());

        return $this->success($user);
    }

    public function logout(){
        $this->auth->logout();

        return $this->success();
    }
}
