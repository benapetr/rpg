<?php

//This program is free software: you can redistribute it and/or modify
//it under the terms of the GNU General Public License as published by
//the Free Software Foundation, either version 3 of the License, or
//(at your option) any later version.

//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.

if (isset($_GET['source']))
{
    show_source(__FILE__);
    exit(0);
}

class pg
{
    public $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 

    public function Random($length = 8)
    {
        $pass = array();
        $ll = strlen($this->letters) - 1; 
        for ($i = 0;$i < $length;$i++)
        {
            $n = rand(0, $ll);
            $pass[] = $this->letters[$n];
        }
        return implode($pass);
    }
}
