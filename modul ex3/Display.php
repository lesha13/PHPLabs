<?php

class Display
{
    public static function DisplayProducts($array)
    {
        $table = '<table>';
        $table .= "<caption> Products </caption>";
        $table .= '<tr> <th>id</th> <th>name</th> <th>country</th> <th>price</th> </tr>';

        foreach ($array as $item)
        {
            $table .= "<tr><td>" . $item['id'] . "</td><td>" . $item['name'] . "</td><td>" . $item['country'] . "</td><td>" . $item['price'] . "</td></tr>";
        }

        $table .= '</table>';

        return $table;
    }
}