<?php
/**
 * Contains the Resource class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource;

use Konekt\Resource\Contracts\SourceTransformer;

class Resource
{
    /**
     * The source of the data instance.
     *
     * @var mixed
     */
    protected $source;

    protected static $transformer = DefaultSourceTransformer::class;

    /** @var SourceTransformer|null */
    private $transformerInstance;

    /**
     * Create a new resource instance.
     *
     * @param  mixed $source
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Transforms the resource into an array.
     */
    public function toArray(): array
    {
        if (is_null($this->source)) {
            return [];
        }

        return $this->getTransformer()->toArray($this->source);
    }

    protected function getTransformer(): SourceTransformer
    {
        if (!$this->transformerInstance) {
            $this->transformerInstance = new static::$transformer();
        }

        return $this->transformerInstance;
    }
}
