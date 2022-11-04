<?php

class Repository
{
    public $dbh;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function createClient($array)
    {
        $this->dbh->query('INSERT INTO Clients(name, address, phone, time, bill) VALUES (' .
            "'" . $array['name'] . "', " .
            "'" . $array['address'] . "', " .
            "'" . $array['phone'] . "', " .
            "'" . $array['time'] . "', " .
            "'" . $array['bill'] . "')"
        );
    }

    public function readClients()
    {
        return $this->dbh->query('SELECT * FROM Clients')->fetchAll();
    }

    public function updateClient($array)
    {
        $this->dbh->query('UPDATE Clients SET ' .
            'name = ' . $array['name'] . ', ' .
            'address = ' . $array['address'] . ', ' .
            'phone = ' . $array['phone'] . ', ' .
            'time = ' . $array['time'] . ' , ' .
            'bill = ' . $array['bill'] . ' ' .
            'WHERE id = ' . $array['id']);
    }

    public function deleteClient($array)
    {
        return $this->dbh->query('DELETE FROM Clients WHERE id = ' . $array['id']);
    }
}

