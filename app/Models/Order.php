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

        public static $_ORDER_PENDING=1;
        public static $_ORDER_APPROVED=2;


        public static function getStatuses()
        {
                return [

                    Order::$_ORDER_PENDING=>'Pending',
                    Order::$_ORDER_APPROVED=>'Approved'

                ];

        }
        
        public function getStatus()
        {
            return Order::getStatuses()[$this->order];


        }






}
