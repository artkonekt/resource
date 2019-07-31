<?php
/**
 * Contains the GiovanniWithMixedAttributeRepresentations class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-12
 *
 */

namespace Konekt\Resource\Tests\Examples;

class GiovanniWithMixedAttributeRepresentations
{
    public $orderStatus = 'Delivered';

    public function __get($key): string
    {
        return 'id' === $key ? 1127 : null;
    }

    public function getName(): string
    {
        return 'Giovanni Gatto';
    }
}
