<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user->profile()->create([
            'address' => $request->address,
        ]);

        return response()->json([
            'user' => $user->with('profile')->find($user->id),
        ], 201);
    }

    public function index(){
        return response()->json([
            'users' => User::with('profile')->get(),
        ], 200);
    }

    public function show(User $user){        
        return response()->json([
            'user' => $user->load('profile'),
        ], 200);
    }

    public function attachUserWithTask(Request $request , User $user){
        $user->tasks()->attach($request->task_ids);// بتضيف بدون ما تمسح القديم
        // $user->tasks()->sync($request->task_ids); بتحذف كلشي قبل ما تضيف الجديد
        // $user->tasks()->syncWithoutDetaching($request->task_ids); بتضيف بدون ما تمسح القديم حتى لو في تكرار
        return response()->json([
            'message' => 'User attached to task successfully',
        ], 200);

    }

    public function getUserPosts(User $user){
        return response()->json([
            'posts' => $user->tasks,
        ], 200);

    } 
    
    public function detachUserFromTask(Request $request , User $user){
        $user->tasks()->detach($request->task_ids);
        return response()->json([
            'message' => 'User detached from task successfully',
        ], 200);
    } 
}
