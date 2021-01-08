<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use GuzzleHttp\Client;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $orderDetails;
    private $order;

    public function __construct(Order $order, OrderDetail $orderDetails)
    {
        $this->orderDetails = $orderDetails;
        $this->order = $order;
    }

    public function postOrder(Request $request)
    {
        $filter = $request->search;
        $orders = Order::listOrder()
                ->filterItemsOrder($filter)
                ->get();

        return response()->json(['data' => $orders, 'success' => ($orders) ? 'true' : 'false']);
    }

    public function postOrderTwo(Request $request)
    {
        $filter = $request->search;
        $data = Order::listOrder()
                ->filterItemsOrder($filter)
                ->take(1)
                ->get();

        return response()->json(['data' => $data, 'success' => ($data) ? 'true' : 'false']);
    }

    // public function postOrderTree(Request $request)
    // {
    //     $filter = $request->search;
    //     $data = Order::listOrder()
    //             ->filterItemsOrder($filter)
    //             ->take(1)
    //             ->get();

    //     return response()->json(['data' => $data, 'success' => ($data) ? 'true' : 'false']);
    // }
}
