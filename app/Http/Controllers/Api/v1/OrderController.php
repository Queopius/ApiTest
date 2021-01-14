<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Models\{Order, OrderStateLang};
use App\Http\Resources\{OrderResource, OrderStateLangResource};

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrders(Request $request)
    {
        $filter = $request->search;
        $orders = Order::identify( $filter )->get();

        return OrderResource::collection($orders);
    }

    public function getStatus(Request $request)
    {
        $status = OrderStateLang::all();

        return OrderStateLangResource::collection($status);
    }

    // public function getApi(Request $request)
    // {
    //     $orders = $this->orderService->getAllOrdersFromClient();

    //     return OrderResource::collection($orders);
    // }
}
