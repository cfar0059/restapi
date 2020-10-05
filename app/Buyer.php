<?php

namespace App;

use App\Scopes\BuyerScope;
use App\Transaction;

class Buyer extends User
{

    protected static function boot(){
        parent::boot();

        static::addGlobalScope(new BuyerScope());
    }

    /**
     * A Buyer has Many Transactions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
