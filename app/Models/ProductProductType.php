<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_type_id',
        'quantity'
        
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class)->using(ProductType::class);
    }


    public function productType()
    {
        return $this->belongsToMany(Product::class)->using(ProductType::class);
    }




}
