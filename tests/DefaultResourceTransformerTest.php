<?php
/**
 * Contains the DefaultResourceTransformerTest class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Tests;

use Konekt\Resource\Tests\Examples\DefaultResource;
use Konekt\Resource\Tests\Examples\GiovanniResource;
use Konekt\Resource\Tests\Examples\GiovanniWithGetterMethods;
use Konekt\Resource\Tests\Examples\GiovanniWithMixedAttributeRepresentations;
use Konekt\Resource\Tests\Examples\SourceWithOwnToArrayMethod;
use Konekt\Resource\Tests\Examples\SourceWithPublicProperties;
use PHPUnit\Framework\TestCase;

class DefaultResourceTransformerTest extends TestCase
{
    /** @test */
    public function it_returns_an_array_as_is()
    {
        $source = [
            'id'    => 23758,
            'name'  => 'José Armando',
            'email' => 'jose@esmaralda.mx'
        ];
        $resource = new DefaultResource($source);

        $this->assertEquals($source, $resource->resolve());
    }

    /** @test */
    public function it_uses_the_to_array_method_of_the_source_object_if_it_exists()
    {
        $resource = new DefaultResource(new SourceWithOwnToArrayMethod());

        $this->assertEquals(['Hello'], $resource->resolve());
    }

    /** @test */
    public function it_returns_the_public_properties_of_non_iterable_objects()
    {
        $resource = new DefaultResource(new SourceWithPublicProperties());

        $this->assertEquals([
            'id'     => 67099,
            'name'   => 'Sylius',
            'isGood' => true
        ], $resource->resolve());
    }

    /** @test */
    public function it_returns_scalars_wrapped_in_an_array()
    {
        $this->assertEquals([301], (new DefaultResource(301))->resolve());
        $this->assertEquals([3.14], (new DefaultResource(3.14))->resolve());
        $this->assertEquals([true], (new DefaultResource(true))->resolve());
        $this->assertEquals(['I am scalar hey'], (new DefaultResource('I am scalar hey'))->resolve());
    }

    /** @test */
    public function it_returns_attribute_values_via_getter_methods()
    {
        $resource   = new GiovanniResource(new GiovanniWithGetterMethods());
        $serialized = $resource->resolve();

        $this->assertEquals(1127, $serialized['id']);
        $this->assertEquals('Giovanni Gatto', $serialized['name']);
        $this->assertEquals('Delivered', $serialized['order_status']);
    }

    /** @test */
    public function it_returns_attribute_values_via_getter_methods_public_properties_and_fields_via_magic_getters()
    {
        $resource   = new GiovanniResource(new GiovanniWithMixedAttributeRepresentations());
        $serialized = $resource->resolve();

        $this->assertEquals(1127, $serialized['id']);
        $this->assertEquals('Giovanni Gatto', $serialized['name']);
        $this->assertEquals('Delivered', $serialized['order_status']);
    }
}
