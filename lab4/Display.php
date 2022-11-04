<?php

class Display
{
    public static function displayClients($array)
    {
        $table = '<table>';
        $table .= "<caption> Clients </caption>";
        $table .= '<tr> <th>id</th> <th>name</th> <th>phone</th> <th>address</th> <th>time</th> <th>bill</th> </tr>';

        foreach ($array as $item) {
            $table .=
                "<tr><td>" . $item['id'] .
                "</td><td>" .$item['name'] .
                "</td><td>" . $item['address'] .
                "</td><td>" . $item['phone'] .
                "</td><td>" . $item['time'] .
                "</td><td>" . $item['bill'] .
                "</td></tr>";
        }

        $table .= '</table>';
        return $table;
    }
}