<?php

class Product
{
    public $id;
    public $name;
    public $country;
    public $price;

    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->name = $array['name'];
        $this->country = $array['country'];
        $this->price = $array['price'];
    }

    public static function validationDataProducts($array)
    {
        return !(
            empty($array['name']) ||
            empty($array['country']) ||
            empty($array['address']) ||
            empty($array['price']) ||
            $array['price'] < 0 ||
            !isset($array)
        );
    }
}