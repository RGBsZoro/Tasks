<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title' , 'projecy_id'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function images(){
        return $this->morphMany(Image::class , 'imagable');
    }
}
