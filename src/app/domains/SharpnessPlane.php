<?php

namespace App\domains;

use App\domains\RatePlane;
use App\domains\PlanDiscountList;

class SharpnessPlane implements RatePlane
{
    private $planDiscountList;

    private $usabletraficAmount = [
        '30gb' => 7238
    ];

    public function __construct(PlanDiscountList $planDiscountList)
    {
        $this->planDiscountList = $planDiscountList;
    }

    public function priceEachUsableTraffic()
    {
        return $this->usabletraficAmount;
    }

    public function caluculationDiscountAmount()
    {
        $discountedAmount = [];
        foreach ($this->usabletraficAmount as $trafic => $a_usabletraficAmount) {
            $discountedAmount[$trafic] = $this->planDiscountList->discount($a_usabletraficAmount);
        }
        return $discountedAmount;
    }
}
