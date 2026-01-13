<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected PostService $postService){}
    public function store(StorePostRequest $request){
        $post = $this->postService->store($request->validated());

        return successResponse(data: $post);
    }

    public function update(UpdatePostRequest $request , Post $post){
        $this->postService->update($request->validated() , $post); 

        return successResponse(data: $post);
    } 

    public function destroy(Post $post){
        $this->postService->destroy($post);

        return successResponse();
    }
}
