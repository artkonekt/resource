<?php
/**
 * Contains the ResourceTransformer interface.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Contracts;

interface ResourceTransformer
{
    public function toArray($source): array;
}
