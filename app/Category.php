<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];
    protected $fillable = [
      'name',
      'description'
    ];

    /**
     * Category has a many to many relationship to product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(){
        //belongsToMany is used only for a many to many relationship
        return $this->belongsToMany(Product::class);
    }
}
