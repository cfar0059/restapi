<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;
use App\Category;
use App\Seller;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $date = ['deleted_at'];


    protected $fillable = [
        'name',
        'description',
        'quantity',
        'image',
        'seller_id',
    ];

    /**
     * Checks if product is available
     * @return bool
     */
    public function isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    /**
     * Product has a one to many relationship with Transactions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    /**
     * Product has a many to many relationship with Categories
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    /**
     * The product belongs to only one seller
     * We know that the product belongs to one seller because it contains the Foreign Key - seller_id
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seller(){
        return $this->hasOne(Seller::class);
    }
}
