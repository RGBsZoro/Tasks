<?php

namespace App\services;

use App\Models\Post;

class PostService
{
        public function store(array $data){
            $post = Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'user_id' => currentUserId(),
            ]);

            return [
                'post' => $post
            ];
        }

        public function update(array $data , Post $post){
            $post->update($data);
        }

        public function destroy(Post $post){
            $post->delete();
        }
    
}
