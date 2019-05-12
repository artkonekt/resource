<?php
/**
 * Contains the MyTransformer class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Tests\Examples;

use Konekt\Resource\Contracts\SourceTransformer;

class MyTransformer implements SourceTransformer
{
    public function toArray($source): array
    {
        return array_map(function ($item) {
            return $item[0] . $item[0] . $item[0];
        }, $source);
    }

    public function attribute(string $name, $source)
    {
        return $source[$name][0] . $source[$name][0] . $source[$name][0];
    }
}
