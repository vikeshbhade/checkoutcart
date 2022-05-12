<?php

namespace Test\tests;

use PHPUnit\Framework\TestCase;
use Project\Model\Item;

/**
 * @covers Item
 */
class ItemModelTest extends TestCase
{

    /**
     * @dataProvider getDataItems
     */
    public function testItemObjectPriceGetter(string $item)
    {
        $itemObj = new Item($item);
        $this->assertNotNull($itemObj->getPrice(), sprintf("The Price is coming up as Null for : %s", $item));
    }

    /**
     * @dataProvider getDataItems
     */
    public function testItemObjectNameGetter(string $item)
    {
        $itemObj = new Item($item);
        $this->assertEquals($item, $itemObj->getName(), sprintf("The Name is coming up as Null for : %s", $item));
    }

    /**
     * @dataProvider getDataItems
     */
    public function testItemObjectDiscountType(string $item)
    {
        $itemObj = new Item($item);
        $this->assertIsArray($itemObj->getDiscount(), sprintf("The Discount type is not an array for: %s", $item));
    }

    public function getDataItems(): array
    {
       return [
           ['A'], ['B'],['C'], ['D'], ['E']
        ];
    }
}
