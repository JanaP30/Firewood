<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable =[

        'first_name',
        'last_name',
        'address',
        'phone_number',
        'quantity',
        'product_type_id',
        'product_id',
        'note'

    ];

        public static $_WOOD_PRODUCT_CHOPPED=1;
        public static $_WOOD_PRODUCT_WHOLE=2;
        public static $_WOOD_PRODUCT_TYPE_BEECH=3;
        public static $_WOOD_PRODUCT_TYPE_OAK=4;
        public static $_WOOD_PRODUCT_TYPE_ROSEWOOD=5;
        public static $_WOOD_PRODUCT_TYPE_BIRCH=6;


        public static function getWoods()
        {
                return [

                    self::$_WOOD_PRODUCT_CHOPPED=>'Chopped',
                    self::$_WOOD_PRODUCT_WHOLE=>'Whole',
                    self::$_WOOD_PRODUCT_TYPE_BEECH=>'Beech',
                    self::$_WOOD_PRODUCT_TYPE_OAK=>'Oak',
                    self::$_WOOD_PRODUCT_TYPE_ROSEWOOD=>'Rosewood',
                    self::$_WOOD_PRODUCT_TYPE_BIRCH=>'Birch'

                ];

        }
        
        public function getWood()
        {
            return self::getWoods()[$this->wood];


        }
        
        public function productType(){

          return $this->belongsTo(ProductType::class);


        }
        public function product(){

            return $this->belongsTo(Product::class);
  
  
          }
        





}
