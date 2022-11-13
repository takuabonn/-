<?php

namespace App\domains;

use App\domains\RatePlane;

class SharpnessPlane implements RatePlane
{
    private $usabletrafic = [
        '30gb' => 7238
    ];

    public function priceEachUsableTraffic()
    {
        return $this->usabletrafic;
        
    }

    public function caluculationDiscountAmount()
    {
       
    }
}