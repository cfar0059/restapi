<?php

namespace App\Scopes;

use App\Seller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SellerScope implements Scope
{
    public function apply(Builder $seller, Model $model){
        $seller->has('products');
    }
}
