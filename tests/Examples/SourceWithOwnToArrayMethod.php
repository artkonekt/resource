<?php
/**
 * Contains the MySourceWithOwnToArrayMethod class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Tests\Examples;

class SourceWithOwnToArrayMethod
{
    public function toArray()
    {
        return ['Hello'];
    }
}
