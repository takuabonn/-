<?php

namespace App\domains;

interface RatePlane
{
    // 使用可能ギガ毎の価格
    public function priceEachUsableTraffic();

    // 割引額算出
    public function caluculationDiscountAmount();
}