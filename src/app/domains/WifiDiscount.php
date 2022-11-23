<?php
namespace App\domains;
use App\domains\PlanDiscount;

class WifiDiscount implements PlanDiscount
{
    private $discountAmount = 1000;


    public function discount($amount)
    {
        return $amount - $this->discountAmount;
    }

}