<?php

namespace App\Repositories\Orders;

use App\Models\Order;

class OrdersService {

    protected $x;
    protected $y;

    public function __construct($x=50, $y=100) {
        $this->x = $x;
        $this->y = $y;
    }


function get_result() {

    return $this->result;
}

}

$c = new OrdersService("400");
$c->get_result();







