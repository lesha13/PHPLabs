<?php

class Repository
{
    public static function saveClients($array)
    {
        $file = fopen("clients.txt", "w");
        fwrite($file, serialize($array));
        fclose($file);
    }

    public static function loadClients()
    {
        return unserialize(file_get_contents("clients.txt"));
    }
}

