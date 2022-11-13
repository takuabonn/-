<?php

namespace App\domains;

class FamilyDiscount implements PlanDiscount
{
    private $discountAmount = 1000;

    public function discount($amount)
    {
        return $amount - $this->discountAmount;
    }
}