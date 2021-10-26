<?php

namespace App\Repositories\Orders;

use App\Models\Order;
use App\Models\Product;

//returns success boolean, and errors array. if no errors, returns empty array
class OrdersServiceResponse {

    public $success;
    public $errors;
    public  $data;

    public function __construct($success, $errors, $data)
    {
        $this->success = $success;
        $this->errors = $errors;
        $this->data = $data;
    }
}

class OrdersService {

    protected $description = 'Class for Orders mgmt.';

    public static function getOrders(){
        
        $orders = Order::all();
        $data = [
            'orders' => $orders
        ];

        return new OrdersServiceResponse(true, [], $data);
    }

}

















// class OrdersService {

//     protected $x;
//     protected $y;

//     public function __construct($x=50, $y=100) {
//         $this->x = $x;
//         $this->y = $y;
//     }


// function get_result() {

//     return $this->result;
// }

// }

// $c = new OrdersService("400");
// $c->get_result();







