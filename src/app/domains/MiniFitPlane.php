<?php

namespace App\domains;

use App\domains\RatePlane;
use App\domains\PlanDiscountList;

class MiniFitPlane implements RatePlane
{
    private $planDiscountList;
    private $usabletraficAmount = [
        '3gb' => 5478,
        '2gb' => 4378,
        '1gb' => 3278,
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
