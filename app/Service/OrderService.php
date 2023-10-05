<?php

namespace App\Service;

use App\Domain\Order;
use App\Repository\OrderRepositoryMYSQL;

class OrderService
{
    public function __construct(
        private OrderRepositoryMYSQL $orderRepository
    ) {
        $this->orderRepository = $orderRepository;
    }

    public function get(int $id): array|null
    {
        return $this->orderRepository->getById($id);
    }

    public function createOrder(Order $order): Order
    {
        $this->orderRepository->save($order);
        return $order;
    }
}
