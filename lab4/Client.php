<?php

class Client
{
    public $id;
    public $name;
    public $phone;
    public $address;
    public $time;
    public $bill;

    public function __construct($id, $array)
    {
        $this->id = $id;
        $this->name = $array['name'];
        $this->address = $array['phone'];
        $this->phone = $array['address'];
        $this->time = $array['time'];
        $this->bill = $array['bill'];
    }

    public static function validationDataClients($array)
    {
        return !(
            empty($array['name']) ||
            empty($array['phone']) ||
            empty($array['address']) ||
            empty($array['time']) ||
            empty($array['bill']) ||
            $array['time'] < 0 ||
            $array['bill'] < 0 ||
            !isset($array)
        );
    }
}
