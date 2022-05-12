<?php

namespace Test\tests;

use PHPUnit\Framework\TestCase;
use Project\Model\Discount;

/**
 * @covers Discount
 */
class DiscountModelTest extends TestCase
{
    /**
     * @dataProvider getDiscountIds
     */
    public function testDiscountPrice(int $id)
    {
        $discount = new Discount($id);
        $this->assertNotNull($discount->getSpecialPrice(), sprintf("The Special Price is coming up as Null for : %s", $id));
    }

    /**
     * @dataProvider getDiscountIds
     */
    public function testMinimumDiscountQuantity(int $id)
    {
        $discount = new Discount($id);
        $this->assertNotNull($discount->getQuantity(), sprintf("The Quantity is not Null for : %s", $id));
    }

    /**
     * @dataProvider getDiscountIds
     */
    public function testDependentItemDiscount(int $id)
    {
        $discount = new Discount($id);
        if ($dependentItem = $discount->getDependItemDiscount()) {
            $this->assertIsString($dependentItem, sprintf("The Dependent Item is not a String for : %s", $id));
        } else {
            $this->assertNull($dependentItem, sprintf("The Dependent Item is empty but not Null for : %s", $id));
        }
    }

    /**
     * @dataProvider getDiscountIds
     */
    public function testDependentItemDiscountQuantity(int $id)
    {
        $discount = new Discount($id);
        if ($dependentItemQuantity = $discount->getDependItemQuantity()) {
            $this->assertIsInt($dependentItemQuantity, sprintf("The Dependent Item quantity is not a integer for : %s", $id));
        } else {
            $this->assertNull($dependentItemQuantity, sprintf("The Dependent Item quantity is empty but not Null for : %s", $id));
        }
    }

    public function getDiscountIds(): array
    {
        return [
           [1], [2],[3], [4], [5]
        ];
    }
}
