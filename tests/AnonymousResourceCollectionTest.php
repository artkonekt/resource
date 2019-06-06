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

use DateTime;
use DateTimeZone;
use Konekt\Resource\Tests\Examples\Collections\Order;
use Konekt\Resource\Tests\Examples\Collections\OrderItem;
use Konekt\Resource\Tests\Examples\Collections\OrderResource;
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
                'id'     => 21,
                'name'   => 'Alex',
                'isGood' => true
            ],
            [
                'id'     => 42,
                'name'   => 'Oleksiy',
                'isGood' => true
            ],
            [
                'id'     => 64,
                'name'   => 'Sandor',
                'isGood' => false
            ],
        ], $result->resolve());
    }

    /** @test */
    public function it_works_with_nested_collections()
    {
        $orderDate = new DateTime('2019-06-05 11:32:10', new DateTimeZone('UTC'));

        $order1 = new Order(100, 'XC3-IRP', $orderDate);
        $order1->addItem(new OrderItem('Porsche', 1, 12000));
        $order1->addItem(new OrderItem('Ferrari', 1, 19000));

        $order2 = new Order(101, 'XC3-IRZ', $orderDate);
        $order2->addItem(new OrderItem('McLaren', 2, 17300));

        $orders = OrderResource::collection([$order1, $order2]);

        $this->assertEquals([
            [
                'id'         => 100,
                'number'     => 'XC3-IRP',
                'created_at' => '2019-06-05 11:32:10',
                'items'      => [
                    [
                        'name'  => 'Porsche',
                        'qty'   => 1,
                        'price' => 12000
                    ], [
                        'name'  => 'Ferrari',
                        'qty'   => 1,
                        'price' => 19000
                    ]
                ]
            ], [
                'id'         => 101,
                'number'     => 'XC3-IRZ',
                'created_at' => '2019-06-05 11:32:10',
                'items'      => [
                    [
                        'name'  => 'McLaren',
                        'qty'   => 2,
                        'price' => 17300
                    ]
                ]
            ]
        ], $orders->resolve());
    }
}
