<?php

namespace App;

use App\Product;

class Seller extends User
{
    /**
     * A seller has many products
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(){
        return $this->hasMany(Product::class);
    }
}
