<?php

namespace Konekt\Resource\Tests\Examples\Collections;

class OrderItem
{
    public $name;

    public $qty;

    public $price;

    public function __construct(string $name, int $qty, float $price)
    {
        $this->name = $name;
        $this->qty = $qty;
        $this->price = $price;
    }
}
