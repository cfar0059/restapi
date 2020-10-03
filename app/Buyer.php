<?php

namespace App;

use App\Transaction;

class Buyer extends User
{
    /**
     * A Buyer has Many Transactions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
