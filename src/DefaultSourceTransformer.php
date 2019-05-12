<?php
/**
 * Contains the DefaultSourceTransformer class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource;

use Konekt\Resource\Contracts\SourceTransformer;

class DefaultSourceTransformer implements SourceTransformer
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

        if (is_object($source)) {
            return get_object_vars($source);
        }

        if (is_scalar($source)) {
            return [$source];
        }

        return [];
    }

    public function attribute(string $name, $source)
    {
        $array = null;

        if (is_array($source)) {
            $array = $source;
        } elseif (is_object($source) && method_exists($source, 'toArray')) {
            $array = $source->toArray();
        } elseif (is_object($source) && method_exists($source, '__toArray')) {
            $array = $source->__toArray();
        }

        if (is_array($array)) {
            return $array[$name] ?? null;
        }

        if (is_object($source)) {

            if (method_exists($source, $method = 'get' . $this->pascalCase($name))) { // eg. $src->getShipmentStatus()
                return $source->{$method}();
            } elseif (property_exists($source, $property = $this->camelCase($name))) { // eg. $src->shipmentStatus
                return $source->{$property};
            }

            return $source->{$name}; // Try the property as is, also by falling back to magic getters
        }

        return null;
    }

    private function camelCase(string $string): string
    {
        return lcfirst($this->studlyCase($string));
    }

    private function pascalCase(string $string): string
    {
        return ucfirst($this->studlyCase($string));
    }

    private function studlyCase(string $string): string
    {
        $result = ucwords(str_replace(['-', '_'], ' ', $string));

        return str_replace(' ', '', $result);
    }


}
