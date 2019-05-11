<?php
/**
 * Contains the MyResource class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Tests\Examples;

use Konekt\Resource\Resource;

class MyResource extends Resource
{
    protected static $transformer = MyTransformer::class;
}
