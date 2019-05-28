<?php
/**
 * Contains the MyShrunkResource class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-12
 *
 */

namespace Konekt\Resource\Tests\Examples;

use Konekt\Resource\Resource;

class MyResourceWithNameAttributeOnly extends Resource
{
    protected static $transformer = MyTransformer::class;

    public function toArray(): array
    {
        return [
            'name' => $this->attribute('name')
        ];
    }
}
