<?php
/**
 * Contains the GiovanniResource class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-12
 *
 */

namespace Konekt\Resource\Tests\Examples;

use Konekt\Resource\Resource;

class GiovanniResource extends Resource
{
    public function toArray(): array
    {
        return [
            'id'           => $this->attribute('id'),
            'name'         => $this->attribute('name'),
            'order_status' => $this->attribute('order_status')
        ];
    }
}
