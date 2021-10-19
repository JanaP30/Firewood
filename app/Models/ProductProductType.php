<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProductType extends Model
{
    use HasFactory;
    protected $table = 'product_product_type';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'product_type_id',
        'quantity'
        
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }




}
