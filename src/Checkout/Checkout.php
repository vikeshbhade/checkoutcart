<?php

namespace Project\Checkout;

use Project\Checkout\CartItem;
use Project\Model\Item;
use Project\Model\Discount;

class Checkout implements CheckoutInterface
{
    private $cartItems=[];

    private $totalCheckoutPrice;

    public function addItem(CartItem $cartItem): void
    {
        $this->cartItems[] = $cartItem;
        $this->calculateTotalPrice();
    }

    public function getCheckoutItems(): array
    {
        return $this->cartItems;
    }

    private function calculateTotalPrice(): void
    {
        $this->totalCheckoutPrice = 0;
        foreach ($this->cartItems as $cartItem) {
            $cartItem->setPrice($this->calculateFinalItemPrice($cartItem->getItem(), $cartItem->getQuantity()));
            $this->totalCheckoutPrice += $cartItem->getPrice();
        }
    }

    public function getTotalCheckoutPrice(): float
    {
        return \number_format($this->totalCheckoutPrice, 2);
    }

    private function checkIfItemAvailable(string $item, int $quantity): bool
    {
        foreach ($this->cartItems as $cartItem) {
            if ($cartItem->getItem()->getName() == $item && $cartItem->getQuantity()) {
                return true;
            }
        }
        return false;
    }

    private function calculateFinalItemPrice(Item $item, int $quantity): float
    {
        $originalDiscountItemPrice = null;
        if ($discountIds = $item->getDiscount()) {
            foreach ($discountIds as $discountId) {
                $discount = new Discount($discountId);
                if ($quantity >= $discount->getQuantity()) {
                    if ($dependentDiscount = $discount->getDependItemDiscount()) {
                        $originalDiscountItemPrice = $this->checkIfItemAvailable($dependentDiscount, $discount->getDependItemQuantity()) ? $quantity * $discount->getSpecialPrice() : $quantity * $item->getPrice();
                    } else {
                        $originalDiscountItemPrice = $quantity * $discount->getSpecialPrice();
                    }
                }
            }
        } else {
            $originalDiscountItemPrice = $quantity * $item->getPrice();
        }

        return $originalDiscountItemPrice;
    }
}
