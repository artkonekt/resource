<?php
/**
 * Contains the AnonymousResourceCollection class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-12
 *
 */

namespace Konekt\Resource;

class AnonymousResourceCollection
{
    /**
     * The name of the resource being collected.
     *
     * @var string
     */
    public $collects;

    public function __construct($source, string $collects)
    {
        $this->collects = $collects;

        parent::__construct($source);
    }

}
