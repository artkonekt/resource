<?php

namespace Konekt\Resource\Tests\Examples\Collections;

use Konekt\Resource\Resource;

class OrderItemResource extends Resource
{
    public function toArray(): array
    {
        return [
            'name'  => $this->attribute('name'),
            'qty'   => $this->attribute('qty'),
            'price' => $this->attribute('price')
        ];
    }
}
