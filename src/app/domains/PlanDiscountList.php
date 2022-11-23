<?php

namespace App\domains;

class PlanDiscountList
{
    private array $planDiscountList;

    public function __construct(array $planDiscountList)
    {
        $this->planDiscountList = $planDiscountList;
    }

    public function discount($amount)
    {
        $current_amount = $amount;
        foreach ($this->planDiscountList as $planDiscount) {
            $current_amount = $planDiscount->discount($current_amount);
        }
        return $current_amount;
    }

    public function getPlanDiscountList()
    {
        return  $this->planDiscountList;
    }
}
