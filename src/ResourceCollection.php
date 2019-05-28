<?php

namespace Konekt\Resource;

class ResourceCollection
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

    public function toArray($request): array
    {
        return $this->collection->map->toArray($request)->all();
    }
}
