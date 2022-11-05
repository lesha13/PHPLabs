<?php

class DB {
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function FilterProducts()
    {
        return $this->dbh->query('SELECT * FROM products ORDER BY name ASC')->fetchAll();
    }

    public function FilterProductsReverse()
    {
        return $this->dbh->query('SELECT * FROM products ORDER BY name DESC')->fetchAll();
    }
}