<?php

namespace Konekt\Resource\Tests\Examples\Collections;

use DateTime;

class Order
{
    public $id;

    public $number;

    public $createdAt;

    private $items = [];

    public function __construct(int $id, string $number, DateTime $createdAt)
    {
        $this->id = $id;
        $this->number = $number;
        $this->createdAt = $createdAt;
    }

    public function addItem(OrderItem $item)
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
