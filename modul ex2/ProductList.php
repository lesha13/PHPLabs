<?php

class ProductList
{
    public $products;

    public function __construct()
    {
    }
    public function defaultProducts()
    {
        $this->products = [
            new Product([
                'id' => 1,
                'name' => 'Tea',
                'country' => 'Chile',
                'price' => 10
            ]),
            new Product([
                'id' => 2,
                'name' => 'Coffee',
                'country' => 'Argentina',
                'price' => 20
            ]),
            new Product([
                'id' => 3,
                'name' => 'A',
                'country' => 'India',
                'price' => 30
            ]),
        ];
        return $this;
    }
    public function FilterProducts()
    {
        usort($this->products, function ($a, $b) {
            return strcmp($a->name, $b->name);
        });
    }
    public function FilterProductsReverse()
    {
        usort($this->products, function ($a, $b) {
            return strcmp($b->name, $a->name);
        });
    }
}