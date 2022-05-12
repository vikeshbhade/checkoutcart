<?php

namespace Project\Model;

class Discount
{
    private $data = [
        1 => ['quantity' => 3, 'specialPrice' => 130/3, 'dependItemDiscount' => null, 'dependItemQuantity' => null ],
        2 => ['quantity' => 2, 'specialPrice' => 45/2, 'dependItemDiscount' => null, 'dependItemQuantity' => null],
        3 => ['quantity' => 2, 'specialPrice' => 38/2, 'dependItemDiscount' => null, 'dependItemQuantity' => null ],
        4 => ['quantity' => 3, 'specialPrice' => 50/3,'dependItemDiscount' => null, 'dependItemQuantity' => null ],
        5 => ['quantity' => 1, 'specialPrice' => 5, 'dependItemDiscount' => 'A', 'dependItemQuantity' => 1 ],
    ];

    private $quantity;

    private $specialPrice;

    private $dependItemDiscount;

    private $dependItemQuantity;


    public function __construct(int $id)
    {
        $this->quantity = $this->data[$id]['quantity'];
        $this->specialPrice = $this->data[$id]['specialPrice'];
        $this->dependItemDiscount = $this->data[$id]['dependItemDiscount'];
        $this->dependItemQuantity = $this->data[$id]['dependItemQuantity'];
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getSpecialPrice(): float
    {
        return $this->specialPrice;
    }

    public function getDependItemDiscount(): ?string
    {
        return $this->dependItemDiscount;
    }

    public function getDependItemQuantity(): ?int
    {
        return $this->dependItemQuantity;
    }
}
