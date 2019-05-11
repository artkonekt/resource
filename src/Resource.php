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

use Konekt\Resource\Contracts\ResourceTransformer;
use Konekt\Resource\Transformers\DefaultResourceTransformer;

class Resource
{
    /**
     * The source of the data instance.
     *
     * @var mixed
     */
    protected $source;

    protected static $transformer = DefaultResourceTransformer::class;

    /** @var ResourceTransformer|null */
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

    protected function getTransformer(): ResourceTransformer
    {
        if (!$this->transformerInstance) {
            $this->transformerInstance = new static::$transformer();
        }

        return $this->transformerInstance;
    }
}
