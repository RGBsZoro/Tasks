<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public array $translatable = ['name', 'description'];
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
