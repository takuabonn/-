<?php

namespace App\domains\valueObjects;

class UsableTraficInSharpnessPlan
{
    private $trafic = [
        '30gb' => 7238
    ];


    public function getTrafic()
    {
        return $this->trafic;
    }
}
