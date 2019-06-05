<?php
/**
 * Contains the SourceWithPublicProperties class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Tests\Examples;

class SourceWithPublicProperties
{
    public $id;

    public $name;

    public $isGood;

    public function __construct(int $id = 67099, string $name = 'Sylius', bool $isGood = true)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isGood = $isGood;
    }
}
