<?php

namespace Project\Model;

class Item
{
    private $data = [
        'A' => ['price' => 50, 'discount' => [1]],
        'B' => ['price' => 50, 'discount' => [2]],
        'C' => ['price' => 50, 'discount' => [3,4]],
        'D' => ['price' => 50, 'discount' => [5]],
        'E' => ['price' => 50, 'discount' => []]
    ];

    private $name;

    private $price;

    private $discount;

    public function __construct(string $item)
    {
        $this->name = !$this->data[$item] ?: $item;
        $this->price = $this->data[$item]['price'];
        $this->discount = $this->data[$item]['discount'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDiscount(): array
    {
        return $this->discount;
    }
}
