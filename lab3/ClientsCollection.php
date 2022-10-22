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

    public function saveClients()
    {
        $file = fopen("clients.txt", "w");
        fwrite($file, serialize($this->clients));
        fclose($file);
    }

    public function loadClients()
    {
        $this->clients = unserialize(file_get_contents("clients.txt"));
    }

    public function displayClients()
    {
        $table = '<table>';
        $table .= "<caption> Clients </caption>";
        $table .= '<tr> <th>id</th> <th>name</th> <th>phone</th> <th>address</th> <th>time</th> <th>bill</th> </tr>';

        foreach ($this->clients as $item) {
            $table .= "<tr><td>$item->id</td><td>$item->name</td><td>$item->phone</td>" .
                "<td>$item->address</td><td>$item->time</td><td>$item->bill</td></tr>";
        }

        $table .= '</table>';
        return $table;
    }

    public function displayFilteredClients($name, $time)
    {
        $array = $this->filterClients($name, $time);
        $table = '<table>';
        $table .= "<caption> Clients </caption>";
        $table .= '<tr> <th>id</th> <th>name</th> <th>phone</th> <th>address</th> <th>time</th> <th>bill</th> </tr>';

        foreach ($array as $item) {
            $table .= "<tr><td>$item->id</td><td>$item->name</td><td>$item->phone</td>" .
                "<td>$item->address</td><td>$item->time</td><td>$item->bill</td></tr>";
        }

        $table .= '</table>';
        return $table;
    }
}
