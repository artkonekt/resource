<?php
/**
 * Contains the ApiResource interface.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-06-05
 *
 */

namespace Konekt\Resource\Contracts;

interface ApiResource
{
    /**
     * Transforms the resource into an array.
     */
    public function toArray(): array;

    /**
     * Returns the resolved array - to be returned as response
     */
    public function resolve($request = null): array;
}
