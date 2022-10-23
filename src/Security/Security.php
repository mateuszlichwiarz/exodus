<?php

namespace App\Security;

class Security
{
    static public function board()
    {
        $board['1'] = 'c';
        $board['2'] = 'e';
        $board['3'] = 's';
        $board['4'] = 'g';
        $board['5'] = 'j';

        $board['a'] = '0G';
        $board['m'] = '56';
        $board['r'] = 'H6';
        $board['t'] = '20';
        $board['y'] = 'FJ3';
        $board['n'] = '05';

        return $board;
    }

    //zapisywanie
    public function save()
    {
        $nickname = 'martyna';
        $board = Security::board();
        
        $letters = str_split($nickname);

        $hashed = [];
        $i = 0;
        foreach($letters as $letter)
        {
            $hashed[$i] = $board[$letter];
            $i++;
        }

        $new = implode($hashed);

        return $new;
    }

    //odczytywanie
    public function read()
    {
        
    }
}