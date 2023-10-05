<?php

namespace App\Domain;

class Order
{
    public function __construct(
        private int $id,
        private string $client,
        private array $items = []
    ) {
        $this->id = $id;
        $this->client = $client;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getClient(): string
    {
        return $this->client;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(Item $item): void
    {
        $data = [
            'id' => $item->id,
            'description' => $item->description,
            'price' => $item->price
        ];

        $this->items[] = $data;
    }
}

class Item
{
    public function __construct(
        public int $id,
        public string $description,
        public float $price
    ) {
        $this->id = $id;
        $this->description = $description;
        $this->price = $price;
    }
}
