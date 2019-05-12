<?php
/**
 * Contains the GiovanniWithGetterMethods class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-12
 *
 */

namespace Konekt\Resource\Tests\Examples;

class GiovanniWithGetterMethods
{
    public function getId(): int
    {
        return 1127;
    }

    public function getName(): string
    {
        return 'Giovanni Gatto';
    }

    public function getOrderStatus(): string
    {
        return 'Delivered';
    }
}
