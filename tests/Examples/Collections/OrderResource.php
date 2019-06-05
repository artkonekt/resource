<?php

namespace Konekt\Resource\Tests\Examples\Collections;

use Konekt\Resource\Resource;

class OrderResource extends Resource
{
    public function toArray():array
    {
        return [
            'id' => $this->attribute('id'),
            'number' => $this->attribute('number'),
            'created_at' => $this->attribute('createdAt')->format('Y-m-d H:i:s'),
            'items' => OrderItemResource::collection($this->source->getItems())
        ];
    }
}
