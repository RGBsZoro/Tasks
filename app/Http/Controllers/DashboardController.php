<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $usersCount = User::query()->count();
        $ordersCount = 150;
        return view('Task_9.dashboard' , compact('usersCount' , 'ordersCount'));
    }

    public function users(){
        $users = User::query()->paginate(5);
        return view ('Task_9.users' , compact('users'));
    }
}
