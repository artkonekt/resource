<?php
/**
 * Contains the TraversableSource class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Tests\Examples;

use Iterator;

class TraversableSource implements Iterator
{
    private $position = 0;

    private $values;

    public function __construct(array $values)
    {
        $this->values   = $values;
        $this->position = 0;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->values[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->values[$this->position]);
    }
}
