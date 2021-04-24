<?php
namespace App\Scopes;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ButtonsDataFilter implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (!Auth::hasUser()) {
            throw new AuthorizationException('Not authorized!', 401);
        }

        $builder->where('user_id', '=', Auth::user()->id);
    }
}