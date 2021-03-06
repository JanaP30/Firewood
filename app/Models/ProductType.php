<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Product;

class ProductType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',

    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }



    
    public function orders()
    {
    return $this->hasMany(Order::class);

    }
    
}
