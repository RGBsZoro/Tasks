<?php

namespace App\Trait;

use Illuminate\Database\Eloquent\Model;

trait OwnershipTrait
{
    public function isOwner(Model $model): bool
    {
        return auth('api')->id() === $model->user_id;
    }
}
