<?php

namespace Konekt\Resource;

use Konekt\Resource\Contracts\ApiResource;

class ResourceCollection implements ApiResource
{
    /** @var string The resource that this resource collects. */
    public $collects;

    public $collection;

    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->resource = $this->collectResource($resource);
    }

    public function count(): int
    {
        return $this->collection->count();
    }

    public function toArray(): array
    {
        return $this->collection->map->toArray()->all();
    }
}
