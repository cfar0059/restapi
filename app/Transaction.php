<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buyer;
use App\Product;

class Transaction extends Model
{
    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];

    /**
     * A Transaction belongs to one buyer
     * Contains buyer_id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }

    /**
     * A Transaction belongs to one Product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
