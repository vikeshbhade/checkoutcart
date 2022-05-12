<?php

namespace Test\tests;

use PHPUnit\Framework\TestCase;
use Project\Checkout\CartItem;
use Project\Model\Item;

/**
 * @covers CartItem
 */
class CartItemTest extends TestCase
{
    public function testItemObjectGetter()
    {
        $cartItem = new CartItem();
        $cartItem->setItem('B');

        $this->assertInstanceOf(Item::class, $cartItem->getItem(), "The object is not an Instance of Item");
    }

    public function testCartItemQuantity()
    {
        $cartItem = new CartItem();
        $cartItem->setItem('A');
        $cartItem->setQuantity(10);

        $this->assertEquals(10, $cartItem->getQuantity(), "Quantity Not equal to the expected Value");
    }

    public function testCartItemPrice()
    {
        $cartItem = new CartItem();
        $cartItem->setItem('D');
        $cartItem->setQuantity(10);
        $cartItem->setPrice(500);

        $this->assertEquals(500, $cartItem->getPrice(), "Price Does not Match the expected price");
    }
}
