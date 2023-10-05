<?php

use App\Domain\{Order, Item};
use App\Repository\OrderRepositoryMYSQL;
use App\Service\OrderService;

require_once __DIR__ . '/../vendor/autoload.php';

$orderRepository = new OrderRepositoryMYSQL();
$orderService = new OrderService($orderRepository);

$order = new Order(1, 'John Doe');

$item1 = new Item(1, 'Item 1', 10.5);
$item2 = new Item(2, 'Item 2', 20.5);

$order->addItem($item1);
$order->addItem($item2);

$orderService->createOrder($order);
$orderCreated = $orderService->get(1);

echo '<pre>';
print_r($orderCreated);
echo '</pre>';

echo 'Order created successfully!';
