<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    public function home(Request $request){
        $users = User::query()->get();
        return view('home' , compact(['request' , 'users']));
    }
}
