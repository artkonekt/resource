<?php
/**
 * Contains the AnonymousResourceCollectionTest class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-06-05
 *
 */

namespace Konekt\Resource\Tests;

use Konekt\Resource\Tests\Examples\DefaultResource;
use Konekt\Resource\Tests\Examples\SourceWithPublicProperties;
use PHPUnit\Framework\TestCase;

class AnonymousResourceCollectionTest extends TestCase
{
    /** @test */
    public function it_can_generate_an_array_of_resources_from_an_array_of_source_entities()
    {
        $sourceResultSet = [
            new SourceWithPublicProperties(21, 'Alex', true),
            new SourceWithPublicProperties(42, 'Oleksiy', true),
            new SourceWithPublicProperties(64, 'Sandor', false),
        ];

        $result = DefaultResource::collection($sourceResultSet);

        $this->assertEquals([
            [
                'id' => 21,
                'name' => 'Alex',
                'isGood' => true
            ],
            [
                'id' => 42,
                'name' => 'Oleksiy',
                'isGood' => true
            ],
            [
                'id' => 64,
                'name' => 'Sandor',
                'isGood' => true
            ],
        ], $result);
    }
}
