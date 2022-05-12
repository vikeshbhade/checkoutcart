<?php

namespace Test\tests;

use Project\Checkout\Checkout;
use PHPUnit\Framework\TestCase;
use Project\Checkout\CartItem;

/**
 * @covers Checkout
 */
class CheckoutTest extends TestCase
{
    public function testCheckoutWithDependentDiscount()
    {
        $checkout = new Checkout();
        $cartItem = new CartItem();
        $cartItem->setItem('D');
        $cartItem->setQuantity(20);
        $checkout->addItem($cartItem);

        $cartItem = new CartItem();
        $cartItem->setItem('A');
        $cartItem->setQuantity(5);
        $checkout->addItem($cartItem);

        $this->assertEquals(316.67, $checkout->getTotalCheckoutPrice(), 'Checkout price is not equal to expected Price.');
    }

    public function testCheckoutWithDiscount()
    {
        $checkout = new Checkout();
        $cartItem = new CartItem();
        $cartItem->setItem('C');
        $cartItem->setQuantity(20);
        $checkout->addItem($cartItem);

        $this->assertEquals(333.33, $checkout->getTotalCheckoutPrice(), 'Checkout price is not equal to expected Price.');
    }

    public function testCheckoutWithNoDiscount()
    {
        $checkout = new Checkout();
        $cartItem = new CartItem();
        $cartItem->setItem('E');
        $cartItem->setQuantity(10);
        $checkout->addItem($cartItem);

        $this->assertEquals(500.00, $checkout->getTotalCheckoutPrice(), 'Checkout price is not equal to expected Price.');
    }
}
