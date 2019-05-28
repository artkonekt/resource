<?php
/**
 * Contains the ResourceTest class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-05-11
 *
 */

namespace Konekt\Resource\Tests;

use Konekt\Resource\Tests\Examples\DefaultResource;
use Konekt\Resource\Tests\Examples\MyResource;
use Konekt\Resource\Tests\Examples\MyResourceWithNameAttributeOnly;
use PHPUnit\Framework\TestCase;

class ResourceTest extends TestCase
{
    /** @test */
    public function a_resource_has_a_default_transformer()
    {
        $source   = ['id' => 1, 'name' => 'Hola'];
        $resource = new DefaultResource($source);

        $this->assertEquals($source, $resource->toArray());
    }

    /** @test */
    public function the_resource_transformer_can_be_specified()
    {
        $resource = new MyResource(['a' => 'b']);

        $this->assertEquals(['a' => 'bbb'], $resource->toArray());
    }

    /** @test */
    public function the_resource_transformer_can_be_specified_and_works_with_attributes_method()
    {
        $resource = new MyResourceWithNameAttributeOnly([
            'will'    => 'be',
            'ignored' => 'as well',
            'name'    => 'abc'
        ]);

        $this->assertEquals(['name' => 'aaa'], $resource->toArray());
    }
}
