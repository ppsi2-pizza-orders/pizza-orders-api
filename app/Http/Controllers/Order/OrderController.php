<?php

namespace App\Http\Controllers\Order;

use DB;
use Log;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Interfaces\ApiResourceInterface as ApiResource;
use App\Interfaces\OrderServiceInterface as OrderService;
use App\Http\Controllers\ApiResourceController;
use App\Http\Requests\PlaceOrder;
use App\Models\Restaurant;
use App\Models\Order;
use App\Events\OrderStatusChanged;

class OrderController extends ApiResourceController
{
    public $orderService;

    public function __construct(OrderService $orderService, ApiResource $apiResource)
    {
        $this->orderService = $orderService;
        parent::__construct($apiResource);
    }

    public function placeOrder(PlaceOrder $request)
    {
        DB::beginTransaction();

        $orderData = [
            'user_id' => JWTAuth::user()->id,
            'restaurant_id' => $request->input('restaurant_id'),
            'delivery_address' => $request->input('delivery_address'),
            'phone_number' => $request->input('phone_number'),
            'pizzas' => $request->input('pizzas')
        ];

        $order = $this->orderService->placeOrder($orderData);

        Log::channel('order')->notice('Order ' . $order->token . 'was placed by ' . $order->user->name);

        DB::commit();

        return $this->apiResource
            ->resource($order)
            ->pushMessage('Order placed')
            ->response();
    }

    public function setNextStatus(string $token)
    {
        $order = Order::where('token', $token)->firstOrFail();

        if ($order->isFinished()) {
            throw $this->apiException
                ->pushMessage('Order is already finished')
                ->setStatusCode(400);
        }

        $order->setNextStatus()->save();
        event(new OrderStatusChanged($order));

        return $this->apiResource
            ->resource($order)
            ->pushMessage('Order status changed')
            ->response();
    }

    public function show(string $token)
    {
        $order = Order::where('token', $token)->firstOrFail();

        return $this->apiResource
            ->resource($order)
            ->response();
    }

    public function restaurantOrders($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return $this->apiResource
            ->resource($restaurant->orders)
            ->response();
    }
}
