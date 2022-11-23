<?php

namespace App\domains;

interface PlanDiscount
{
    // 割引
    public function discount(int $amount);

}