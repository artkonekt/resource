<?php
/**
 * Contains the AnonymousResourceCollection class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-12
 *
 */

namespace Konekt\Resource;

use Konekt\Resource\Contracts\ApiResource;

class AnonymousResourceCollection implements ApiResource
{
    /**
     * The class of the resource being collected.
     *
     * @var string
     */
    public $collects;

    /**
     * @var iterable
     */
    private $source;

    public function __construct(iterable $source, string $collects)
    {
        $this->source = $source;
        $this->collects = $collects;
    }

    public function toArray(): array
    {
        $response = [];

        foreach ($this->source as $item) {
            $response[] = (new $this->collects($item))->toArray();
        }

        return $response;
    }
}
