<?php

namespace App\domains;

use App\domains\RatePlane;

class SharpnessPlane implements RatePlane
{
    public function priceEachUsableTraffic()
    {
        return ['30gb' => 7238];
        
    }

    public function caluculationDiscountAmount()
    {
       
    }

}