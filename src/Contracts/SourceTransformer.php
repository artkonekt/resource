<?php
/**
 * Contains the SourceTransformer interface.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Contracts;

interface SourceTransformer
{
    public function toArray($source): array;
}
