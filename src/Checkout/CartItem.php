<?php

namespace Project\Checkout;

use Project\Model\Item;

class CartItem
{
    private $item;

    private $quantity;

    private $price;

    public function setItem(string $item)
    {
        $this->item = new Item($item);
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
