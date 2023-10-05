<?php

namespace App\Repository;

use App\Domain\Order;

class OrderRepositoryMYSQL implements OrderRepository
{
    public function getAll(): array
    {
        $file = file_get_contents('./orders.json');
        $orders = json_decode($file, true);
        return $orders;
    }

    public function getById(int $id): array|null
    {
        $file = file_get_contents('./orders.json');
        $orders = json_decode($file, true);

        foreach ($orders as $order) {
            if ($order['id'] === $id) {
                return $order;
            }
        }

        return null;
    }

    public function save(Order $order): void
    {
        $data = [
            'id' => $order->getId(),
            'client' => $order->getClient(),
            'items' => $order->getItems()
        ];

        $ordersList = $this->getAll();

        array_push($ordersList, $data);

        $file = fopen('./orders.json', 'w');
        fwrite($file, json_encode($ordersList) . PHP_EOL);
        fclose($file);
    }
}

interface OrderRepository
{
    public function getById(int $id): array|null;
    public function save(Order $order): void;
}
