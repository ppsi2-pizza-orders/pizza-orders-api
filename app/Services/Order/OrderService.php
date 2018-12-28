<?php

namespace App\Services\Order;

use App\Interfaces\DescriptionGeneratorInterface;
use App\Interfaces\OrderServiceInterface;
use App\Events\OrderPlaced;
use App\Interfaces\PriceCalculatorInterface;
use App\Models\Order;
use App\Exceptions\ApiException;
use App\Models\OrderPizza;

use App\Services\Order\Description\CustomizedMenuPizzaDescription;
use App\Services\Order\Description\CustomPizzaDescription;
use App\Services\Order\Description\MenuPizzaDescription;
use App\Services\Order\Price\CustomizedMenuPizzaPrice;
use App\Services\Order\Price\CustomPizzaPrice;
use App\Services\Order\Price\MenuPizzaPrice;

class OrderService implements OrderServiceInterface
{
    protected $order;

    public function placeOrder(array $data): Order
    {
        $this->order = Order::create([
            'user_id' => $data['user_id'],
            'restaurant_id' => $data['restaurant_id'],
            'delivery_address' => $data['delivery_address'],
            'phone_number' => $data['phone_number'],
            'status' => Order::STATUS_NEW,
            'token' => str_random(16),
        ]);

        $this->saveOrderPizzas($data['pizzas']);

        event(new OrderPlaced($this->order));
        return $this->order;
    }

    public function saveOrderPizzas(array $pizzas)
    {
        foreach($pizzas as $pizza) {

            $type = $this->getOrderPizzaType($pizza);
            $description = $this->getDescriptionGenerator($type);
            $price = $this->getPriceCalculator($type);

            OrderPizza::create([
                'order_id' => $this->order->id,
                'description' => $description->generate($pizza),
                'price' => $price->calculate($pizza),
                'type' => $type,
            ]);
        }
    }

    protected function getDescriptionGenerator(string $orderType): DescriptionGeneratorInterface
    {
        if ($orderType === OrderPizza::TYPE_MENU) {
            return new MenuPizzaDescription($this->order);
        }
        if ($orderType === OrderPizza::TYPE_CUSTOM) {
            return new CustomPizzaDescription($this->order);
        }
        if ($orderType === OrderPizza::TYPE_MENU_CUSTOMIZED) {
            return new CustomizedMenuPizzaDescription($this->order);
        }

        throw (new ApiException)
            ->pushMessage('Invalid order type');
    }

    protected function getPriceCalculator(string $orderType): PriceCalculatorInterface
    {
        if ($orderType === OrderPizza::TYPE_MENU) {
            return new MenuPizzaPrice($this->order);
        }
        if ($orderType === OrderPizza::TYPE_CUSTOM) {
            return new CustomPizzaPrice($this->order);
        }
        if ($orderType === OrderPizza::TYPE_MENU_CUSTOMIZED) {
            return new CustomizedMenuPizzaPrice($this->order);
        }

        throw (new ApiException)
            ->pushMessage('Invalid order type');
    }

    protected function getOrderPizzaType(array $pizza): string
    {
        if (isset($pizza['id']) && isset($pizza['ingredients'])) {
            return OrderPizza::TYPE_MENU_CUSTOMIZED;
        }
        if (isset($pizza['ingredients'])) {
            return OrderPizza::TYPE_CUSTOM;
        }
        if (isset($pizza['id'])) {
            return OrderPizza::TYPE_MENU;
        }

        throw (new ApiException)
            ->pushMessage('Invalid order type');
    }
}