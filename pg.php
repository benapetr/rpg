<?php

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
