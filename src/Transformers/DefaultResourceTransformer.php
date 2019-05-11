<?php
/**
 * Contains the DefaultResourceTransformer class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Transformers;

use Konekt\Resource\Contracts\ResourceTransformer;

class DefaultResourceTransformer implements ResourceTransformer
{
    public function toArray($source): array
    {
        if (is_array($source)) {
            return $source;
        }

        if (is_object($source) && method_exists($source, 'toArray')) {
            return $source->toArray();
        }

        if (is_object($source) && method_exists($source, '__toArray')) {
            return $source->__toArray();
        }

        if (is_iterable($source)) {
            $result = [];

            foreach ($source as $key => $value) {
                $result[$key] = $value;
            }

            return $result;
        }

        if (is_object($source)) {
            return get_object_vars($source);
        }

        if (is_scalar($source)) {
            return [$source];
        }

        return [];
    }
}
