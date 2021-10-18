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

    public function quantities()
    {
        return $this->belongsToMany(Product::class)->using(ProductType::class);
    }







}
