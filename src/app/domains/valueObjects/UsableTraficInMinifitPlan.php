<?php

namespace App\domains\valueObjects;

class UsableTraficInMinifitPlan
{
    private $trafic = [
        '3gb' => 5478,
        '2gb' => 4378,
        '1gb' => 3278,
    ];

    public function getTrafic()
    {
        return $this->trafic;
    }
}
