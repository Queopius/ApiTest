<?php

namespace App\Services;

use App\Repositories\GuzzleHttpRequest;

class OrderService extends GuzzleHttpRequest
{
    public function getAllOrdersFromClient()
    {
        return $this->get('api/orders');
    }
}
