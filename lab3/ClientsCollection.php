<?php

class ClientsCollection
{
    public $clients;

    public function __construct()
    {
    }

    public function defaultClients()
    {
        $this->clients = [
            new Client(1, [
                'id' => 1,
                'name' => 'Bob',
                'phone' => '313-570-0255',
                'address' => 'Kyiv',
                'time' => 120,
                'bill' => 120 * 2.5,
            ]),
            new Client(2, [
                'id' => 2,
                'name' => 'Jack',
                'phone' => '860-640-5534',
                'address' => 'Lviv',
                'time' => 60,
                'bill' => 60 * 2.5,
            ]),
            new Client(3, [
                'id' => 3,
                'name' => 'Jack',
                'phone' => '123-859-2041',
                'address' => 'Lviv',
                'time' => 40,
                'bill' => 40 * 2.5,
            ]),
            new Client(4, [
                'id' => 4,
                'name' => 'John',
                'phone' => '732-337-1842',
                'address' => 'Dnipro',
                'time' => 30,
                'bill' => 30 * 2.5,
            ])
        ];
        return $this;
    }

    public function getClientById($id)
    {
        foreach ($this->clients as $client) {
            if ($client->id == $id) {
                return $client;
            }
        }
        return null;
    }

    public function filterClients($name, $time)
    {
        return array_filter(
            $this->clients,
            function ($value) use ($name, $time) {
                return ($value->name == $name and $value->time > $time);
            }
        );
    }

    public function addClient($client)
    {
        $this->clients[] = $client;
    }

    public function editClient($array)
    {
        $client = $this->getClientById($array['id']);
        if (!(empty($client))) {
            $client->name = $array['id'];
            $client->phone = $array['phone'];
            $client->address = $array['address'];
            $client->time = $array['time'];
            $client->bill = $array['bill'];
        }
    }
}
