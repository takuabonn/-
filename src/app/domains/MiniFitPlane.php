<?php

namespace App\domains;

use App\domains\RatePlane;

class MiniFitPlane implements RatePlane
{
    public function priceEachUsableTraffic()
    {
        return [
            '3gb' => 5478,
            '2gb' => 4378,
            '1gb' => 3278,
        ];

    }

    public function caluculationDiscountAmount()
    {
        
       
    }

}