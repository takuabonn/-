<?php

namespace App\domains\factories;

use App\domains\FamilyDiscount;
use App\domains\PlanDiscountList;
use App\domains\WifiDiscount;
use App\queryServices\ContractLineQueryService;

class PreviouslyAppliedRatePlanDiscount
{
    public static function create(ContractLineQueryService $contractLineQueryService, $phone_number)
    {
        // 契約内容詳細取得
        $contractDetail = $contractLineQueryService->contractDetail($phone_number);

        $previouslyAppliedPlanDiscountList = [];
        // 家族割の適用があるか
        if ($contractDetail['family_discount_condition'] === 1) {
            $previouslyAppliedPlanDiscountList[] = new FamilyDiscount();
        }

        // 光割の適用があるか
        if ($contractDetail['wifi_discount_condition'] === 1) {
            $previouslyAppliedPlanDiscountList[] = new WifiDiscount();
        }

        return new PlanDiscountList($previouslyAppliedPlanDiscountList);
    }
}
