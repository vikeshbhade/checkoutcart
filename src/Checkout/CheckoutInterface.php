<?php

namespace Project\Checkout;

interface CheckoutInterface
{
    public function addItem(CartItem $item): void;

    public function getTotalCheckoutPrice(): float;
}
